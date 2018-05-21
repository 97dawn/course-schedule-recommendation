<?php
    class PossibleSchedules{
        
        public function getPossibleSchedules($coursesCanTake, $overlap){       
            // Get possible schedules
            $possible_schedules = [];
            $copyCoursesCanTake = $coursesCanTake;
            foreach($coursesCanTake as $course){
                if($course == "PHY131"){
                    $array = ["PHY131.1","PHY131.2"];
                    foreach($overlap["PHY131.1"] as $cid2){
                        if( $cid2 != null && in_array(substr($cid2,0,7),$coursesCanTake) 
                        && in_array(substr($cid2,0,7),$copyCoursesCanTake)){
                            $array[] = $cid2;
                            if (($key = array_search($cid2, $array)) !== false) {
                                array_splice($copyCoursesCanTake, $key, 1);
                            }
                        }
                    }
                    foreach($overlap["PHY131.2"] as $cid2){
                        if( $cid2 != null &&in_array(substr($cid2,0,7),$coursesCanTake)
                        && in_array(substr($cid2,0,7),$copyCoursesCanTake) ){
                            $array[] = $cid2;
                            if (($key = array_search($cid2, $array)) !== false) {
                                array_splice($copyCoursesCanTake, $key, 1);
                            }
                        }
                    }
                    $possible_schedules[] = $array;
                }
                elseif($course == "PHY133"){
                    $array = ["PHY133.1", "PHY133.2"];
                    foreach($overlap["PHY133.1"] as $cid2){
                        if($cid2 != null && in_array(substr($cid2,0,7),$coursesCanTake) 
                        && in_array(substr($cid2,0,7),$copyCoursesCanTake)){
                            $array[] = $cid2;
                            if (($key = array_search($cid2, $array)) !== false) {
                                array_splice($copyCoursesCanTake, $key, 1);
                            }
                        }
                    }
                    foreach($overlap["PHY133.2"] as $cid2){
                        if( $cid2 != null &&in_array(substr($cid2,0,7),$coursesCanTake)
                        && in_array(substr($cid2,0,7),$copyCoursesCanTake) ){
                            $array[] = $cid2;
                            if (($key = array_search($cid2, $array)) !== false) {
                                array_splice($copyCoursesCanTake, $key, 1);
                            }
                        }
                    }
                    $possible_schedules[] = $array;
                }
                elseif($course == "PHY134"){
                    $array = ["PHY134.1", "PHY134.2"];
                    foreach($overlap["PHY134.1"] as $cid2){
                        if( $cid2 != null &&in_array(substr($cid2,0,7),$coursesCanTake)
                        && in_array(substr($cid2,0,7),$copyCoursesCanTake) ){
                            $array[] = $cid2;
                            if (($key = array_search($cid2, $array)) !== false) {
                                array_splice($copyCoursesCanTake, $key, 1);
                            }
                        }
                    }
                    foreach($overlap["PHY134.2"] as $cid2){
                        if($cid2 != null && in_array(substr($cid2,0,7),$coursesCanTake) 
                        && in_array(substr($cid2,0,7),$copyCoursesCanTake)){
                            $array[] = $cid2;
                            if (($key = array_search($cid2, $array)) !== false) {
                                array_splice($copyCoursesCanTake, $key, 1);
                            }
                        }
                    }
                    $possible_schedules[] = $array;
                }
                else{
                    $array = [$course];
                    foreach($overlap[$course] as $cid2){
                        if($cid2 != null && in_array(substr($cid2,0,7),$coursesCanTake)
                        && in_array(substr($cid2,0,7),$copyCoursesCanTake) ){
                            $array[] = $cid2;
                            if (($key = array_search($cid2, $array)) !== false) {
                                array_splice($copyCoursesCanTake, $key, 1);
                            }
                        }
                    }
                    $possible_schedules[] = $array;
                }
            }
            return $possible_schedules;
        }
    }
?>