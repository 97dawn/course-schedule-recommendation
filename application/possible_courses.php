<?php
    class PossibleCourses{
        private $allOffers = Array();
        private $untakens = Array();
        private $takens = Array();
        
        public function getPossibleCourses(){       
            $this->setAllOffers();
            $this->setUntakensAndTakens();
            return $this->getAvailableCourses();
        }

        // Set all Fall 2018 offering courses
        private function setAllOffers(){
            $username = "root";
            $password = "root"; 
            $dbname = "titama";
            $servername = "localhost";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            $sql = "SELECT cname FROM Courses;";
            $result =  $conn->query($sql) or die ("Error: " . mysql_error());
            while( $row = $result->fetch_assoc()){
                if(in_array($row['cname'], $this->allOffers) == false){
                    $this->allOffers[] = $row['cname'];
                }
            }
            $conn->close();
        }

        // Get untaken courses among Fall 2018 courses
        private function setUntakensAndTakens(){   
            session_start();
            foreach($_SESSION['user_info']->getCSECourses() as $cse=>$took){
                if($took){
                    $this->takens[] = $cse;
                }
            }
            foreach($_SESSION['user_info']->getNSCourses() as $ns=>$took){
                if($took){
                    $this->takens[] = $ns;
                }
            }
            foreach($_SESSION['user_info']->getMATHCourses() as $math=>$took){
                if($took){
                    $this->takens[] = $math;
                }
            }
            foreach($_SESSION['user_info']->getWRTCourses() as $wrt=>$took){
                if($took){
                    $this->takens[] = $wrt;
                }
            }
            foreach($this->allOffers as $course){
                if(in_array($course, $this->takens) == false){
                    $this->untakens[] = $course;
                }
            }
        }

        // Get available courses after checking prerequisites
        private function getAvailableCourses(){
            // Set prereqs array
            $username = "root";
            $password = "root"; 
            $dbname = "titama";
            $servername = "localhost";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            $prereqs = Array();
            $sql = "SELECT * FROM Prereqs;";
            $result =  $conn->query($sql) or die ("Error: " . mysql_error());
            while( $row = $result->fetch_assoc()){
                if(!array_key_exists($row['cid'] , $prereqs )){
                    $prereqs[$row['cid']] = [ [$row['pid']],[$row['standing']] ];
                }
                else{
                    $prereqs[$row['cid']][0][] = $row['pid'];
                }
            }
            // For each untaken course, check prereqs with taken courses
            $availables = Array();
            foreach($this->untakens as $uc){
                if($uc == "PHY133"){
                    if(in_array( "PHY131", $this->takens) || in_array( "MAT123", $this->takens)){
                        $availables[] = $uc;
                    }
                }
                elseif($uc == "PHY134"){
                    if( (in_array( "PHY132", $this->takens) && in_array( "PHY133", $this->takens)) || (in_array( "PHY131", $this->takens) && in_array( "PHY133", $this->takens))){
                        $availables[] = $uc;
                    }
                }
                else{
                    // first check standing
                    if($prereqs[$uc][1][0] == null || $_SESSION['user_info']->getStanding() >= $prereqs[$uc][1][0]){
                        // check prerequisites
                        $available = true;
                        foreach($prereqs[$uc][0] as $pre){
                            if(in_array( $pre, $this->takens)==false && $pre != null){
                                $available = false;
                                break;
                            }
                        }
                        if($available){
                            $availables[] = $uc;
                        }
                    } 
                }                               
            }
            $conn->close();
            return $availables;
        }
    }
?>