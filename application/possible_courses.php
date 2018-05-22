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
                $this->allOffers[] = $row['cname'];
            }
            $conn->close();
        }

        // Get untaken courses among Fall 2018 courses
        private function setUntakensAndTakens(){   
            session_start();
            foreach($_SESSION['user_info']->getCSECourses() as $cse=>$took){
                if(!$took){
                    if(in_array($cse, $this->allOffers)){
                        $this->untakens[] = $cse;
                    }
                }
                else{
                    $this->takens[] = $cse;
                }
            }
            foreach($_SESSION['user_info']->getNSCourses() as $ns=>$took){
                if(!$took){
                    if(in_array($ns, $this->allOffers)){
                        $this->untakens[] = $ns;
                    }
                }
                else{
                    $this->takens[] = $ns;
                }
            }
            foreach($_SESSION['user_info']->getMATHCourses() as $math=>$took){
                if(!$took){
                    if(in_array($math, $this->allOffers)){
                        $this->untakens[] = $math;
                    }
                }
                else{
                    $this->takens[] = $math;
                }
            }
            foreach($_SESSION['user_info']->getWRTCourses() as $wrt=>$took){
                if(!$took){
                    if(in_array($wrt, $this->allOffers)){
                        $this->untakens[] = $wrt;
                    }
                }
                else{
                    $this->takens[] = $wrt;
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
                if(!in_array($row['cid'] , $prereqs )){
                    $prereqs[$row['cid']] = [[$row['pid']],[$row['standing']] ];
                }
                else{
                    $prereqs[$row['cid']][0][] = $row['pid'];
                }
            }
            // For each untaken course, check prereqs with taken courses
            $availables = Array();
            foreach($this->untakens as $uc){
                // first check standing
                if($prereqs[$uc][1][0] == null || $_SESSION['user_info']->getStanding() >= $prereqs[$uc][1][0]){
                    // check prerequisites
                    $available = true;
                    foreach($prereqs[$uc][0] as $pre){
                        if(!in_array( $pre, $this->takens) && $pre != null){
                            $available &= false;
                        }
                    }
                    if($available){
                        $availables[] = $uc;
                    }
                }                
            }
            $conn->close();
            return $availables;
        }
    }
?>