<?php
$username1=$_POST["username1"];
$userpass=$_POST["userpass"];

$name=$_POST["name"];
$city=$_POST["city"];
//$pic=$_POST["pic"];
$contact=$_POST["contact"];
$type=$_POST["type"];
$status="Active";
$dob=$_POST["dob"];
$billingaddress=$_POST["billingaddress"];
$que=$_POST["que"];
$ans=$_POST["ans"];
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

if(isset($_FILES['image'])){
    $file = $_FILES['image'];

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




$sql = "INSERT INTO userinformation (username, userpass, name, city, pic, contact, type, dob, billingaddress, que, ans, status) VALUES ('" . mysqli_real_escape_string($conn, $username1) . "', '" . mysqli_real_escape_string($conn, $userpass) . "', '" . mysqli_real_escape_string($conn, $name) . "', '" . mysqli_real_escape_string($conn, $city) . "', '" . mysqli_real_escape_string($conn, $uploadPath) . "', '" . mysqli_real_escape_string($conn, $contact) . "', '" . mysqli_real_escape_string($conn, $type) . "', '" . mysqli_real_escape_string($conn, $dob) . "', '" . mysqli_real_escape_string($conn, $billingaddress) . "', '" . mysqli_real_escape_string($conn, $que) . "', '" . mysqli_real_escape_string($conn, $ans) . "', '" . mysqli_real_escape_string($conn, $status) . "')";

if (mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
  ?>
  <script>
  alert("Signup Sucessfull!  Redirecting you to Login Page");
  location.replace("index.php");
  </script>
  <?php
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}







mysqli_close($conn);
?>