
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php

session_start();
 $vendor_username = $_SESSION["vendor_username"];  
 $vendor_billingaddress=$_SESSION["vendor_billingaddress"]; 

 
?>
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
            <a class="nav-link " aria-current="page" href="updateprofile.php">Update Personal Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="addnewitems.php">Add New Item</a>
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
            <a class="nav-link" href="dispatched.php">Status of products</a>
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
	<form action="additems.php" method=post enctype="multipart/form-data">
	<h1 align=center>Add New Item</h1><hr style="border-color:red;border-style:solid;">
	<div class=container>
	<table class=table width=100%>
	<tr><td width=50%>Vendor User ID</td><td><input type=text readonly class="form-control" value="<?php echo $vendor_username; ?>" name=vendor_username> </td></tr>
	<tr><td width=50%>Enter Item name</td><td><input type=text required class="form-control"  name=itemname> </td></tr>
	<tr><td width=50%>Enter Item brand</td><td><select name=itembrand>
	<option>Nike</option>
	<option>Bata</option>
	<option>Adidas</option>
	<option>Nike</option>
	<option>Nike</option>
	<option>Nike</option>
	</select> </td></tr>
	<tr><td width=50%>Enter Item Price</td><td><input type=text required class="form-control"  name=itemprice> </td></tr>
	<tr><td width=50%>Enter Picture</td><td> <input type="file" name="itemimage" required> </td></tr>
	<tr><td width=50%>Vendor Billing address</td><td><input type=text readonly class="form-control" value="<?php echo $vendor_billingaddress; ?>" name=vendor_billingaddress> </td></tr>
	<tr><td width=50%>Enter Item Type</td><td>
	<select name="itemtype" class="form-control">
	<option value="Men">Men</option>
	<option value="Women">Women</option>
	</select>
	</td></tr>
	<tr><td width=50%>Item Description</td><td><textarea name=itemdescription rows=10 cols=50></textarea></td></tr>
	<tr><td width=50%>Status</td><td>
	<label>
      <input type="radio" required  name="status" value="Active">
      Active
    </label>
    <label>
      <input type="radio" required  name="status" value="Inactive">
      Inactive
    </label> </td></tr>
<tr><td width=50%>Other Information</td><td><textarea name=otherinfo rows=10 cols=50></textarea></td></tr>
	<tr align=center><td colspan=2>
		<input type="checkbox" required > By continuing, you agree to GoShop's <a href="termsConditions.php" target="_blank" style="text-decoration:none;">Terms of Use</a> and <a href="privacyPolicy.php" target="_blank" style="text-decoration:none;">Privacy Policy.</a><br><br>
	<input type=submit value="Add" class="btn btn-danger"</td></tr>
	</table>
	</div>
	</form>
	