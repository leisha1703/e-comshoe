<?php
session_start();

if (!isset($_SESSION["customer_id"])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST["Add_to_cart"]) && isset($_POST["qty"])) {
    $customer_username = $_SESSION["customer_username"];
    $vendoruserid = $_POST["vendorname"];
    $itemimage = $_POST["itemimage"];
    $itemname = $_POST["itemname"];
    $qty = intval($_POST["qty"]);
    $itemprice = floatval($_POST["itemprice"]);
    $totalPrice = $itemprice * $qty;
    $status = "unprocessed";

    $servername = "localhost";
    $username = "root";
    $password = "ipsleisha1703";
    $dbname = "myproj";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Generate a unique random order ID
    function generateRandomOrderId($length = 15) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $orderId = '';
        $charactersLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $orderId .= $characters[rand(0, $charactersLength - 1)];
        }

        return $orderId;
    }

    $orderid = generateRandomOrderId();

    $sql = "INSERT INTO unprocessed ( customerid, vendorid, itemimage, itemname, qty, price, status,orderid)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ssssidss", $customer_username, $vendoruserid, $itemimage, $itemname, $qty, $totalPrice, $status,$orderid);

    if (mysqli_stmt_execute($stmt)) {
        ?>
        <script>
            alert("Item added Successfully! Redirecting you to Customer Page");
            location.replace("customer.php");
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
