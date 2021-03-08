<?php
session_start();
if($_SESSION["abc"]==true)
{
  echo "<script>alert('".$_SESSION['error']."')</script>";
  $_SESSION["abc"]=false;
}
  if($_SESSION["login"])
  {
    header("Location:".$_SESSION["user_type"].".php");
  }
if($_SESSION["exist"])
{
  echo "<script>alert('".$_SESSION['exist']."')</script>";
  $_SESSION["exist"]="";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h1 class="display-5 ">LOGIN</h1>
            <form action="check.php" method="POST">
              <div class=" form-group first">
                   <select class="form-control" id="sel1" name="user_type">
                      <option name="student" value="student">STUDENT</option>
                      <option name="warden" value="warden">WARDEN</option>
                      <option name="mess_manager" value="mess_manager">MESS MANAGER</option>
                      <option name="clerk" value="clerk">CLERK</option>
                      <option name="clerk" value="attendant_and_gardener">ATTENDANT & GARDENER</option>
                    </select>
              </div>
              <div class="form-group first">
                <input type="text" class="form-control" placeholder="Email" id="username" name="email">
                <span id=email1></span>
              </div>
              <div class="form-group last mb-3">
                
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" >
                <span id="pwd1"></span>
              </div>
              
              <input type="submit" name="submit" value="Log In" class="btn btn-block btn-primary">
               <div class="d-flex mb-5 align-items-center">
                <!--<span class="mr-auto mt-3"><a href="forget_password.php" class="forgot-pass">Forgot Password</a></span>-->
                <span class="mr-auto mt-3"><a href="registration_page.php" class="forgot-pass">Sign Up</a></span>                
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>   
  </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>

</html>