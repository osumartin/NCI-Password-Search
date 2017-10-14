

<!DOCTYPE HTML>  
<html>
<head>

</head>
<body>  

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

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Test Your Password</h2>
<!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
<form method="post" action="myclass.php">
<label for="password">Password:</label>  <input type="password" name="password" autofocus>

<?php echo $passwordErr;?></span>
  <br><br>


  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $password;
?>

</body>
</html>
