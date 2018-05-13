<?php 
require "../user_info.php";
session_start();
if(isset($_POST['submit'])){
    if(!empty($_POST['ns'])){
        foreach($_POST['ns'] as $ns){
            $_SESSION['user_info']->setPassedNSCourse($ns);
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
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" href="../css/index.css" >
      <link rel="stylesheet" href="../css/min_course.css" >
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
          <div class="inner cover">
              <h1> Choose your total minimum number of CSE/Math/Natural Science courses  you will take.</h1>
              <form action=".php" method="post">
                    <div class="sliderContainer">
                        <input type="range" min="1" max="6" value="4" class="slider">
                        <div class="putValue">4 courses</div>
                  </div>
                   <input type="submit" value="Finish" class="btn btn-lg btn-secondary" id="submitButton">
              </form>
            </div>
            <div class="mastfoot">
                <div class="inner">
                    <p>All right reserved (c) 2018 Doeun Kim</p>
                </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        $("input.slider").on("input",function(e){
            $( "div.putValue" ).text( $(e.target).val()+" credits");
        });
      </script>
  </body>
</html>