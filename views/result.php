<?php
    require "../application/user_info.php";
  
    session_start();
    if(isset($_POST['submit'])){
      if(!empty($_POST['wrt'])){
        foreach($_POST['wrt'] as $wrt){
            $_SESSION['user_info']->setPassedWRTCourse($wrt);
        }
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Doeun Kim">
    <link rel="icon" href="img/favicon.png">
    <title>TITAMA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css" >
    <link rel="stylesheet" href="../js/timetable.js-master/dist/styles/timetablejs.css">
    <script src="../js/timetable.js-master/dist/scripts/timetable.js"></script>
      <script src="../js/result.js"></script>
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">TITAMA</h3>
              <nav class="nav nav-masthead">
                <a class="nav-link active" href="index.html">Home</a>
                <a class="nav-link" href="views/about.html">About</a>
                <a class="nav-link" href="views/contact.html">Contact</a>
              </nav>
            </div>
          </div>
          <div class="inner cover">
            <div id="timetable">
              <form onsubmit="result()">
              <input type="submit" value="Let's Check Timetables" class="btn btn-lg btn-secondary" id="submitButton">
              </form>
            </div>
          </div>
          <div class="mastfoot">
            <div class="inner">
              <p>All right reserved (c) 2018 Doeun Kim</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>