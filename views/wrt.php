<?php 
require "../application/user_info.php";
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
    <link rel="icon" href="../img/favicon.png">
    <title>TITAMA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/index.css" >
      <link rel="stylesheet" href="../css/course.css" >
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead">
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
              <h1> Select the Writing courses that you have passed.</h1>
              <form method="post" action="result.php">
                   <table class="checkboxes">
                       <tr>
                            <td class="checkbox">
                                <input class="button" type="checkbox" name="wrt[]" value="WAE190" style="margin-right:10%;">WAE190
                            </td>
                           <td class="checkbox">
                                <input class="button" type="checkbox" name="wrt[]" value="WAE192" style="margin-right:10%;">WAE192
                            </td>
                           <td class="checkbox">
                               <input class="button" type="checkbox" name="wrt[]" value="WAE194" style="margin-right:10%;">WAE194
                           </td>
                           <td class="checkbox">
                               <input class="button" type="checkbox" name="wrt[]" value="WRT101" style="margin-right:10%;">WRT101
                           </td>
                           <td class="checkbox">
                               <input class="button" type="checkbox" name="wrt[]" value="WRT102" style="margin-right:10%;">WRT102
                           </td>
                       </tr>
                  </table>
                   <input type="submit" value="Submit" class="btn btn-lg btn-secondary"name="submit" id="submitButton">
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