<?php

$servername = "localhost";
$username = "root";
$password = "ipsleisha1703";
$dbname = "myproj";

		$id=$_POST["id"];
		$vendor_username=$_POST["vendor_username"];
 
	   $vendor_name=$_POST["vendor_name"];
	   $vendor_city=$_POST["vendor_city"];
	   $vendor_contact=$_POST["vendor_contact"];
	   //$userpass=$_POST["userpass"];
	   
	   $vendor_billingaddress=$_POST["vendor_billingaddress"];
	   $vendor_dob=$_POST["vendor_dob"];
	   
	    
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE userinformation SET username='$vendor_username',name='$vendor_name',city='$vendor_city',contact='$vendor_contact', billingaddress='$vendor_billingaddress', dob='$vendor_dob' WHERE id='$id'";





if (mysqli_query($conn, $sql)) {
  echo "<a href='index.php'>Click here</a> to relogin to see the updates.";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!--writa a program to update the password, system has to ask about our previously created password ,
given password if both are same then give the option to enter a new password -->