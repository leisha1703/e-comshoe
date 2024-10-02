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

if (isset($_GET["status"])) {
    $status = $_GET["status"];

    
    if ($status === "Select Status") {
        $sql = "SELECT * FROM userinformation WHERE type='Customer'";
    } else {
        $sql = "SELECT * FROM userinformation WHERE type='Customer' AND status = '$status'";
    }

    $result = mysqli_query($conn, $sql);
} else {
   
    $status = "Active";
    $sql = "SELECT * FROM userinformation WHERE type='Customer' AND status = '$status'";
    $result = mysqli_query($conn, $sql);
}


if (isset($_GET["customer_username"])) {
    $customer_username = $_GET["customer_username"];
    
	if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $customer_username = $_GET["customer_username"];
    $sql = "SELECT * FROM userinformation WHERE username = '$customer_username' AND type='Customer'";
    $result = mysqli_query($conn, $sql);
}
} else {
}
include 'online_users.php';
$online_count = countOnlineUsers();
?>

<!DOCTYPE html>
<html>

<head>
    
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="admindashboard.php">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link " aria-current="page" href="trackstatus.php">Track customer queries</a>
        <a class="nav-link " href="allcustomers.php">Customers</a>
		<a class="nav-link active" href="list.php">Customers status</a>
        <a class="nav-link" href="allvendors.php">Vendors</a>
		<a class="nav-link" href="list2.php">Vendors status</a>
		<button class="btn btn-primary">Online Users: <?php echo $online_count; ?></button>
		 <form action="logout.php" method="post">
    <input type="submit" name="logout" value="Logout" class="nav-link" >
</form>
        
      </div>
    </div>
  </div>
</nav>
<br><br>

<div style="float:left;">
<table style="border:none;margin-left:15px">
<form method="GET" action="" style="margin-left:30px;">
    <td><label for="status"><b>Status:</b></label></td>
    <td><select name="status" required class="form-control" style="padding:9px;">
        <option value="Select Status">Select Status</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select></td>
    <td><button type="submit" class="btn btn-primary" style="margin-top: 10px;height:50px;">Search</button></td>
</form>
</table>
</div>
<div style="float:right;">
<table style="border:none;">
    <form method="GET" action="" style="margin-right:30px;">
        <td><label for="email"><b>Search by Email ID:</b></label></td>
        <td><input type="email" name="customer_username" class="form-control" required></td>
        <td><button type="submit" class="btn btn-primary" >Track</button></td>
    </form>
	</table>
</div>
<br><br>
    <div class="container">
        <h1 style="text-align: center; margin-top: 50px;">Check status of customers</h1><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
					<th>Type</th>
                    <th>Name</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["username"]; ?></td>
							<td><?php echo $row["type"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                            
                        </tr>
                    <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No users found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
mysqli_close($conn);
?>
