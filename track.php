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
    $id = $_POST["id"];
    $status = $_POST["status"];
    $reply = Solution($status); 
    $username = $_POST["username1"];
    $sql = "UPDATE customersupport SET status = '$status', reply = '$reply' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Status and Solution updated successfully.')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

if (isset($_GET["username1"])) {
    $username = $_GET["username1"];
    // Rest of your code
	if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $username = $_GET["username1"];
    $sql = "SELECT * FROM customersupport WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
}
} else {
}




?>





<html>
<head>
<title>Track Customer Queries</title>
<style>
table {
  width: 100%;
  
}

table, th, td {
  border: 1px solid black;
  padding: 8px;
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
<h1 style="margin-bottom:50px;text-align:center;margin-top:20px;">Track Customer Queries</h1>
<form method="GET" action="">
  <label for="email">Email ID:</label>
  <input type="email" name="username1" required>
  <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Track</button>
</form>

<table>
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>City</th>
    <th>State</th>
    <th>Zip</th>
    <th>Questions</th>
    <th>Message</th>
    <th>Status</th>
    <th>Reply</th>
  </tr>
  <?php
  if (isset($result) && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["firstname"]; ?></td>
        <td><?php echo $row["lastname"]; ?></td>
        <td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["city"]; ?></td>
        <td><?php echo $row["state"]; ?></td>
        <td><?php echo $row["zip"]; ?></td>
        <td><?php echo $row["questions"]; ?></td>
        <td><?php echo $row["message"]; ?></td>
        <td><?php echo $row["status"]; ?></td>
        <td><?php echo $row["reply"]; ?></td>
        <td>
          <?php if ($row["status"] !== 'Completed') { ?>
            <form action="" method="post">
              <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
              <input type="hidden" name="status" value="Completed">
           <!--   <button type="submit" class="btn btn-success" style="margin-top:10px;">Update</button>-->
            </form>
          <?php } ?>
        </td>
      </tr>
    <?php
    }
  } elseif (isset($result) && mysqli_num_rows($result) === 0) {
    echo "<tr><td colspan='12'>No customer queries found for the specified email.</td></tr>";
  }
  ?>
</table>
</div>

</body>
</html>

<?php
mysqli_close($conn);

function Solution($status) {
  if ($status === "Completed") {
    return "Thank you for your query. Your issue has been resolved.";
  }  else {
    return "";
  }
}
?>
