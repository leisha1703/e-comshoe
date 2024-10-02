<?php
session_start();

$username1 = $_POST["username"];
$userpass = $_POST["userpass"];
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

// Check if the user is a valid customer
$sql_customer = "SELECT * FROM userinformation WHERE username = '$username1' AND userpass = '$userpass' AND type = 'Customer' AND status = 'active'";
$result_customer = mysqli_query($conn, $sql_customer);

// Check if the user is a valid vendor
$sql_vendor = "SELECT * FROM userinformation WHERE username = '$username1' AND userpass = '$userpass' AND type = 'Vendor' AND status = 'active'";
$result_vendor = mysqli_query($conn, $sql_vendor);

if (mysqli_num_rows($result_customer) === 1) {
    // Valid login for customer, retrieve customer information
    $row = mysqli_fetch_assoc($result_customer);

    $_SESSION["customer_id"] = $row["id"];
    $_SESSION["customer_username"] = $row["username"];
    $_SESSION["customer_userpass"] = $row["userpass"];
    $_SESSION["customer_name"] = $row["name"];
    $_SESSION["customer_city"] = $row["city"];
    $_SESSION["customer_pic"] = $row["pic"];
    $_SESSION["customer_contact"] = $row["contact"];
    $_SESSION["customer_type"] = $row["type"];
    $_SESSION["customer_status"] = $row["status"];
    $_SESSION["customer_dob"] = $row["dob"];
    $_SESSION["customer_billingaddress"] = $row["billingaddress"];
    $_SESSION["customer_que"] = $row["que"];
    $_SESSION["customer_ans"] = $row["ans"];

    // Insert session record into the user_sessions table
    $userId = $_SESSION["customer_id"];
    $loginTime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO user_sessions (user_id, login_time) VALUES ('$userId', '$loginTime')";
    mysqli_query($conn, $sql);

    // Redirect the customer to the customer dashboard
    header('Location: customer.php');
    exit();
} elseif (mysqli_num_rows($result_vendor) === 1) {
    // Valid login for vendor, retrieve vendor information
    $row = mysqli_fetch_assoc($result_vendor);

    $_SESSION["vendor_id"] = $row["id"];
    $_SESSION["vendor_username"] = $row["username"];
    $_SESSION["vendor_userpass"] = $row["userpass"];
    $_SESSION["vendor_name"] = $row["name"];
    $_SESSION["vendor_city"] = $row["city"];
    $_SESSION["vendor_pic"] = $row["pic"];
    $_SESSION["vendor_contact"] = $row["contact"];
    $_SESSION["vendor_type"] = $row["type"];
    $_SESSION["vendor_status"] = $row["status"];
    $_SESSION["vendor_dob"] = $row["dob"];
    $_SESSION["vendor_billingaddress"] = $row["billingaddress"];
    $_SESSION["vendor_que"] = $row["que"];
    $_SESSION["vendor_ans"] = $row["ans"];

    // Insert session record into the user_sessions table
    $userId = $_SESSION["vendor_id"];
    $loginTime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO user_sessions (user_id, login_time) VALUES ('$userId', '$loginTime')";
    mysqli_query($conn, $sql);

    // Redirect the vendor to the vendor dashboard
    header('Location: vendor.php');
    exit();
} else {
    // Invalid login, redirect to the login page with an error message
    header('Location: login.php?error=1');
    exit();
}

mysqli_close($conn);
?>
