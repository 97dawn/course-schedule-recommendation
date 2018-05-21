<?php
class UserInfo{
    private $CSEcourses = ["CSE114"=>0,"CSE214"=>0,
                               "CSE215"=>0,"CSE219"=>0,
                               "CSE220"=>0,"CSE300"=>0,
                               "CSE304"=>0,"CSE305"=>0,
                               "CSE306"=>0,"CSE307"=>0,
                               "CSE308"=>0,"CSE310/346"=>0,
                               "CSE312"=>0,"CSE320"=>0,"CSE373"=>0];
    private $standing;
    private $MATHcourses = ["MAT123"=>0,"AMS151"=>0,
                               "AMS161"=>0,"AMS310"=>0,
                               "AMS301"=>0];
    private $NScourses = ["PHY131"=>0,"PHY132"=>0,
                               "PHY133"=>0,"PHY134"=>0, "BIO201"=>0];
    private $WRTcourses = ["WAE190"=>0,"WAE192"=>0,
                               "WAE194"=>0,"WRT101"=>0, "WRT102"=>0];
    
    // Get standing
    public function getStanding(){
        return $this->standing;
    }
    // Get CSEcourses
    public function getCSECourses(){
        return $this->CSEcourses;
    }

    // Get MATHcourses
    public function getMATHCourses(){
        return $this->MATHcourses;
    }

    // Get NScourses
    public function getNSCourses(){
        return $this->NScourses;
    }

    // Get WRTcourses
    public function getWRTCourses(){
        return $this->WRTcourses;
    }

    // Set standing
    public function setStanding($input){
        $this->standing = $input;
    }
	
    // Set passed CSE courses
    public function setPassedCSECourse($course){
        $this->CSEcourses[$course] = 1;
    }
    
    // Set passed Math courses
    public function setPassedMATHCourse($course){
        $this->MATHcourses[$course] = 1;
    }
    
    // Set passed PHY courses
    public function setPassedNSCourse($course){
        $this->NScourses[$course] = 1;
    }

    // Set passed PHY courses
    public function setPassedWRTCourse($course){
        $this->WRTcourses[$course] = 1;
    }

    // Display the order for debugging purposes.
    public function display() {
        print_r($this->standing);
        print_r($this->CSEcourses);
        print_r($this->MATHcourses);
        print_r($this->NScourses);
        print_r($this->WRTcourses);
    }
}
?>