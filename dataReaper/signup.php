<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';

function signUp(){
  session_start();
  include 'reaper_db_connection.php';


  $mail = new PHPMailer;
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 2;
  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
  $mail->Port = 587;
  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'tls';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "cstestemail21@gmail.com";
  //Password to use for SMTP authentication
  $mail->Password = "dontsayit21";
  //Set who the message is to be sent from
  $mail->setFrom('cstestemail21@gmail.com', 'First Last');
  //Set an alternative reply-to address
  $email = trim($_POST['email']);
  $mail->addAddress($email, 'My Friend');
  $mail->Subject  = 'First PHPMailer Message';
  $mail->Body     = 'Congrats, you\'ve succesfully signed up for DealReaper.com.';
  if(!$mail->send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent.';
  }

  $name = trim($_POST['name']);



  $username = trim($_POST['username']);

  $password = trim($_POST['password']);

  $query1 = mysql_query("SELECT * FROM user_login_info where Email = '$_POST[email]'");

  $address = trim($_POST['address']);

  $city = trim($_POST['city']);

  $state = trim($_POST['state']);

  $zip = trim($_POST['zip']);

  $query = NULL;
  $res = NULL;
  $emailinUse = false;

  if($query1 && mysql_num_rows($query1)>0){
    $res = false;
  } else {
    $query = "INSERT IGNORE INTO user_login_info(Name,Email,Username,Password,Address,City,State,Zipcode) VALUES('$name','$email','$username','$password','$address','$city','$state','$zip')";
    $res = mysql_query($query);
  }

  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   header('Location: HTTP://localhost/datareaper/index.html');

  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
   $emailinUse = true;
   echo'<h1 style="text-align:center;" > Email Already in Use, Please Log In </h1>';
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
        <input type="text" name="name" placeholder="Full Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" required="required" title="Must be letters A-Z only" />
    	  <input type="text" name="email" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}" required="required" title="Enter a valid email"/>
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
