<?php

$servername = "localhost";
$username = "root";
$password = "ipsleisha1703";
$dbname = "myproj";

		//$id=$_POST["id"];
		$username1=$_POST["username1"];
 
	   
	  $questions=$_POST["questions"];
	   $message=$_POST["message"];
	   
	    
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE userinformation SET questions='$questions', message='$message',WHERE username='$username1'  ";





if (mysqli_query($conn, $sql)) {
  echo "<a href='index.php'>Click here</a> to relogin to see the updates.";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!--writa a program to update the password, system has to ask about our previously created password ,
given password if both are same then give the option to enter a new password -->