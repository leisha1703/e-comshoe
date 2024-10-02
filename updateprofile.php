<?php

session_start();

	  // Check if vendor-specific session variables are already set
if (!isset($_SESSION["vendor_id"]) || !isset($_SESSION["vendor_username"])) {
    // If not set, redirect to login page
    header('Location: index.php');
    exit();
}

// Once the vendor is logged in, you can use the session variables as needed
$vendor_id = $_SESSION["vendor_id"];
$vendor_username = $_SESSION["vendor_username"];
$vendor_name = $_SESSION["vendor_name"];
$vendor_city = $_SESSION["vendor_city"];
$vendor_pic = $_SESSION["vendor_pic"];
$vendor_contact = $_SESSION["vendor_contact"];
$vendor_type = $_SESSION["vendor_type"];
$vendor_status = $_SESSION["vendor_status"];
$vendor_dob = $_SESSION["vendor_dob"];
$vendor_billingaddress = $_SESSION["vendor_billingaddress"];
$vendor_que = $_SESSION["vendor_que"];
$vendor_ans = $_SESSION["vendor_ans"];
	   
	   
	   
?>

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
            <a class="nav-link active" aria-current="page" href="updateprofile.php">Update Personal Profile</a>
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
            <a class="nav-link" href="replies.php">See all Queries</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="vstatus.php">Status of products</a>
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
<form action=updatemeinfo.php method=post>
<h1 align=center>Update Personal Information</h1>
<div class=container>
<table width=100%>
<tr><td>ID</td><td><input type=text name=id class="form-control" value="<?php echo $vendor_id; ?>" readonly></td></tr>
<tr><td>User Name</td><td><input type=text name=vendor_username class="form-control" value="<?php echo $vendor_username; ?>" readonly></td></tr>

<tr><td>Full Name</td><td><input type=text name=vendor_name class="form-control" value="<?php echo $vendor_name; ?>" ></td></tr>
<tr><td>City </td><td><input type=text name=vendor_city class="form-control" value="<?php echo $vendor_city; ?>" ></td></tr>
<!-- <tr><td> Password</td><td><input type=password class="form-control"  name=userpass value="<?php echo $vendor_userpass; ?>" readonly> </td></tr>
<tr><td>Update Password</td><td><input type=password class="form-control"  name=userpass > </td></tr>-->
<tr><td>Phone Number</td><td><input type=number class="form-control" name=vendor_contact value="<?php echo $vendor_contact; ?>" ></td></tr>
<tr><td>Billing Address</td><td><textarea rows=15 cols=20 class="form-control" name=vendor_billingaddress> <?php echo $vendor_billingaddress; ?></textarea></td></tr>
<tr><td>DOB</td><td><input type=text name=vendor_dob value="<?php echo $vendor_dob; ?>" >YYYY-MM-DD</td></tr>

<tr><td colspan=2><input type=submit value=Update class="btn btn-primary" style="margin-left:45%;margin-top:30px;"></td></tr>

</table>
</div>
</div>