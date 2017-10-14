<!DOCTYPE html>
<html>
<head>
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

$sql = "SELECT ID, Hack_Date, Hack_Discription FROM Hack_Details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
		<tr>
			<th>ID</th>
			<th>Hack Discription</th>
			<th>Hack Date</th>
		</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Hack_Discription"]. "</td><td>" . $row["Hack_Date"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
