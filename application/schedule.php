<?php
    require "possible_schedules.php";
    require "possible_courses.php";
    require "user_info.php";
    
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
    $overlap = [];
    while( $row = $result->fetch_assoc()){
        $overlap[$row["cid1"]][] = $row["cid2"];
    } 

    // Get possible schedules
    $possibleSchedules = new PossibleSchedules();
    $schedules = $possibleSchedules->getPossibleSchedules($coursesCanTake, $overlap);
    //print_r("untakens: ".json_encode($possibleCourses->untakens));
    //print_r("Courses can take: ".json_encode($coursesCanTake));

    // Set json data
    $response = [
      'schedule' => []
    ];
    if(count($schedules) == 0){
        $response['schedule']=-1;
    }
    else{
        $n = 1;
        $array = [];
        for ($i = 0; $i < count($schedules); $i++) {
            $n *= count($schedules[$i]);
            $array[$i] = 0;
        }
        for ($j = 0; $j < $n; $j++) {
            for ($k = 0; $k < count($schedules); $k++) {
                // Put schedule in data array
                $sql = "SELECT * FROM Courses WHERE id='" . $schedules[$k][$array[$k]] . "';";
                $result =  $conn->query($sql) or die ("Error: " . mysql_error());
                $row = $result->fetch_assoc();
                $response['schedule'][$j][] = [
                  'cname'     => $row['cname'],
                  'lec_days'   => $row['lec_days'],
                  'rec_days'   => $row['rec_days'],
                  'lec_start' => [intval($row['lec_start_h']),intval($row['lec_start_m'])],
                  'lec_end'   => [intval($row['lec_end_h']),intval($row['lec_end_m'])],
                  'rec_start' => [intval($row['rec_start_h']),intval($row['rec_start_m'])],
                  'rec_end'   => [intval($row['rec_end_h']),intval($row['rec_end_m'])]
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
    }
    
    $conn->close();
    echo(json_encode($response)) ;
?>