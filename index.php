<!DOCTYPE HTML>  
<html lang="en">
        <head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        	<meta charset="UTF-8">
        	<link rel="stylesheet" href="css/stylesheet.css">
        	<script type="text/javascript" src="js/jquery.min.js"></script>
        	<script type="text/javascript" src="js/strength.js"></script> 
        	<title> Type Your Password To Test How Secure It Is </title>
        </head>
<body>
<!-- Start body section -->
  <div id="body" class="body">
    <!-- Start menu -->
          <div id="menu" class="menu">
            <p>
                <a href="index.html">Home</a> |
                <a href="index.html">Home 2</a> |
            </p>
          </div>
      <!-- End menu section -->
   <!-- Start body text -->
       <div id="body_text" class="body_text">

<?php

// define variables and set to empty values
$passwordErr = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["password"])) {
    $passwordErr = "A Password  is required";
  } else {
    $password = test_input($_POST["password"]);
  }
//End if post method

//defines a constant var and calculate current working directory
define('__ROOT__', getcwd());

//import the classes
require_once(__ROOT__.'/TestMyPassword.php'); 
require_once(__ROOT__.'/ManageDisplay.php'); 

$password="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["password"])) {
    $passwordErr = "BLANK PASSWORD";
  } else {
    $password = $_POST["password"];
  }

}
// Declare var and set it's type
$obj_test_my_password = new TestMyPassword;
//connects to the database
$obj_test_my_password->connect_to_database();
//this function will be given the password from the user
$obj_test_my_password->setPWD($password);
// retreives password from the get my password object, previously set by the set pwd method.
$my_pwd = $obj_test_my_password->getPWD();

$hack_details = $obj_test_my_password->get_hack_details();


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Test Your Password</h1>

<form method="post" action="index.php">
<label for="password"></label> 
<input type="password" name="password" id="fmPass" autofocus placeholder="Enter The Password You Want To Test" value="">
<input type="submit" name="submit" value="Test Password"> 

<?php echo $passwordErr;?>

  <div id="passwordIndicator" >
        <p>
            <span  id="possibilities" class="reset"></span>
        </p>
        <p>
        Time to crack using <input type="number" id="nodes" value="1" size="5" /> core(s):
        </p>
        <p>
        <span id="rates" class="reset"></span>
        </p>
    </div>
</form>

<?php
//this function  displays the results of the search
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $my_display = new ManageDisplay;
    // this will display  the contents of my_pwd
    $my_display->display_results($hack_details);
  } // end if Method == POST
?>

  <p>you can use This  strength meter when you're creating an account on any site. It will tell  you how many possible passwords there are based on the length and character classes used.</p>
  <p>For example, the password "1p" has 2 characters, one  a lowercase letter and one a number.  To brute force this password, there are 26 possible letters and 10 possible numbers which is (10 + 26) * (10 + 26) = 1,296 possibilities
    . Less than a second to crack!
  </p>
  <p>These numbers are only for demonstration purposes.  Please do your own research on password security!  The numbers are derived from <a href="http://hashcat.net/oclhashcat-plus/">hashcat's site</a>.</p>
  <br />

   </div>
  <!-- End body text -->
  <!-- Start Footer -->
  <div id="footer" class="footer">
    <p>Footer text goes here</p>
  </div>
  <!-- End Footer -->
   </div>
  <!-- End body section -->
</body>
</html>
