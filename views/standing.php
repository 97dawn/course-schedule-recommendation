
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Doeun Kim">
        <link rel="icon" href="../img/favicon.png">
        <title>TITAMA</title>
        <script  src="//code.jquery.com/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/index.css" >
        <link rel="stylesheet" href="../css/course.css" >
        <script src="../js/check.js"></script>
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
                        <h1> Select your current academic standing.</h1>
                        <form action="cse.php" method="post" onsubmit="return checkCheckboxes();">
                            <table style="margin-left:auto; margin-right:auto;" class="checkboxes">
                                <tr>
                                    <td class="checkbox">
                                        <input class="button" type="checkbox" name="u1" value="U1" style="margin-right:10%;"onclick="uncheckOthers(this);">U1
                                    </td>
                                    <td class="checkbox">
                                        <input class="button" type="checkbox" name="u2" value="U2" style="margin-right:10%;"onclick="uncheckOthers(this);">U2
                                    </td>
                                    <td class="checkbox">
                                        <input class="button" type="checkbox" name="u3" value="U3" style="margin-right:10%;"onclick="uncheckOthers(this);">U3
                                    </td>
                                    <td class="checkbox">
                                        <input class="button" type="checkbox" name="u4" value="U4" style="margin-right:10%;"onclick="uncheckOthers(this);">U4
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
    </body>
</html>