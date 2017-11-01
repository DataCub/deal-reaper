<?php
   include 'reaper_db_connection.php';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $query = "SELECT * FROM user_login_info where username = $_POST[username] AND password = $_POST[password]";
      $result = mysqli_query($conn, $query);
      
      $row = mysqli_fetch_row($result);

      if(!empty($row['username']) AND !empty($row['password'])) {
        //$_SESSION['Username'] = $row['Password'];
        echo "<p align=center>SUCCESSFULLY LOGIN TO USER PROFILE PAGE</p>" ;
        header('Location: HTTP://localhost/datareaper/index.html');
      } else {
        echo "<p align=center>Not Logged in; Enter Username and Password</p>";
      }
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

      <!-- Banner -->
      <div class="login">
      	<h1 style="font-weight: bold">Login</h1>
			<form method="post">
	    		<input type="text" name="email" placeholder="Username" required="required" title="Email"/>
	        	<input type="password" name="c" placeholder="Password" required="required" />
	        	<button class="btn btn-primary btn-block btn-large">Submit</button>
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
