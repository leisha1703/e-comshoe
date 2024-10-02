<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "ipsleisha1703";
$dbname = "myproj";

$id = $_POST["id"];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	
  die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM unprocessed WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  header("Location: cartdemo.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

