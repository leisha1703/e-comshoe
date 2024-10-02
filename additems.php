<?php

session_start();
 $vendor_username = $_SESSION["vendor_username"];  
 $vendor_billingaddress=$_SESSION["vendor_billingaddress"];  
 
?>


<?php


//$vendoruserid=$_POST["vendoruserid"];
$itemname=$_POST["itemname"];
$itembrand=$_POST["itembrand"];
$itemprice=$_POST["itemprice"];
$itemimage=$_POST["itemimage"];
//$billingaddress=$_POST["billingaddress"];
$itemtype=$_POST["itemtype"];
$itemdescription=$_POST["itemdescription"];
$status=$_POST["status"];
$otherinfo=$_POST["otherinfo"];
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


if(isset($_FILES['itemimage'])){
    $file = $_FILES['itemimage'];

    // Generate a unique name for the image
    $uniqueName = uniqid('', true);
    $fileName = $uniqueName . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

    // Destination folder path
    $uploadDir = 'uploads/';

    // Create the "uploads" folder if it doesn't exist
    if(!is_dir($uploadDir)){
        mkdir($uploadDir, 0777, true);
    }

    // Set full permissions (read, write, execute) for the "uploads" folder
    chmod($uploadDir, 0777);

    // Move the uploaded file to the destination folder with the unique name
    $uploadPath = $uploadDir . $fileName;
    move_uploaded_file($file['tmp_name'], $uploadPath);



$sql = "INSERT INTO productregisteration (vendoruserid, itemname, itembrand, itemprice, itemimage, vendorbillingaddress,itemtype, itemdescription, status, otherinfo) VALUES ('" . mysqli_real_escape_string($conn, $vendor_username) . "', '" . mysqli_real_escape_string($conn, $itemname) . "', '" . mysqli_real_escape_string($conn, $itembrand) . "', '" . mysqli_real_escape_string($conn, $itemprice) . "', '" . mysqli_real_escape_string($conn, $uploadPath) . "', '" . mysqli_real_escape_string($conn, $vendor_billingaddress) . "','" . mysqli_real_escape_string($conn, $itemtype) . "', '" . mysqli_real_escape_string($conn, $itemdescription) . "', '" . mysqli_real_escape_string($conn, $status) . "', '" . mysqli_real_escape_string($conn, $otherinfo) . "')";

if (mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
  ?>
  <script>
  alert("Item added Sucessfully!  Redirecting you to Vendor Page");
  location.replace("vendor.php");
  </script>
  <?php
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}







mysqli_close($conn);
?>
