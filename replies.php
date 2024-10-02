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
if(isset($_SESSION["vendor_username"])){
	$vendor_id = $_SESSION["vendor_username"];
$sql = "SELECT * FROM vendor_inquiries WHERE vendor_id = '$vendor_id'";
$result = mysqli_query($conn, $sql);
}

if (isset($_GET["itemname"])) {
    $vendor_username = $_SESSION["vendor_username"]; 
    $itemname = $_GET["itemname"];
    $sql = "SELECT * FROM vendor_inquiries WHERE vendor_id = ? AND item_name = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $vendor_username, $itemname);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    } else {
        // Handle the error here
        die("Error: Unable to prepare SQL statement");
    }
} else {
    // ... (rest of the code remains unchanged)
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Track Inquiry Status</title>
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
            <a class="nav-link" href="vendortrack.php">Track Enquiry</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link active" href="replies.php">See all Queries</a>
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
<div style="float:right;">
<table style="border:none;">
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <td><label for="itemname"><b>Search by Item name:</b></label></td>
        <td><input type="text" name="itemname" class="form-control" required></td>
        <td><button type="submit" class="btn btn-primary" style="margin-right:10px;">Track</button></td>
    </form>
	</table>
</div>
<br><br>
    <div class="container">
        <h1 style="margin-bottom: 20px; text-align: center;">See all replies</h1>

        <?php
        if (isset($result) && mysqli_num_rows($result) > 0) {
            ?>
            <!--<h2 style="margin-top: 50px; text-align: center;">Your Past Inquiries</h2>-->
            <table class="table">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Customer ID</th>
                        <th>Item Name</th>
                        <th>Inquiry</th>
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
                            <td><?php echo $row["reply"]; ?></td>
							<td class="reply-cell" style="display: none;"><?php echo $row["reply"]; ?></td>
    
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<p style='margin-top: 20px; text-align: center;'>No past inquiries found for this item.</p>";
        }
        ?>

        
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
