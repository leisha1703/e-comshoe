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

// Check if customer-specific session variables are already set
if (!isset($_SESSION["customer_id"]) || !isset($_SESSION["customer_username"])) {
    // If not set, redirect to login page
    header('Location: index.php');
    exit();
}

$customer_username = $_SESSION["customer_username"];


$sql = "SELECT * FROM unprocessed WHERE customerid='$customer_username'";
$result = mysqli_query($conn, $sql);


if (isset($_GET["itemname"])) {
    $customer_username = $_SESSION["customer_username"]; 
    $itemname = $_GET["itemname"];
    $sql = "SELECT * FROM unprocessed WHERE customerid = ? AND itemname = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $customer_username, $itemname);
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        
    </style>
    <title>Purchased Products</title>
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
            <a class="nav-link " aria-current="page" href="customer.php">Go to customer page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="updatecustomerprofile.php">Update Personal Profile</a>
          </li>
		 <li class="nav-item">
            <a class="nav-link" href="viewprofile.php">View Personal information</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="updatecustomerpass.php">Update Password</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="trackinquiry.php">Track Enquiry</a>
          </li>
		  <li class="nav-item">
                <a class="nav-link active" href="productstatus.php">Purchased Products</a>
            </li>
        </ul>
		
        
		<div class="container mt-3">
  
  
  <form action="logout.php" method="post">
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
    <h1>Purchased Products</h1>
    <?php
    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
		echo '<th>Vendor ID</th>';
        echo '<th>Product Name</th>';
        echo '<th>Status</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
			echo '<td>' . $row['vendorid'] . '</td>';
            echo '<td>' . $row['itemname'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>No purchased products found.</p>';
    }
    ?>
</div>

</body>
</html>
