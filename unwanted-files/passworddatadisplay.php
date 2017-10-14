<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "martin";
$password = "MouseCatDog";
$dbname = "PASSWORDS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Password, Hack_ID FROM Hacked_Passwords";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
		<tr>
			<th>Password</th>
			<th>Hack ID</th>
		</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Password"]. "</td><td>" . $row["Hack_ID "].  "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
