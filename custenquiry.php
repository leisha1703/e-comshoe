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

$customer_id = $_SESSION["customer_id"];
$customer_username = $_SESSION["customer_username"];
$customer_name = $_SESSION["customer_name"];
$customer_city = $_SESSION["customer_city"];
$customer_pic = $_SESSION["customer_pic"];
$customer_contact = $_SESSION["customer_contact"];
$customer_type = $_SESSION["customer_type"];
$customer_status = $_SESSION["customer_status"];
$customer_dob = $_SESSION["customer_dob"];
$customer_billingaddress = $_SESSION["customer_billingaddress"];
$customer_que = $_SESSION["customer_que"];
$customer_ans = $_SESSION["customer_ans"];

$sql = "SELECT * FROM productregisteration WHERE id = $customer_id";
$result = mysqli_query($conn, $sql);






if (isset($_GET['vendorid']) && isset($_GET['itemname'])) {
    $vendorid = $_GET['vendorid'];
    $itemname = urldecode($_GET['itemname']);
    // Use the $vendorid and $itemname as needed for the specific vendor and item-related functionality.
}


// Close the database connection
mysqli_close($conn);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
            <a class="nav-link active" aria-current="page" href="customer.php">Go to Customer page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="updatecustomerprofile.php">Update Personal Profile</a>
          </li>
		 <li class="nav-item">
            <a class="nav-link" href="viewprofile.php">View Personal information</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="updatecustomerpass.php">Update Password</a>
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
<form action="c_insert.php" method=post>
<h1 align=center>Ask your Enquiry</h1>
<div class=container>
<table width=100%>
<tr><td>ID</td><td><input type=text name=id class="form-control" value="<?php echo $customer_id; ?>" readonly></td></tr>
<tr><td>Customer ID</td><td><input type=text name=username1 class="form-control" value="<?php echo $customer_username; ?>" readonly></td></tr>
<tr><td>Vendor ID</td><td><input type=text name=vendorname class="form-control" value="<?php echo $vendorid; ?>" readonly></td></tr>
<tr><td>Item name</td><td><input type=text name=itemname class="form-control" value="<?php echo $itemname; ?>" readonly></td></tr>
<tr><td>Full Name</td><td><input type=text name=name class="form-control" value="<?php echo $customer_name; ?>" ></td></tr>
<tr><td>City </td><td><input type=text name=city class="form-control" value="<?php echo $customer_city; ?>" ></td></tr>
<!-- <tr><td> Password</td><td><input type=password class="form-control"  name=userpass value="<?php echo $userpass; ?>" readonly> </td></tr>
<tr><td>Update Password</td><td><input type=password class="form-control"  name=userpass > </td></tr>-->
<tr><td>Phone Number</td><td><input type=number class="form-control" name=contact value="<?php echo $customer_contact; ?>" ></td></tr>
<tr><td>Billing Address</td><td><textarea rows=15 cols=20 class="form-control" name=billingaddress> <?php echo $customer_billingaddress; ?></textarea></td></tr>
<tr><td>Your Enquiry</td><td><textarea rows=15 cols=20 class="form-control" name=inquiry></textarea></td></tr>


<tr><td colspan=2><input type=submit value="Ask the vendor" class="btn btn-success"></td></tr>

</table>
</div>
</div>