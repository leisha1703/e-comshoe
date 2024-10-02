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



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
 .nostylebtn {
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
	color:red;
	text-decoration:none;
}
.copyright {
  padding: 0.3em 1em;
  background-color: #25262e;
}
.footer-menu{
  float: left;
    margin-top: 10px;
}
.footer-menu a{
  color: #cfd2d6;
  padding: 6px;
  text-decoration: none;
}
.footer-menu a:hover, .social i:hover{
  color: #c7940a;
}
.copyright p {
  font-size: 0.9em;
  text-align: right;
}

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
  
  
  <form action="logout.php" method="post" >
    <input type="submit" name="logout" value="Logout" class=bt>
</form>
</div>
      </div>
    </div>
  </div>
</nav>
<br><br><br><br>



<h2 style="text-align:center;">Welcome <?php echo $_SESSION['vendor_name']; ?></h2>

<table class=table width=100%><tr></tr><th>ID</th><th>Username</th><th>Name</th><th>City</th><th>Image</th><th>Contact</th><th>Type</th><th>Status</th><th>DOB</th><th>Billing Address</th><tr><td><?php echo $vendor_id; ?></td><td><?php echo $vendor_username; ?></td><td><?php echo $vendor_name; ?></td><td><?php echo $vendor_city; ?></td><td><img src=<?php echo $vendor_pic; ?> class="rounded-circle" width=60 height=60></td><td><?php echo $vendor_contact; ?></td><td><?php echo $vendor_type; ?></td><td><?php echo $vendor_status; ?></td><td><?php echo $vendor_dob; ?></td><td><?php echo $vendor_billingaddress; ?></td></tr></table>


<?php
//session_start();

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






   // $customerid = $_SESSION["username"];
    $vendor_username = $_SESSION["vendor_username"];
	//$itemimage=$_SESSION["itemimage"];
	//$price=$_SESSION["price"];
    $sql = "SELECT * FROM unprocessed WHERE vendorid='$vendor_username' AND status='Unprocessed'";

    $result = mysqli_query($conn, $sql);
?>

<body>

  <div class="container mt-5">
    <h2>Frequently Visited Products</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <!--<th>Order ID</th>
          <th>Customer ID</th>-->
          <th>Item Name</th>
		  <th>Item Image</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
           // echo "<td>" . $row['id'] . "</td>";
           // echo "<td>" . $row['customerid'] . "</td>";
            echo "<td>" . $row['itemname'] . "</td>";
			echo "<td><img src='" . $row['itemimage'] . "' alt='Item Image' width='60' height='60'></td>";
            echo "<td>" . $row['price'] . "</td>";
            
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No unprocessed orders found for this vendor.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

<?php

mysqli_close($conn);

?>



<!--<form action="updateprofile.php" method=post>
<input type=submit value="Update Personal Profile" class="nostylebtn"> | 
<a href="addnewitems.php" class="nostylebtn">Add New Item</a> | <a class="nostylebtn" href="displayitems.php">Display All Items</a> | <a class="nostylebtn" href="active.php">Display Active Items</a> | <a class="nostylebtn" href="displayinactiveitems.php">Display Inactive Items</a> | <a class="nostylebtn" href="updateitem.php">Update Items</a> | <a class="nostylebtn" href="updatepass.php">Update Password</a><hr>
</form>-->
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="container-fluid bg-dark text-white py-4">
    <div class="row">
      <div class="col-md-6">
        <h4>Contact Information</h4>
        <p>Email: leisha1703@gmail.com</p>
        <p>Phone: +91 6239338632</p>
      </div>
      <div class="col-md-6">
        <h4>Quick Links</h4>
        <ul class="list-unstyled">
          <li><a href="index.php" style="text-decoration:none;color:white;">Home</a></li>
          <li><a href="about.php" style="text-decoration:none;color:white;">About</a></li>
          <li><a href="faq.php" style="text-decoration:none;color:white;">F.A.Q</a></li>
          <li><a href="privacyPolicy.php" style="text-decoration:none;color:white;">Cookies Policy</a></li>
          <li><a href="termsConditions.php" style="text-decoration:none;color:white;">Terms Of Service</a></li>
          <li><a href="support.php" style="text-decoration:none;color:white;">Support</a></li>
          <li><a href="track.php" style="text-decoration:none;color:white;">Track customer queries</a></li>
        </ul>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12 text-center">
        <p class="mb-0">&copy; 2023 My Website. All rights reserved.</p>
      </div>
    </div>
  </footer>