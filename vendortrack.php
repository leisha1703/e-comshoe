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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vendor_id = $_SESSION["vendor_username"];
    //$inquiry_id = $_POST["inquiry_id"];
    $reply = $_POST["reply"];

    $updateQuery = "UPDATE vendor_inquiries SET reply = ? WHERE  vendor_id = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "ss", $reply,  $vendor_id);

    if (mysqli_stmt_execute($stmt)) {
        // Successfully added the vendor's reply
        mysqli_stmt_close($stmt);
        header("Location: vendortrack.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
if (isset($_SESSION["vendor_username"])) {
    $vendor_id = $_SESSION["vendor_username"];
    $sql = "SELECT * FROM vendor_inquiries WHERE vendor_id = '$vendor_id' AND (reply IS NULL OR reply = '')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error executing query: " . mysqli_error($conn));
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Vendor Track Enquiries</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<style>
	.bt {
            background-color: white;
            border: 2px solid black;
            color: green;
            padding: 5px 10px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
			border-radius:5px;
			margin-left:2px;
			text-decoration:none;
        }
	</style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">GoShop.</a>
	
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Search here</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
		<li class="nav-item">
            <a class="nav-link " aria-current="page" href="vendor.php">Go to Vendor page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="updateprofile.php">Update Personal Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addnewitems.php">Add New Item</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="displayitems.php">Display All Items</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="active.php">Display Active Items</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="displayinactiveitems.php">Display Inactive Items</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="updateitem.php">Update Items</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="updatepass.php">Update Password</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link active" href="vendortrack.php">Track Enquiry</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="replies.php">See all Queries</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="vstatus.php">Status of products</a>
          </li>
        </ul>
		
        
		<div class="container mt-3">
  
  
  <form action="logout.php" method="post" >
    <input type="submit" name="logout" value="Logout" class=bt>
</form>
</div>
      </div>
    </div>
  </div>
</nav>
<br><br><br><br>

    <div class="container">
        <h1 style="margin-bottom: 20px; text-align: center;">Vendor Track Enquiries</h1>

        <?php
        if (isset($result) && mysqli_num_rows($result) > 0) {
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <!-- <th>Inquiry ID</th> -->
                        <th>Customer ID</th>
                        <th>Item Name</th>
                        <th>Inquiry</th>
                        <!--<th>Status</th>-->
                        <th>Reply</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <!-- <td><?php echo $row["inquiry_id"]; ?></td> -->
                            <td><?php echo $row["customer_id"]; ?></td>
                            <td><?php echo $row["item_name"]; ?></td>
                            <td><?php echo $row["inquiry"]; ?></td>
                           <!-- <td><?php echo $row["status"]; ?></td>-->
                            <td>
                                <form action="" method="post">
                                    <!-- <input type="hidden" name="inquiry_id" value="<?php echo $row["inquiry_id"]; ?>"> -->
                                    <textarea rows="3" cols="20" name="reply" class="form-control"></textarea>
                                    <button type="submit" class="btn btn-primary">Reply</button>
                                </form>
                            </td>
							
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<p style='margin-top: 20px; text-align: center;'>No inquiries found for your vendor account.</p>";
        }
        ?>

       
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
