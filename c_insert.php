<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "ipsleisha1703";
$dbname = "myproj";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$customer_username = $_SESSION["customer_username"];
$vendoruserid = $_POST["vendorname"]; 
$itemname = $_POST["itemname"];
$customer_name = $_SESSION["customer_name"]; 
$customer_city = $_SESSION["customer_city"]; 
$customer_contact = $_SESSION["customer_contact"]; 
$customer_billingaddress = $_SESSION["customer_billingaddress"]; 
$inquiry = $_POST["inquiry"]; 


$insertQuery = "INSERT INTO vendor_inquiries (customer_id, vendor_id, item_name, customer_name, city, contact, billing_address, inquiry, reply) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, '')";



$stmt = mysqli_prepare($conn, $insertQuery);


mysqli_stmt_bind_param($stmt, "ssssssss", $customer_username, $vendoruserid, $itemname, $customer_name, $customer_city, $customer_contact, $customer_billingaddress, $inquiry);


if (mysqli_stmt_execute($stmt)) {
    //echo "Your inquiry has been sent to the vendor.";
	?>
	<script>
  alert("Your inquiry has been sent to the vendor!  Redirecting you to customer Page");
  location.replace("customer.php");
  </script>
	
	<?php
} else {
    // Failed to store the inquiry
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
