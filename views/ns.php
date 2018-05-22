<?php 
require "../application/user_info.php";
session_start();
if(isset($_POST['submit'])){
    if(!empty($_POST['math'])){
        foreach($_POST['math'] as $math){
            $_SESSION['user_info']->setPassedMATHCourse($math);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Doeun Kim">
    <link rel="icon" href="../img/favicon.png">
    <title>TITAMA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <script src="//code.jquery.com/jquery-1.11.1.min.js" ></script>
      <link rel="stylesheet" href="../css/index.css" >
      <link rel="stylesheet" href="../css/course.css" >
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
              <h1> Select the Natural Science courses that you have passed.</h1>
              <form action="wrt.php" method="post">
                   <table class="checkboxes">
                       <tr>
                            <td class="checkbox">
                                <input class="button" type="checkbox" name="ns[]" value="PHY131" style="margin-right:10%;">PHY131
                            </td>
                           <td class="checkbox">
                                <input class="button" type="checkbox" name="ns[]" value="PHY132" style="margin-right:10%;">PHY132
                            </td>
                           <td class="checkbox">
                               <input class="button" type="checkbox" name="ns[]" value="PHY133" style="margin-right:10%;">PHY133
                           </td>
                           <td class="checkbox">
                               <input class="button" type="checkbox" name="ns[]" value="PHY134" style="margin-right:10%;">PHY134
                           </td>
                           <td class="checkbox">
                               <input class="button" type="checkbox" name="ns[]" value="BIO201" style="margin-right:10%;">BIO201
                           </td>
                       </tr>
                  </table>
                   <input type="submit" value="Next" class="btn btn-lg btn-secondary" name="submit" id="submitButton">
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
  </body>
</html>