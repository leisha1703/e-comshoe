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

if (!isset($_SESSION["vendor_id"]) || !isset($_SESSION["vendor_username"])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["itemname"]) && isset($_POST["status"]) && isset($_POST["customer_username"])) {
    $itemname = $_POST["itemname"];
    $status = $_POST["status"];
    $customer_username = $_POST["customer_username"];

    $update_sql = "UPDATE unprocessed SET status=? WHERE itemname=? AND customerid=?";

    $stmt = mysqli_prepare($conn, $update_sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $status, $itemname, $customer_username);

        if (mysqli_stmt_execute($stmt)) {
            header('Location: vstatus.php');
            exit();
        } else {
            // Handle the error here
            die("Error: Unable to update status");
        }
    } else {
        // Handle the error here
        die("Error: Unable to prepare update SQL statement");
    }
} else {
    header('Location: vstatus.php');
    exit();
}
?>
