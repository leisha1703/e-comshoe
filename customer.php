
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  body{
	  background-color: #f9f9f9;
  }
 .nostylebtn {
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
	color:red;
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
footer{
	bottom:0;
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
		
		
.hover-card {
  position: relative;
  display: inline-block;
}

.tooltip {
  visibility: hidden;
  width: 200px;
  background-color: #000;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  transform: translateX(-50%);
  opacity: 0;
  transition: opacity 0.3s;
}

.hover-card:hover .tooltip {
  visibility: visible;
  opacity: 1;
}
.crt{
  position: absolute;
  margin-left:70%;
  margin-top:3%;
  z-index: 1;
  background-color:white;
  border-color:orange;
  border-style:solid;
  width:20%;
}
.col-lg-4{
	border: 1px solid #ddd;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s;
    background-color:white;
	
}
.col-lg-4:hover{
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
</style>
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
            <a class="nav-link" href="trackorder.php">Track Order</a>
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

<!--<form action="cartdemo.php" method=post>
<button type="submit" class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#crt" style="float:right;margin-right:10px;">View Cart</button>
</form>-->
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


<table class=table ><tr></tr><th>ID</th><th>Username</th><th>Name</th><th>City</th><th>Image</th><!--<th>Contact</th><th>Type</th><th>Status</th>--><tr><tr><td><?php echo $customer_id; ?></td><td><?php echo $customer_username; ?></td><td><?php echo $customer_name; ?></td><td><?php echo $customer_city; ?></td><td><img src=<?php echo $customer_pic; ?> class="rounded-circle" width=60 height=60></td><!--<td><?php echo $customer_contact; ?></td><td><?php echo $customer_type; ?></td><td><?php echo $customer_status; ?></td><td><?php echo $customer_dob; ?></td><td><?php echo $customer_billingaddress; ?></td><td><?php echo $customer_que; ?></td><td><?php echo $customer_ans; ?></td>--></tr></table>

<br>
<?php
$servername = "localhost";
$username = "root";
$password = "ipsleisha1703";
$dbname = "myproj";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$customerid = $customer_username;
$sql = "SELECT * FROM unprocessed WHERE customerid='$customerid' AND status='unprocessed'";
$result = mysqli_query($conn, $sql);
$calc = 0;
?>

<div id="cartContainer">
    <button type="button" id="viewCartBtn" class="btn btn-default" style="float:right;">View Cart</button>
    <div id="crt" style="display: none;">
	<form action="buynow.php" method=post>
        <?php
        if (mysqli_num_rows($result) > 0) {
			echo "<div  class='container'>";
            echo '<table border=1 class=crt><tr><td>ITEM</td><td>QTY</td><td>PRICE</td><td></td></tr><tr><td colspan=5><hr></td></tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                $calc += $row['price'];
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['itemname']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td>
                        <!--<button class="removeBtn nostylebtn" data-itemid="<?php echo $row['id']; ?>">Remove</button>-->
						<a href="remove_item.php?itemid=<?php echo $row['id']; ?>" class="removeBtn nostylebtn" style="text-decoration:none;">Remove</a>

                    </td>
					
                </tr>
                <?php
            }
			 echo '<tr><td colspan=5><hr>Grand Total: <span id="grandTotal">' . $calc . '</span></td></tr>';
				
			echo "<tr><td colspan=5><hr><input type=submit value='BuyNow'  class='btn btn-danger' style='margin-bottom:15px;margin-left:35%;'></td></tr>";
            echo '</table>';
            echo '</div>';
           } else {
            echo "No items in the cart.";
        }
		
        mysqli_close($conn);
        ?>
		</form>
    </div>
</div>

<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#viewCartBtn").click(function () {
            $("#crt").toggle();
        });

        $(".removeBtn").click(function () {
            
            var itemId = $(this).data("itemid");

            $(this).closest("tr").remove();

        });
    });
</script>



<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="men-tab" data-bs-toggle="tab" data-bs-target="#men" type="button" role="tab" aria-controls="men" aria-selected="true">Men</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="men-tab" data-bs-toggle="tab" data-bs-target="#women" type="button" role="tab" aria-controls="women" aria-selected="false">Women</button>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="men" role="tabpanel" aria-labelledby="men-tab">
     <div class="container">
    <div class="row">
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

$sql = "SELECT * FROM productregisteration WHERE itemtype='Men'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo '<div class="row" style="display: flex; flex-wrap: wrap;">';

  while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="col-lg-4" style="text-align: center; margin-bottom: 40px;"><form action=buy.php method=post>';
    echo '<img src="' . $row["itemimage"] . '" alt="' . $row["itemname"] . '" style="width: 300px; height: 300px;">';
    echo '<br>';
    echo '<strong>' . $row['itemname'] . '</strong>';
    echo '<br>';
    echo 'Price: $' . $row['itemprice'];
    echo '<br>';
	/*echo '<button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="' . $row["itemdescription"] . ' ">
  View more information
</button>';*/
    echo '<div class="hover-card">';
    echo '<a href="#" class="info-link">View more information<span class="tooltip">' . $row["itemdescription"] . '</span></a>';
    echo '</div>';    
	echo '<br>';
	echo '<br>';
	?>
	<script>
	function inc(itemId) {
  var qtyElement = document.getElementById(itemId);
  var qty = parseInt(qtyElement.value);
  if (qty < 10) {
    qty++;
    qtyElement.value = qty;
  } else {
    alert("Not able to sell more than 10 items for a unit.");
    qtyElement.value = 10;
  }
}

