<?php 
require "../user_info.php";
session_start();
if (!isset($_SESSION['user_info'])) {
    $_SESSION['user_info'] = new UserInfo();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Doeun Kim">
    <link rel="icon" href="img/favicon.png">
    <title>TITAMA</title>
      <script  type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
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
              <h1> Select the core CSE courses that you have passed.</h1>
              <form action="math.php" method="post">
                   <table class="checkboxes">
                       <tr>
                            <td class="checkbox">
                                <input class="button" type="checkbox" onclick ="clickHandler(this);" name="cse[]" value="CSE114">CSE114
                            </td>
                           <td class="checkbox">
                                <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE214">CSE214
                            </td>
                           <td class="checkbox">
                               <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE215">CSE215
                           </td>
                           <td class="checkbox">
                               <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE219">CSE219
                           </td>
                       </tr>
                       <tr>
                           <td class="checkbox">
                               <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE220">CSE220
                           </td>
                            <td class="checkbox">
                                <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE300">CSE300
                            </td>
                           <td class="checkbox">
                               <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE304">CSE304
                           </td>

                           <td class="checkbox">
                               <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE305">CSE305
                           </td>
                       </tr>
                       <tr>
                           <td class="checkbox">
                               <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE306">CSE306
                           </td>

                           <td class="checkbox">
                                <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE307">CSE307
                           </td>
                           <td class="checkbox">
                               <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE308">CSE308
                           </td>

                           <td class="checkbox" rowspan="2">
                               <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]"value="CSE310">CSE310<br>/ CSE346
                           </td>
                       </tr>
                       <tr>
                           <td class="checkbox">
                               <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE312">CSE312
                           </td>

                           <td class="checkbox">
                               <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE320">CSE320
                           </td>

                           <td class="checkbox">
                               <input class="button" type="checkbox" onclick="clickHandler(this);" name="cse[]" value="CSE373">CSE373
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
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script src="../js/cse.js" type="text/javascript"></script>
      <!--<script>
          function clickHandler(button){
              if(button.style.backgroundColor == "white"){
                    button.style.backgroundColor = "black";
                    button.style.color = "white";
                }
                else{
                    button.style.backgroundColor = "white";
                    button.style.color = "#753a88";
                }
          }
    </script>-->
  </body>
</html>