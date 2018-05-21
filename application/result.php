<?php
    require "../application/possible_schedules.php";
    require "../application/possible_courses.php";
    require "../application/user_info.php";
  
    session_start();
    if(isset($_POST['submit'])){
        if(!empty($_POST['wrt'])){
          foreach($_POST['wrt'] as $wrt){
              $_SESSION['user_info']->setPassedWRTCourse($wrt);
          }
        }
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

        // Get the set of courses that the user has satisfied prerequisites
        $possibleCourses = new PossibleCourses();
        $coursesCanTake = $possibleCourses->getPossibleCourses();
        
        // Get same timeline courses
        $sql = "SELECT * FROM Same_time;";
        $result =  $conn->query($sql) or die ("Error: " . mysql_error());
        $overlap = Array();
        while( $row = mysql_fetch_assoc( $result)){
            if(!in_array($overlap, $row['cid1'])){
                $overlap['cid1'] = Array($row['cid2']);
            }
            else{
              array_push($overlap['cid1'], $row['cid2']);
            }
        } 

        // Get possible schedules
        $possibleSchedules = new PossibleSchedules();
        $schedules = $possibleSchedules->getPossibleSchedules($coursesCanTake, $overlap);

        // Set json data
        $response = [
          'data' => []
        ];
        
        $n = 1;
        $array = [];
        for ($i = 0; $i < count($schedules); $i++) {
            $n *= count($schedules[$i]);
            $array[$i] = 0;
        }
        for ($j = 0; $j < $n; $j++) {
            for ($k = 0; $k < count($schedules); $k++) {
                // Put schedule in data array
                $sql = "SELECT * FROM Courses WHERE cid=".$schedules[$k][$array[$k]].";";
                $result =  $conn->query($sql) or die ("Error: " . mysql_error());
                $row = mysql_fetch_assoc( $result);
                $response['data']['schedule' . $n] = [
                  'cname'     => $row['cname'],
                  'lec_days'   => $row['lec_days'],
                  'rec_days'   => $row['rec_days'],
                  'lec_start' => [$row['lec_start_h'],$row['lec_start_m']],
                  'lec_end'   => [$row['lec_end_h'],$row['lec_end_m']],
                  'rec_start' => [$row['rec_start_h'],$row['rec_start_m']],
                  'rec_end'   => [$row['rec_end_h'],$row['rec_end_m']]
                ];
            }
            $array[count($schedules)-1]++;
            for ($l = count($schedules)-1; $l > 0; $l--) {
                if ($array[$l] >= count($schedules[$l])) {
                    $array[$l] = 0;
                    $array[$l - 1]++;
                } 
                else{
                  break;
                }
            }
        }
        // compare length of same_timeline_courses and minimum courses that the user want to take
        $conn->close();
        return json_encode($response);
    }

?>