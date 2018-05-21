<?php
    class PossibleCourses{
        private $availableToTake = Array();
        private $allOffers = Array();
        private $untakens = Array();
        private $takens = Array();
        
        public function getPossibleCourses(){       
            setAllOffers();
            setUntakensAndTakens();
            return getAvailableCourses();
        }

        // Set all Fall 2018 offering courses
        private function setAllOffers(){
            $sql = "SELECT cname FROM Courses;";
            $result =  $conn->query($sql) or die ("Error: " . mysql_error());
            while( $row = mysql_fetch_assoc( $result)){
                array_push($allOffers, $row['cname']);
            }
        }

        // Get untaken courses among Fall 2018 courses
        private function setUntakensAndTakens(){      
            session_start();
            foreach($_SESSION['user_info']->getCSECourses() as $cse=>$took){
                if(!$took){
                    if(in_array($cse, $allOffers)){
                        array_push($untakens, $cse);
                    }
                }
                else{
                    array_push($takens, $cse);
                }
            }
            foreach($_SESSION['user_info']->getNSCourses() as $ns=>$took){
                if(!$took){
                    if(in_array($ns, $allOffers)){
                        array_push($untakens, $ns);
                    }
                }
                else{
                    array_push($takens, $ns);
                }
            }
            foreach($_SESSION['user_info']->getMATHCourses() as $math=>$took){
                if(!$took){
                    if(in_array($math, $allOffers)){
                        array_push($untakens, $math);
                    }
                }
                else{
                    array_push($takens, $math);
                }
            }
            foreach($_SESSION['user_info']->getWRTCourses() as $wrt=>$took){
                if(!$took){
                    if(in_array($wrt, $allOffers)){
                        array_push($untakens, $wrt);
                    }
                }
                else{
                    array_push($takens, $wrt);
                }
            }
        }

        // Get available courses after checking prerequisites
        private function getAvailableCourses(){
            // Set prereqs array
            $prereqs = Array();
            $sql = "SELECT * FROM Prereqs;";
            $result =  $conn->query($sql) or die ("Error: " . mysql_error());
            while( $row = mysql_fetch_assoc( $result)){
                if(!in_array($prereqs, $row['cid'])){
                    $prereqs[$row['cid']]=Array();
                    array_push($prereqs[$row['cid']], Array($row['pid']));
                    array_push($prereqs[$row['cid']], Array($row['standing']));
                }
                else{
                    array_push($prereqs[$row['cid']][0], $row['pid']);
                }
            }
            // For each untaken course, check prereqs with taken courses
            $availables = Array();
            foreach($untakens as $uc){
                // first check standing
                if($prereqs[$uc][1][0] == null || $_SESSION['standing'] >= $$prereqs[$uc][1][0]){
                    // check prerequisites
                    $available = true;
                    foreach($$prereqs[$uc][0] as $pre){
                        if(!in_array($takens, $pre)){
                            $available &= false;
                        }
                    }
                    if($available){
                        array_push($availables, $uc);
                    }
                }                
            }
            return $availables;
        }
    }
?>