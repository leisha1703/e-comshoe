<?php
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
    $username1 = $_POST["username1"];
    $firstname = $_POST["firstname"];
    $city = $_POST["city"];
    $questions = $_POST["questions"];
    $message = $_POST["message"];
	$lastname = $_POST["lastname"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];


    
    $sql = "INSERT INTO customersupport (username,firstname,city,lastname,state,zip,questions,message,status,reply)
	VALUES ('$username1','$firstname','$city','$lastname','$state','$zip','$questions','$message','Active','NA')";
    
    if (mysqli_query($conn, $sql)) {
		
		
        echo "<a href='index.php'>Click here</a> to relogin to see the updates.";
		
        echo "<a href='track.php'>Click here</a> to track the updates.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>




<html>
<head>
<title>Support Us</title>
<style>
form{
	border:1px solid black;
	padding:20px;
	
}
</style>
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
            <a class="nav-link active" aria-current="page" href="index.php">Go to Home page</a>
          </li>
          
        </ul>
		
        
		<div class="container mt-3">
  
  
  
</div>
      </div>
    </div>
  </div>
</nav>
<br><br><br><br>
<div class="container">
<h1 style="margin-bottom:50px;text-align:center;margin-top:20px;">Contact Us</h1>
<form action="" class="row g-3 needs-validation" novalidate method=post>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" class="form-control" name=firstname id="validationCustom01" placeholder="First name.." required>
   
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" name=lastname id="validationCustom02" placeholder="Last name.." required>
   
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="text" class="form-control"  name=username1 id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
     
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">City</label>
    <input type="text" class="form-control"  name=city id="validationCustom03" required>
    
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">State</label>
    <select class="form-select" name=state id="validationCustom04" required>
      <option selected disabled value="">Choose...</option>
      <option>Andhra Pradesh</option>
	   <option>Arunachal Pradesh</option>
	    <option>Assam</option>
		 <option>Bihar</option>
		  <option>Chhattisgarh	</option>
		   <option>Goa</option>
		    <option>Gujarat</option>
			 <option>Haryana</option>
			  <option>Himachal Pradesh</option>
			   <option>Jharkhand</option>
			    <option>Karnataka</option>
				 <option>Kerala</option>
				  <option>Madhya Pradesh</option>
				   <option>Maharashtra</option>
				    <option>Manipur</option>
					 <option>Meghalaya</option>
					  <option>Mizoram</option>
					   <option>Nagaland</option>
					    <option>Odisha</option>
						 <option>Punjab</option>
						  <option>Rajasthan</option>
						   <option>Sikkim</option>
						    <option>Tamil Nadu</option>
							 <option>Telangana</option>
							  <option>Tripura</option>
							   <option>Uttar Pradesh</option>
							    <option>Uttarakhand</option>
								 <option>West Bengal</option>
    </select>
    
  </div>
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Zip</label>
    <input type="text" class="form-control" name=zip id="validationCustom05" required>
    
  </div>
  
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Message</label><br>
    <textarea name=message rows=5 cols=160></textarea>
    
  </div>
  <div >
    <label for="validationCustom05" class="form-label">What issues are you facing?</label><br>
    <select name=questions>
	<option>Can I get the refund if I am not satisfied?</option>
	<option>Didn’t receive any mail or confirmation regarding the Order just made, can I get it again?</option>
	<option >Why do I see different prices for the same product?</option>
	<option >Is installation offered for all products?</option>
	<option >Is it necessary to have an account to shop on GoShop?</option>
	<option >What does 'Preorder' or 'Forthcoming' mean?</option>
	<option>Do sellers on GoShop ship internationally?</option>
	<option >Can I use an item that has been given to me as a gift from a state sponsored or an NGO-funded freebie distribution programme to get discounts through exchange offers?</option>
	
	</select>
    
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
     
    </div>
  </div>
   
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>
</div>

</body>

</html>