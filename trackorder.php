
<!DOCTYPE html>
<html>
<body> 
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
$customer_username=$_SESSION["customer_username"];
$sql = "SELECT DISTINCT orderid FROM unprocessed where status='processed' AND customerid='$customer_username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
	echo '<h1 style="text-align:center;margin-top:80px;">Track your order by Order ID</h1>';
	echo '<br>';
	echo '<div class="container-fluid" style="width:70%;">';
	echo '<table class="table table-striped">';
	echo '<tr>';
	echo '<th>Order ID</th>';
	echo '<th>Action</th>';
	echo '</tr>';
    while($row = mysqli_fetch_assoc($result)) {
		
        echo "<form method='get' action='vieworder.php' style='margin-left:120px;margin-top:10px;'>";
		echo '<tr>';
		echo "<td><input type=text readonly class='form-control' name='orderid' value=" . $row['orderid']." style='width:40%;'></td>";
		echo "<td><input type=submit class='btn btn-warning' value='View'></td></tr></form>";
		//echo '</tr>';
		
    }
	echo '</table>';
	echo '</div>';
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
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
            <a class="nav-link " aria-current="page" href="customer.php">Go to Customer page</a>
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
            <a class="nav-link " href="trackinquiry.php">Track Enquiry</a>
          </li>
		  <li class="nav-item">
                <a class="nav-link active" href="trackorder.php">Track order</a>
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
</body>
</html>
