<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["adminusername"])) {
        $adminusername = $_POST["adminusername"];
        $_SESSION["adminusername"] = $adminusername;
    }
}

// Set $_SESSION["adminusername"] to empty if not already set
if (!isset($_SESSION["adminusername"])) {
    $_SESSION["adminusername"] = "";
}


?>



<?php

//session_start();

if(isset($_SESSION["adminusername"])) {
    $adminusername = $_SESSION["adminusername"];
} else {
    
}


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
    if (isset($_POST["id"]) && isset($_POST["status"]) && isset($_POST["adminusername"])) {
        $id = $_POST["id"];
        $status = $_POST["status"];
        $adminusername = $_POST["adminusername"];
        $reply = Solution($status); 

        $sql = "UPDATE customersupport SET status = '$status', reply = '$reply' WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo "Status and Solution updated successfully.";
            echo "<br>";
            echo "<a href='index.php'>Click here</a> to relogin to see the updates.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } 
}


if (isset($_GET["status"])) {
    $status = $_GET["status"];

    if ($status === "Select Status") {
        $sql = "SELECT * FROM customersupport";
    } else {
        $sql = "SELECT * FROM customersupport WHERE status = '$status'";
    }

    $result = mysqli_query($conn, $sql);
} elseif (isset($_GET["customer_username"])) {
    $customer_username = $_GET["customer_username"];

    $sql = "SELECT * FROM customersupport WHERE username = '$customer_username'";
    $result = mysqli_query($conn, $sql);
} else {
    $status = "Active";
    $sql = "SELECT * FROM customersupport WHERE status = '$status'";
    $result = mysqli_query($conn, $sql);
}
include 'online_users.php';
$online_count = countOnlineUsers();

?>

<html>
<head>
<title>Admin - Track Customer Queries</title>
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
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="admindashboard.php">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="trackstatus.php">Track customer queries</a>
		<a class="nav-link" href="allcustomers.php">Customers</a> 
        <a class="nav-link" href="list.php">Customers status</a>
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
<form method="GET" action="" style="margin-left:30px;">
<table style="border:none;">
    <td><label for="status"><b>Status:</b></label></td>
    <td><select name="status" class="form-control" required style="padding:9px;">
        <option value="Select Status">Select Status</option>
        <option value="Active">Active</option>
        <option value="Completed">Completed</option>
    </select></td>
   <td> <button type="submit" class="btn btn-primary" style="margin-top: 10px;height:45px;">Search</button></td>
	</table>
</form>
</div>
<br><br><br>
<!--Give Welcome message like, Welcome, UserName.-->
<!--<form action="list.php" method=post>
<button type="submit" class="btn btn-success" style="margin-top:10px;">List of active and inactive customers and vendors</button>
</form>-->

<!--<p><a href='index.php'>Click here</a> to go to index page.</p>-->
<div class="container">
<h1 style="margin-bottom:50px;text-align:center;margin-top:20px;">Track Customer Queries</h1>
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
  if (mysqli_num_rows($result) > 0) {
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
			  <input type="hidden" name="adminusername" value="<?php echo $adminusername; ?>">
              <button type="submit" class="btn btn-success" style="margin-top:10px;">Update</button>
            </form>
          <?php } ?>
        </td>
      </tr>
    <?php
    }
  } else {
    echo "<tr><td colspan='11'>No customer queries found.</td></tr>";
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