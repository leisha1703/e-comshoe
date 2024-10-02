<?php


if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["itemid"])) {
    $servername = "localhost";
    $username = "root";
    $password = "ipsleisha1703";
    $dbname = "myproj";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $itemid = $_GET["itemid"];

    $sql = "DELETE FROM unprocessed WHERE id='$itemid'";
    if (mysqli_query($conn, $sql)) {
        
        header("Location: customer.php");
        exit();
    } else {
        
        echo "Error occurred while removing the item.";
    }

    mysqli_close($conn);
} else {
    
    echo "Invalid request.";
}
?>
