<?php

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

//this function  displays the results of the search

$my_display = new ManageDisplay;
// this will display  the contents of my_pwd
$my_display->display_results($hack_details);

?>
