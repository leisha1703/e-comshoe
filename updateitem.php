<?php
session_start();
$vendor_username = $_SESSION["vendor_username"];

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

$sql = "SELECT * FROM productregisteration WHERE vendoruserid='$vendor_username' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<html>
<head>
  <title>All Items List</title>
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
            <a class="nav-link " aria-current="page" href="vendor.php">Go to Vendor page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="updateprofile.php">Update Personal Profile</a>
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
            <a class="nav-link active" href="updateitem.php">Update Items</a>
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
  <div class="container" style="margin-right:90px;">
    <h1 style="margin-bottom:50px;text-align:center;margin-top:20px;">All Items List</h1>
    <form action="updateiteminfo.php" method="post">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Item Name</th>
          <th>Item Brand</th>
          <th>Item Price</th>
          <!-- <th>Item image</th> -->
          <th>Item type</th>
          <th>Item description</th>
          <th>Other Information</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><input type="text" name="itemname[]" value="<?php echo $row["itemname"]; ?>"></td>
              <td><input type="text" name="itembrand[]" value="<?php echo $row["itembrand"]; ?>"></td>
              <td><input type="text" name="itemprice[]" value="<?php echo $row["itemprice"]; ?>"></td>
              <!-- <td><img src="<?php echo $row["itemimage"]; ?>" class="rounded-circle" width="60" height="60"></td> -->
              <td><input type="text" name="itemtype[]" value="<?php echo $row["itemtype"]; ?>"></td>
              <td><textarea name="itemdescription[]"><?php echo $row["itemdescription"]; ?></textarea></td>
              <td><input type="text" name="otherinfo[]" value="<?php echo $row["otherinfo"]; ?>"></td>
              <td>
                <input type="hidden" name="id[]" value="<?php echo $row["id"]; ?>">
              </td>
            </tr>
          <?php
          }
        } else {
          echo "<tr><td colspan='8'>No such product found.</td></tr>";
        }
        ?>
      </table>
      <button type="submit" class="btn btn-success" name="update_btn" style="margin-top: 10px;margin-left:47%;">Update</button>
    </form>
  </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
