<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

<body>
<?php
session_start();

if (!isset($_SESSION["customer_id"]) || !isset($_SESSION["customer_username"])) {
    // If not set, redirect to login page
    header('Location: index.php');
    exit();
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
            <a class="nav-link " aria-current="page" href="customer.php">Go to customer page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="updatecustomerprofile.php">Update Personal Profile</a>
          </li>
		 <li class="nav-item">
            <a class="nav-link active" href="viewprofile.php">View Personal information</a>
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



<h2 style="text-align:center;">Welcome <?php echo $_SESSION['customer_name']; ?></h2>


<!--<form action="updateprofile.php" method=post>
<input type=submit value="Update Personal Profile" class="nostylebtn">
<div class ="cart">
<a href="logout.php" class="btn btn-outline-success" style="margin-left:1300px;">Logout</a>
</div>
</form>
<form action="updatepass.php" method=post>
<input type=submit value="Update Password" class="nostylebtn">
</form>-->


<!--<table class=table width=100%><tr></tr><th>ID</th><th>Username</th><th>Name</th><th>City</th><th>Image</th><th>Contact</th><th>Type</th><th>Status</th><th>DOB</th><th>Billing Address</th><tr><td><?php echo $customer_id; ?></td><td><?php echo $customer_username; ?></td><td><?php echo $customer_name; ?></td><td><?php echo $customer_city; ?></td><td><img src=<?php echo $customer_pic; ?> class="rounded-circle" width=60 height=60></td><td><?php echo $customer_contact; ?></td><td><?php echo $customer_type; ?></td><td><?php echo $customer_status; ?></td><td><?php echo $customer_dob; ?></td><td><?php echo $customer_billingaddress; ?></td></tr></table>-->

<div class="container mt-5">
<table class="table table-borderd">
<tbody>
<tr>
<th>ID</th>
<td><?php echo $customer_id; ?></td>
</tr>
<tr>
<th>Username</th>
<td><?php echo $customer_username; ?></td>
</tr>
<tr>
<th>Name</th>
<td><?php echo $customer_name; ?></td>
</tr>
<tr>
<th>City</th>
<td><?php echo $customer_city; ?></td>
</tr>
<tr>
<th>Image</th>
<td><img src=<?php echo $customer_pic; ?> class="rounded-circle" width=60 height=60></td>
</tr>
<tr>
<th>Contact</th>
<td><?php echo $customer_contact; ?></td>
</tr>
<tr>
<th>Type</th>
<td><?php echo $customer_type; ?></td>
</tr>
<tr>
<th>Status</th>
<td><?php echo $customer_status; ?></td>
</tr>
<tr>
<th>DOB</th>
<td><?php echo $customer_dob; ?></td>
</tr>
<tr>
<th>Billing Address</th>
<td><?php echo $customer_billingaddress; ?></td>
</tr>
</tbody>
</table>
</div>
<br>

</body>
</html>