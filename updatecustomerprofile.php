<?php

session_start();

	  
if (!isset($_SESSION["customer_id"]) || !isset($_SESSION["customer_username"])) {
    // If not set, redirect to login page
    header('Location: index.php');
    exit();
}

// Once the customer is logged in, you can use the session variables as needed
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
            <a class="nav-link " aria-current="page" href="customer.php">Go to customer page</a>
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
		  <li class="nav-item">
            <a class="nav-link" href="trackinquiry.php">Track Enquiry</a>
          </li>
		  <li class="nav-item">
                <a class="nav-link " href="trackorder.php">Track order</a>
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
<form action=updatemeinformation.php method=post>
<h1 align=center>Update Personal Information</h1>
<div class=container>
<table width=100%>
<tr><td>ID</td><td><input type=text name=customer_id class="form-control" value="<?php echo $customer_id; ?>" readonly></td></tr>
<tr><td>User Name</td><td><input type=text name=customer_username class="form-control" value="<?php echo $customer_username; ?>" readonly></td></tr>

<tr><td>Full Name</td><td><input type=text name=customer_name class="form-control" value="<?php echo $customer_name; ?>" ></td></tr>
<tr><td>City </td><td><input type=text name=customer_city class="form-control" value="<?php echo $customer_city; ?>" ></td></tr>
<!-- <tr><td> Password</td><td><input type=password class="form-control"  name=userpass value="<?php echo $customer_userpass; ?>" readonly> </td></tr>
<tr><td>Update Password</td><td><input type=password class="form-control"  name=userpass > </td></tr>-->
<tr><td>Phone Number</td><td><input type=number class="form-control" name=customer_contact value="<?php echo $customer_contact; ?>" ></td></tr>
<tr><td>Billing Address</td><td><textarea rows=15 cols=20 class="form-control" name=customer_billingaddress> <?php echo $customer_billingaddress; ?></textarea></td></tr>
<tr><td>DOB</td><td><input type=text name=customer_dob value="<?php echo $customer_dob; ?>" >YYYY-MM-DD</td></tr>

<tr><td colspan=2><input type=submit value=Update class="btn btn-primary" style="margin-left:45%;margin-top:30px;"></td></tr>

</table>
</div>
</div>