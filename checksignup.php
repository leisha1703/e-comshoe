
<!-- Latest compiled and minified CSS -->
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
<?php
$username1=$_POST["username1"];

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

$sql = "SELECT * from userinformation where username='$username1'";
$result = mysqli_query($conn, $sql);
$counter=0;
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  $counter++;
  }
} 

if ($counter==0)
{
	?>
	<form action="signupfinal.php" method=post enctype="multipart/form-data">
	<h1 align=center>New User Registeration form</h1><hr style="border-color:red;border-style:solid;">
	<div class=container>
	<table class=table width=100%>
	<tr><td width=50%>Enter UserName</td><td><input type=text readonly class="form-control" value=<?php echo $username1;?> required name=username1> </td></tr>
	<tr><td width=50%>Enter Password</td><td><input type=password required class="form-control"  name=userpass> </td></tr>
	<tr><td width=50%>Enter Full Name</td><td><input type=text required class="form-control" name=name> </td></tr>
	<tr><td width=50%>Enter City</td><td><input type=text required class="form-control"  name=city> </td></tr>
	<tr><td width=50%>Enter Picture</td><td> <input type="file" name="image" required> </td></tr>
	<tr><td width=50%>Enter Contact</td><td><input type=number required  class="form-control"  name=contact> </td></tr>
	<tr><td width=50%>Enter Type</td><td>
	<select name="type" class="form-control">
	<option value="Customer">Customer</option>
	<option value="Vendor">Vendor</option>
	</select>
	</td></tr>
	<tr><td width=50%>Enter Date of Birth</td><td><input type=date required class="form-control"  name=dob> </td></tr>
	<tr><td width=50%>Billing Address</td><td><textarea rows=10 cols=50 name=billingaddress></textarea></td></tr>
	<tr><td width=50%>Security questions</td><td name=que><select name=que><option>What is your pet's name?</option><option>What is your first school's name?</option><option>What is your favourite colour?</option></select></td></tr>
	<tr><td width=50%>Security answer</td><td><textarea rows=5 cols=50 name=ans></textarea></td></tr>
	<tr align=center><td colspan=2>
		<input type="checkbox" required > By continuing, you agree to GoShop's <a href="termsConditions.php" target="_blank" style="text-decoration:none;">Terms of Use</a> and <a href="privacyPolicy.php" target="_blank" style="text-decoration:none;">Privacy Policy.</a><br><br>
	<input type=submit value="signup" class="btn btn-danger"</td></tr>
	</table>
	</div>
	</form>
	<?php
}
else
{
	echo "Username already registered <a href=index.php>Click here to do login!</a>";
}

mysqli_close($conn);

?>