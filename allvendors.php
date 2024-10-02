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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id"]) && isset($_POST["status"])) {
        $id = $_POST["id"];
        $status = $_POST["status"];

        $sql = "UPDATE userinformation SET status = ? WHERE id = ? AND type='Vendor' ";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $status, $id);

        if (mysqli_stmt_execute($stmt)) {
            //echo "Status updated successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
}

if (isset($_GET["vendor_username"])) {
    $vendor_username = $_GET["vendor_username"];

    $sql = "SELECT * FROM userinformation WHERE username = ? AND type='Vendor'";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $vendor_username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $sql = "SELECT * FROM userinformation WHERE type='Vendor'";
    $result = mysqli_query($conn, $sql);
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
		<a class="nav-link " href="list.php">Customers status</a>
        <a class="nav-link active" href="allvendors.php">Vendors</a>
		<a class="nav-link " href="list2.php">Vendors status</a>
		<button class="btn btn-primary">Online Users: <?php echo $online_count; ?></button>
		 <form action="logout.php" method="post">
    <input type="submit" name="logout" value="Logout" class="nav-link" >
</form>
        
      </div>
    </div>
  </div>
</nav>
<br>
<br>

<div style="float:right;margin-right:5px;">
<table style="border:none;">
    <form method="GET" action="" style="margin-right:30px;">
        <td><label for="email"><b>Search by Email ID:</b></label></td>
        <td><input type="email" name="vendor_username" class="form-control" required></td>
        <td><button type="submit" class="btn btn-primary" >Track</button></td>
    </form>
	</table>
</div>
<br><br>
    <div class="container">
        <h1 style="text-align: center; margin-top: 20px;">List of all Vendors</h1><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
					<th>Type</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
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
                            <td>
                    <?php if ($row["status"] === "Active") : ?>
                        
                        <div style="float:right;">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <input type="hidden" name="status" value="Inactive">
                                <button type="submit" class="btn btn-danger inactive-btn">Inactive</button>
                            </form>
                        </div>
                    <?php elseif ($row["status"] === "Inactive") : ?>
                        <div style="float:left;">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <input type="hidden" name="status" value="Active">
                                <button type="submit" class="btn btn-success active-btn">Active</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </td>
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
<script>
    const activeButtons = document.querySelectorAll(".active-btn");
    const inactiveButtons = document.querySelectorAll(".inactive-btn");

    function showAlert(msg) {
        alert(msg);
    }

    function update(newStatus) {
        showAlert(`Status is now ${newStatus}! Click OK to view changes.`);
    }

    activeButtons.forEach(button => {
        button.addEventListener("click", () => {
            update("Active");
        });
    });

    inactiveButtons.forEach(button => {
        button.addEventListener("click", () => {
            update("Inactive");
        });
    });
</script>
</body>

</html>

<?php
mysqli_close($conn);
?>
