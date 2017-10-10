<?php
function signUp(){
  session_start();
  include 'reaper_db_connection.php';
  $name = trim($_POST['name']);

  $email = trim($_POST['email']);

  $username = trim($_POST['username']);

  $password = trim($_POST['password']);

  $address = trim($_POST['address']);

  $city = trim($_POST['city']);

  $state = trim($_POST['state']);

  $zip = trim($_POST['zip']);

  $query = NULL;
  $res = NULL;
  $query = "INSERT IGNORE INTO user_login_info(Name,Email,Username,Password,Address,City,State,Zipcode) VALUES('$name','$email','$username','$password','$address','$city','$state','$zip')";
  $res = mysql_query($query);

  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   header('Location: HTTP://localhost/datareaper/index.html');

  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }

}

if(isset($_POST['signupBttn']))
{
	signUp();
}

 ?>

﻿<!DOCTYPE HTML>
<!--
  Landed by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>DealReaper</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  </head>
  <body class="landing">
    <div id="page-wrapper">

      <!-- Header -->
        <header id="header">
        <div  class = "header">
          <h1 id="logo"><img src="images/logo.png" style="float:right;width:40px;height:40px;" align = "middle">
          <a href="index.html">DealReaper</a></h1>
        </div>
          <nav id="nav">
            <ul>
              <li><a href="index.html">Home</a></li>
<!--              <li>
                <a href="#">About Us</a>
                <ul>
                  <li><a href="left-sidebar.html">Left Sidebar</a></li>
                  <li><a href="right-sidebar.html">Right Sidebar</a></li>
                  <li><a href="no-sidebar.html">No Sidebar</a></li>
                  <li>
                    <a href="#">Submenu</a>
                    <ul>
                      <li><a href="#">Option 1</a></li>
                      <li><a href="#">Option 2</a></li>
                      <li><a href="#">Option 3</a></li>
                      <li><a href="#">Option 4</a></li>
                    </ul>
                  </li>
                </ul>
              </li> -->
              <li><a href="elements.html">About Us</a></li>
              <li><a href="signup.php" class="button">Sign Up</a></li>
              <li><a href="login.php" class="button special">Log In</a></li>
            </ul>
          </nav>
        </header>
    
  <div class="login">
	<h1>Sign Up</h1>
    <form method="post">
        <input type="text" name="name" placeholder="Full Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" required="required" title="Enter a real name" />
    	  <input type="text" name="email" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}" required="required" title="Enter a real email"/>
        <input type="text" name="username" placeholder="Username" required="required" />
        <input type="password" name="c" placeholder="Password" required="required" />
        <input type="password" name="password" placeholder="Confirm Password" required="required" />
        <input type="text" name="address" placeholder="Address" required="required" />
        <input type="text" name="city" placeholder="City" pattern="[a-zA-Z][a-zA-Z ?]{2,}" required="required" title="Enter a real City" />
        <input type="text" name="state" placeholder="State" pattern = "[A-Z][A-Z]" required="required" title="Enter a real State" />
        <input type="text" name="zip" placeholder="Zipcode" pattern="[0-9]{5}" required="required" title="Enter a real zip"/>

        <button type="submit" class="btn btn-primary btn-block btn-large" name = "signupBttn">Submit</button>
    </form>
  </div>

      <!-- Footer -->
        <footer id="footer">
          <ul class="icons">
            <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
            <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
            <li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
          </ul>
          <ul class="copyright">
            <li>&copy; DealReaper. All rights reserved.</li><li>
          </ul>
        </footer>

    </div>

    <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.scrolly.min.js"></script>
      <script src="assets/js/jquery.dropotron.min.js"></script>
      <script src="assets/js/jquery.scrollex.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="js/index.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="assets/js/main.js"></script>

  </body>
</html>