<?php
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
    
    // 
    $sql = "SELECT * FROM Courses;";
    $result =  $conn->query($sql) or die ("Error: " . mysql_error());
    
    $conn->close();
?>