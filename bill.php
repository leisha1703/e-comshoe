<?php
session_start();
function generateRandomOrderId($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $orderId = '';
    $charactersLength = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $orderId .= $characters[rand(0, $charactersLength - 1)];
    }

    return $orderId;
}

// Generate a unique random order ID
$randomOrderId = generateRandomOrderId();


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
$customer_username=$_SESSION["customer_username"];
$sql = "UPDATE unprocessed SET status='Processed',  orderid='$randomOrderId' WHERE customerid='$customer_username' and status='unprocessed'";

if (mysqli_query($conn, $sql)) {
	?>
	<script>
	alert("Item Ordered successsfully!!");
	location.replace("customer.php");
	</script>
	<?php
  //echo "Record updated successfully";
  
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

