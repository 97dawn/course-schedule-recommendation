<?php
    class PossibleSchedules{
        
        public function getPossibleSchedules($coursesCanTake, $overlap){       
            // Get possible schedules
            $possible_schedules = [];
            foreach($coursesCanTake as $course){
                if($course == "PHY131"){
                    $array = ["PHY131.1","PHY131.2"];
                    foreach($overlap["PHY131.1"] as $cid2){
                        if( $cid2 != NULL && in_array($coursesCanTake, substr($cid2,0,7)) ){
                            array_push($array, $cid2 );
                        }
                    }
                    foreach($overlap["PHY131.2"] as $cid2){
                        if( $cid2 != NULL && in_array($coursesCanTake, substr($cid2,0,7)) ){
                            array_push($array, $cid2 );
                        }
                    }
                }
                elseif($course == "PHY133"){
                    $array = ["PHY133.1", "PHY133.2"];
                    foreach($overlap["PHY133.1"] as $cid2){
                        if($cid2 != NULL && in_array($coursesCanTake, substr($cid2,0,7)) ){
                            array_push($array, $cid2 );
                        }
                    }
                    foreach($overlap["PHY133.2"] as $cid2){
                        if( $cid2 != NULL && in_array($coursesCanTake, substr($cid2,0,7)) ){
                            array_push($array, $cid2 );
                        }
                    }
                }
                elseif($course == "PHY134"){
                    $array = ["PHY134.1", "PHY134.2"];
                    foreach($overlap["PHY134.1"] as $cid2){
                        if( $cid2 != NULL && in_array($coursesCanTake, substr($cid2,0,7)) ){
                            array_push($array, $cid2 );
                        }
                    }
                    foreach($overlap["PHY134.2"] as $cid2){
                        if($cid2 != NULL && in_array($coursesCanTake, substr($cid2,0,7)) ){
                            array_push($array, $cid2 );
                        }
                    }
                }
                else{
                    $array = [$course];
                    foreach($overlap[$course] as $cid2){
                        if($cid2 != NULL && in_array($coursesCanTake, substr($cid2,0,7)) ){
                            array_push($array, $cid2 );
                        }
                    }
                }
            }
            return $possible_schedules;
        }
    }
?>