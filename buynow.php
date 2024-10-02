<!DOCTYPE html>
<html>
<head>
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
<h1 align=center>Final Check Out</h1><hr>
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
$sql = "SELECT * FROM unprocessed where customerid='$customer_username' and status='unprocessed'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row in a table
    echo '<table class="table table-striped" style="width:50%;margin-left:25%;border: 1px solid black">';
    echo '<tr><th>Item Code</th>';
    echo '<th>Item</th>';
    
    echo '<th>Quantity</th>';
    echo '<th>Unit Price</th>';
    echo '<th>Amount</th>';
    echo '</tr>';

    //$itemCount = 1;
    $totalAmount = 0;

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $itemname = $row["itemname"];
        $qty = $row["qty"];
        $itemprice = $row["price"];
        $amount = $qty * $itemprice;
        $totalAmount += $amount;

        echo '<tr>';
        echo '<td>'.$row['id'].'</td><td>' . $itemname . '</td>';
        //echo '<td colspan="2">' . $description . '</td>';
        echo '<td>' . $qty . '</td>';
        echo '<td>Rs ' . number_format($itemprice, 2) . '</td>';
        echo "<td class='text-right'>Rs " . number_format($amount, 2) . "</td>";
        echo '</tr>';

        //$itemCount++;
    }

    echo '<tr class="total-row">';
    echo '<td colspan="4" class="text-right">Total</td>';
    echo '<td >Rs ' . number_format($totalAmount, 2) ;
	
    echo "<br><br><form method=post action=bill.php><input type='submit' value='Check Out'  class='btn btn-danger' ></td></tr>";

    echo '</table>';
	echo '<button onclick="printPage()" class="btn btn-success" style="margin-left:45%;">Print this page</button>';
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<script>
        function printPage() {
            window.print();
        }
    </script>
</body>
</html>
