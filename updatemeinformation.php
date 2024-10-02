<?php

$servername = "localhost";
$username = "root";
$password = "ipsleisha1703";
$dbname = "myproj";

		$customer_id=$_POST["customer_id"];
		$customer_username=$_POST["customer_username"];
 
	   $customer_name=$_POST["customer_name"];
	   $customer_city=$_POST["customer_city"];
	   $customer_contact=$_POST["customer_contact"];
	   //$userpass=$_POST["userpass"];
	   
	   $customer_billingaddress=$_POST["customer_billingaddress"];
	   $customer_dob=$_POST["customer_dob"];
	   
	    
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE userinformation SET username='$customer_username',name='$customer_name',city='$customer_city',contact='$customer_contact', billingaddress='$customer_billingaddress', dob='$customer_dob' WHERE id='$customer_id'";





if (mysqli_query($conn, $sql)) {
  echo "<a href='index.php'>Click here</a> to relogin to see the updates.";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!--writa a program to update the password, system has to ask about our previously created password ,
given password if both are same then give the option to enter a new password -->