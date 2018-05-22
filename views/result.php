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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Doeun Kim">
    <link rel="icon" href="../img/favicon.png">
    <title>TITAMA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
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
                <a class="nav-link active" href="../index.html">Home</a>
                <a class="nav-link" href="about.html">About</a>
                <a class="nav-link" href="contact.html">Contact</a>
              </nav>
            </div>
          </div>
          <div class="inner-cover">
            <div class="timetables" style="margin-top:70px;">
            <input type="button" id="lastButton" value="Let's Check Timetables" class="btn btn-lg btn-secondary" onclick="result()">
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