function dec(itemId) {
  var qtyElement = document.getElementById(itemId);
  var qty = parseInt(qtyElement.value);
  if (qty > 1) {
    qty--;
    qtyElement.value = qty;
  } else {
    alert("Minimum value has been set.");
    qtyElement.value = 1;
  }
}

	
	</script>
	    <style>
        .myTextbox {
            background-color: white;
            border: 1px solid white;
			 text-align:center;
			 
        }
		
    </style>
	<?php
	echo "<button type='button' class='nostylebtn' onclick=\"inc('qty-" . $row['id'] . "')\" class='btn btn-primary'>+</button>";
    echo "<input type='number' class='myTextbox' style='width:50px;' readonly id='qty-" . $row['id'] . "' value='1' name=qty>";
    echo "<button type='button' class='nostylebtn' onclick=\"dec('qty-" . $row['id'] . "')\" class='btn btn-primary'>-</button>";
    echo "<br><input class='myTextbox'  name='vendorname' value='" . $row['vendoruserid'] . "'>";
    echo "<input type='hidden' name='itemimage' value='" . $row['itemimage'] . "'>";
    echo "<input type='hidden' name='itemname' value='" . $row['itemname'] . "'>";
    echo "<input type='hidden' name='itemprice' value='" . $row['itemprice'] . "'>";

    echo "<br><button type='submit' name='Add_to_cart' class='btn btn-primary'>Buy Now</button>";
	echo "</form>"; 

                            // Ask Questions form
   echo "<form action='custenquiry.php' method='post'>";
echo "<a href='custenquiry.php?vendorid=" . $row['vendoruserid'] . "&itemname=" . urlencode($row['itemname']) . "' class='btn btn-secondary'>Ask questions</a>";

  echo "</form>";

  echo '</div>';
  }

  echo '</div>';
} 

else {
  echo "0 results";
}

mysqli_close($conn);
?>

    </div>
</div>
  
  
  </div>
  <div class="tab-pane fade" id="women" role="tabpanel" aria-labelledby="women-tab">
  <div class="container">
<div class="row">
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

$sql = "SELECT * FROM productregisteration WHERE itemtype='Women'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo '<div class="row" style="display: flex; flex-wrap: wrap;">';

  while($row = mysqli_fetch_assoc($result)) {
   // echo '<form action=buy.php method=post>';
	echo ' <div class="col-lg-4" style="text-align: center; margin-bottom: 40px;"><form action=buy.php method=post>';
    echo '<img src="' . $row["itemimage"] . '" alt="' . $row["itemname"] . '" style="width: 300px; height: 300px;">';
    echo '<br>';
    echo '<strong>' . $row['itemname'] . '</strong>';
    echo '<br>';
    echo 'Price: $' . $row['itemprice'];
    echo '<br>';
	/*echo '<button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="' . $row["itemdescription"] . '">
  View more information
</button>';*/
    echo '<div class="hover-card">';
    echo '<a href="#" class="info-link">View more information<span class="tooltip">' . $row["itemdescription"] . '</span></a>';
    echo '</div>'; 
    echo '<br>';
	echo '<br>';
	?>
	<script>
	function inc(itemId) {
  var qtyElement = document.getElementById(itemId);
  var qty = parseInt(qtyElement.value);
  if (qty < 10) {
    qty++;
    qtyElement.value = qty;
  } else {
    alert("Not able to sell more than 10 items for a unit.");
    qtyElement.value = 10;
  }
}

function dec(itemId) {
  var qtyElement = document.getElementById(itemId);
  var qty = parseInt(qtyElement.value);
  if (qty > 1) {
    qty--;
    qtyElement.value = qty;
  } else {
    alert("Minimum value has been set.");
    qtyElement.value = 1;
  }
}

	
	</script>
   <style>
        .myTextbox {
            background-color: white;
            border: 1px solid white;
			 text-align:center;
        }
		
    </style>
	<?php
	echo "<button type='button' class='nostylebtn' onclick=\"inc('qty-" . $row['id'] . "')\" class='btn btn-primary'>+</button>";
    echo "<input type='number' class='myTextbox' style='width:50px;' readonly id='qty-" . $row['id'] . "' value='1' name=qty>";
    echo "<button type='button' class='nostylebtn' onclick=\"dec('qty-" . $row['id'] . "')\" class='btn btn-primary'>-</button>";
    echo "<br><input class='myTextbox'  name='vendorname' value='" . $row['vendoruserid'] . "'>";
    echo "<input type='hidden' name='itemimage' value='" . $row['itemimage'] . "'>";
    echo "<input type='hidden' name='itemname' value='" . $row['itemname'] . "'>";
    echo "<input type='hidden' name='itemprice' value='" . $row['itemprice'] . "'>";

    echo "<br><button type='submit' name='Add_to_cart' class='btn btn-primary'>Buy Now</button>";

    echo "</form>"; 

                            // Ask Questions form
   echo "<form action='custenquiry.php' method='post'>";
echo "<a href='custenquiry.php?vendorid=" . $row['vendoruserid'] . "&itemname=" . urlencode($row['itemname']) . "' class='btn btn-secondary'>Ask questions</a>";

  echo "</form>";

  echo '</div>';
  }

  echo '</div>';
} 

else {
  echo "0 results";
}

mysqli_close($conn);
?>

</div>
</div> 
  
  </div>
  
</div>




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
