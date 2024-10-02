<!--Dashbord for systemadmin

track customer queries
search customer queries for taking the action (Pending)
search customer queries on which you already have taken the action (Complete)
view all active customers
view all inactive customers
view all active vendors
view all inactive vendors
search any vendor active / inactive
search any customer active / inactive-->

<?php

session_start();

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
        
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    
    $sql = "UPDATE userinformation SET last_activity = NOW() WHERE id = '$id'";
    mysqli_query($conn, $sql);
}
    }
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



$sql = "SELECT adminusername FROM sysadminpnl";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $adminusername = $row["adminusername"];
}



$sql = "SELECT * FROM customersupport ORDER BY id DESC";
$result = mysqli_query($conn, $sql);



include 'online_users.php';
$online_count = countOnlineUsers();
?>

<html>
<head>
<title>Admin - Dashboard</title>
<style>
table {
  width: 100%;
  
}

table, th, td {
  border: 1px solid black;
  padding: 8px;
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

</style>
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<!--<p><a href='index.php'>Click here</a> to go back.</p>-->
<!--Give Welcome message like, Welcome, UserName.-->
<!--<form action="list.php" method=post>
<button type="submit" class="btn btn-success" style="margin-top:10px;">List of active and inactive customers and vendors</button>
</form>-->

<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">GoShop.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link " aria-current="page" href="trackstatus.php">Track customer queries</a>
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
<br><br><br>

<h2 style="text-align:center;">Welcome <?php echo $adminusername; ?></h2>


   



</body>
</html>



