
<!DOCTYPE html>
<html>
<body>

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
.myTextbox {
            background-color: white;
            border: 1px solid white;
			 text-align:center;
			 width:0px;
			 height:0px;
        }
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproj";

//session_start();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM unprocessed WHERE customerid='roger@gmail.com' and status='unprocessed'";
$result = mysqli_query($conn, $sql);
$calc=0;
 ?>
 
  <button type="button" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#crt">View Cart</button>
  <div id="crt" class="collapse">
 <?php 
 
echo "<div id='crt' class='collapse'>";
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  
   echo '<table  border=0><tr><td>ITEM</td><td>QTY</td><td>PRICE</td><td></td></tr>';
  while($row = mysqli_fetch_assoc($result)) {
   $calc=$calc+$row['price'];
   
// Start the session

//$_SESSION["id"] = $row['id'];
   ?>
   <tr><td><form action="deletecartunprocessed.php" method=post><input type=text name=id class=myTextbox readonly value=<?php echo $row['id'] ?>><?php echo $row['itemname'] ?></td><td><?php echo $row['qty'] ?></td><td><?php echo $row['price'] ?></td><td><input type=submit class=nostylebtn value="Remove"></form></td></tr>
   
   
   
   
   <?php
   
   
  }
  echo '</table>';

  echo '<hr>Grand Total: '.$calc;
} else {
    echo "0 results";
}
echo "</div>";
mysqli_close($conn);
?>

<!--<p><a href="customer.php">Click here</a> to shop more!!</p>-->

<?php
//if (mysqli_num_rows($result) > 0) {
  //echo '<table class="table table-bordered"><thead><tr><th>ITEM</th><th>QTY</th><th>PRICE</th><th></th></tr></thead><tbody>';
  //while ($row = mysqli_fetch_assoc($result)) {
  //  $calc += $row['price'];
  //  $_SESSION["id"] = $row['id'];
  //  echo '<tr>';
  //  echo '<td>' . $row['itemname'] . '</td>';
   // echo '<td>' . $row['qty'] . '</td>';
   // echo '<td>' . $row['price'] . '</td>';
   // echo '<td><form action="deletecartunprocessed.php" method="post"><input type="hidden" name="id" value="' . $row['id'] . '"><input type="submit" class="btn btn-danger" value="Remove"></form></td>';
   // echo '</tr>';
  //}
 // echo '</tbody></table>';
 // echo '<hr>Grand Total: ' . $calc;
//} else {
//  echo "No items in the cart.";
//}
//mysqli_close($conn);
?>

</body>
</html>
