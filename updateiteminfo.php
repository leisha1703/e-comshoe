<?php
session_start();
$vendor_username = $_SESSION["vendor_username"];

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

if (isset($_POST['update_btn'])) {
    $ids = $_POST['id'];
    $itemnames = $_POST['itemname'];
    $itembrands = $_POST['itembrand'];
    $itemprices = $_POST['itemprice'];
    $itemtypes = $_POST['itemtype'];
    $itemdescriptions = $_POST['itemdescription'];
    $otherinfos = $_POST['otherinfo'];
    
    for ($i = 0; $i < count($ids); $i++) {
        $id = $ids[$i];
        $itemname = $itemnames[$i];
        $itembrand = $itembrands[$i];
        $itemprice = $itemprices[$i];
        $itemtype = $itemtypes[$i];
        $itemdescription = $itemdescriptions[$i];
        $otherinfo = $otherinfos[$i];
        
        $update_query = "UPDATE productregisteration SET 
                        itemname='$itemname', 
                        itembrand='$itembrand', 
                        itemprice='$itemprice',
                        itemtype='$itemtype',
                        itemdescription='$itemdescription',
                        otherinfo='$otherinfo'
                        WHERE id='$id' AND vendoruserid='$vendor_username'";

        if (!mysqli_query($conn, $update_query)) {
            echo "Error updating item information: " . mysqli_error($conn);
        }
    }
    
    header("Location: updateitem.php");
    exit();
}

mysqli_close($conn);
?>
