<?php
    class PossibleSchedules{
        
        public function getPossibleSchedules($coursesCanTake, $overlap){       
            // Get possible schedules
            $possible_schedules = [];
            $copyCoursesCanTake = [];
            // Init copyCoursesCanTake
            foreach($coursesCanTake as $c){
                $copyCoursesCanTake[] = $c;
            }
            foreach($coursesCanTake as $course){
                if($course == "PHY131"){
                    if(in_array($course, $copyCoursesCanTake)){
                        $array = ["PHY131.1","PHY131.2"];
                        foreach($overlap["PHY131.1"] as $cid2){
                            if( $cid2 != null  && in_array(substr($cid2,0,7),$copyCoursesCanTake)){
                                $array[] = $cid2;
                                foreach($copyCoursesCanTake as $c){
                                    if($c == substr($cid2,0,7)|| $c == substr($course,0,7)){
                                        array_splice($copyCoursesCanTake, array_search($c, $copyCoursesCanTake), 1);
                                    }
                                }
                            }
                        }
                        foreach($overlap["PHY131.2"] as $cid2){
                            if( $cid2 != null && in_array(substr($cid2,0,7),$copyCoursesCanTake) ){
                                $array[] = $cid2;
                                foreach($copyCoursesCanTake as $c){
                                    if($c == substr($cid2,0,7)|| $c == substr($course,0,7)){
                                        array_splice($copyCoursesCanTake, array_search($c, $copyCoursesCanTake), 1);
                                    }
                                }
                            }
                        }
                        $possible_schedules[] = $array;
                    }
                }
                elseif($course == "PHY133"){
                    if(in_array($course, $copyCoursesCanTake)){
                        $array = ["PHY133.1", "PHY133.2"];
                        foreach($overlap["PHY133.1"] as $cid2){
                            if($cid2 != null && in_array(substr($cid2,0,7),$copyCoursesCanTake)){
                                $array[] = $cid2;
                                foreach($copyCoursesCanTake as $c){
                                    if($c == substr($cid2,0,7)|| $c == substr($course,0,7)){
                                        array_splice($copyCoursesCanTake, array_search($c, $copyCoursesCanTake), 1);
                                    }
                                }
                            }
                        }
                        foreach($overlap["PHY133.2"] as $cid2){
                            if( $cid2 != null && in_array(substr($cid2,0,7),$copyCoursesCanTake) ){
                                $array[] = $cid2;
                                foreach($copyCoursesCanTake as $c){
                                    if($c == substr($cid2,0,7)|| $c == substr($course,0,7)){
                                        array_splice($copyCoursesCanTake, array_search($c, $copyCoursesCanTake), 1);
                                    }
                                }
                            }
                        }
                        $possible_schedules[] = $array;
                    }
                }
                elseif($course == "PHY134"){
                    if(in_array($course, $copyCoursesCanTake)){
                        $array = ["PHY134.1", "PHY134.2"];
                        foreach($overlap["PHY134.1"] as $cid2){
                            if( $cid2 != null && in_array(substr($cid2,0,7),$copyCoursesCanTake) ){
                                $array[] = $cid2;
                                foreach($copyCoursesCanTake as $c){
                                    if($c == substr($cid2,0,7)|| $c == substr($course,0,7)){
                                        array_splice($copyCoursesCanTake, array_search($c, $copyCoursesCanTake), 1);
                                    }
                                }
                            }
                        }
                        foreach($overlap["PHY134.2"] as $cid2){
                            if($cid2 != null  && in_array(substr($cid2,0,7),$copyCoursesCanTake)){
                                $array[] = $cid2;
                                foreach($copyCoursesCanTake as $c){
                                    if($c == substr($cid2,0,7)|| $c == substr($course,0,7)){
                                        array_splice($copyCoursesCanTake, array_search($c, $copyCoursesCanTake), 1);
                                    }
                                }
                            }
                        }
                        $possible_schedules[] = $array;
                    }
                }
                else{
                    if(in_array($course, $copyCoursesCanTake)){
                        $array = [$course];
                        foreach($overlap[$course] as $cid2){
                            if($cid2 != null && in_array(substr($cid2,0,7),$copyCoursesCanTake) ){
                                $array[] = $cid2;
                                foreach($copyCoursesCanTake as $c){
                                    if($c == substr($cid2,0,7) || $c == substr($course,0,7)){
                                        array_splice($copyCoursesCanTake, array_search($c, $copyCoursesCanTake), 1);
                                    }
                                }
                            }
                        }
                        $possible_schedules[] = $array;
                    }                    
                }
            }
            return $possible_schedules;
        }
    }
?>