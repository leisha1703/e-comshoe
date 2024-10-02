<?php

session_start();
 $vendor_username = $_SESSION["vendor_username"];  
   
 
?>

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
    if (isset($_POST["id"]) && isset($_POST["status"])) {
        $id = $_POST["id"];
        $status = $_POST["status"];

        $sql = "UPDATE productregisteration SET status = ? WHERE id = ? AND vendoruserid = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sis", $status, $id, $vendor_username);

        if (mysqli_stmt_execute($stmt)) {
            // echo "Status updated successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
}







if (isset($_GET["itemname"])) {
    $vendor_username = $_SESSION["vendor_username"]; 
    $itemname = $_GET["itemname"];
    $sql = "SELECT * FROM productregisteration WHERE vendoruserid = ? AND itemname = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $vendor_username, $itemname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $sql = "SELECT * FROM productregisteration WHERE vendoruserid='$vendor_username' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
}




?>
<?php
//session_start();
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

// Define the number of items per page
$itemsPerPage = 5;

// Get the current page number from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $itemsPerPage;

if (isset($_GET["itemname"])) {
    $vendor_username = $_SESSION["vendor_username"];
    $itemname = $_GET["itemname"];
    $sql = "SELECT * FROM productregisteration WHERE vendoruserid = ? AND itemname = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $vendor_username, $itemname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    // Fetch items based on the current page and items per page
    $sql = "SELECT * FROM productregisteration WHERE vendoruserid='$vendor_username' ORDER BY id DESC LIMIT $offset, $itemsPerPage";
    $result = mysqli_query($conn, $sql);
}

// Get the total number of items for pagination
$totalItemsQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM productregisteration WHERE vendoruserid='$vendor_username'");
$totalItemsRow = mysqli_fetch_assoc($totalItemsQuery);
$totalItems = $totalItemsRow['total'];

// Calculate the total number of pages
$totalPages = ceil($totalItems / $itemsPerPage);
?>
<html>
<head>
<title>All Items List</title>
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
            <a class="nav-link active" href="displayitems.php">Display All Items</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="active.php">Display Active Items</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="displayinactiveitems.php">Display Inactive Items</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="updateitem.php">Update Items</a>
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
<!--Give Welcome message like, Welcome, UserName.-->
<!--<p><a href='index.php'>Click here</a> to go to index page.</p>-->
<div style="float:right;">
<table style="border:none;">
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <td><label for="itemname"><b>Search by Item name:</b></label></td>
        <td><input type="text" name="itemname" class="form-control" required></td>
        <td><button type="submit" class="btn btn-primary" style="margin-right:10px;">Track</button></td>
    </form>
	</table>
</div>
<br><br>
<div class="container mt-3">
        <p>Total Items: <?php echo $totalItems; ?></p>
    </div>
<div class="container">
<h1 style="margin-bottom:50px;text-align:center;margin-top:20px;">All Items List</h1>
<table id=itemsTable>
  <tr>
    <th>ID</th>
    <th>Item Name</th>
    <th>Item Brand</th>
	 <th>Item Price</th>
    <th>Item image</th>
    <th>Item type</th>
    <th>Item description</th>
    <th>Other Information</th>
	<th>Status</th>
   <th>Change Status </th>
  </tr>
  <?php
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["itemname"]; ?></td>
        <td><?php echo $row["itembrand"]; ?></td>
		<td>Rs <?php echo $row["itemprice"]; ?></td>
        <td><img src="<?php echo $row["itemimage"]; ?>" class="rounded-circle" width="60" height="60"></td>
        <td><?php echo $row["itemtype"]; ?></td>
        <td><?php echo $row["itemdescription"]; ?></td>
        <td><?php echo $row["otherinfo"]; ?></td>
		<td><?php echo $row["status"]; ?></td>
		<td>
                    <?php if ($row["status"] === "Active") : ?>
                        
                        <div style="float:right;">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <input type="hidden" name="status" value="Inactive">
                                <button type="submit" class="btn btn-danger inactive-btn" style="width:90px;">Inactive</button>
                            </form>
                        </div>
                    <?php elseif ($row["status"] === "Inactive") : ?>
                  
                        <div style="float:left;">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <input type="hidden" name="status" value="Active">
                                <button type="submit" class="btn btn-success active-btn" style="width:90px;">Active</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </td>
      </tr>
    <?php
    }
  } else {
    echo "<tr><td colspan='11'>No such product found.</td></tr>";
  }
  ?>
</table>

        <button class="btn btn-primary" onclick="exportToExcel()" style="margin-top:10px;">Export to Excel</button>

</div>

<div class="container mt-3">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </div>

    
    

<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script>
        function exportToExcel() {
            var table = document.getElementById("itemsTable");
            var rows = table.getElementsByTagName("tr");

            var data = [];
            var headers = [];
            for (var i = 0; i < rows[0].cells.length; i++) {
                headers.push(rows[0].cells[i].innerText);
            }
            data.push(headers);

            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var rowData = [];
                for (var j = 0; j < row.cells.length; j++) {
                    var cell = row.cells[j];
                    if (j === 4) {
                        var imgData = getImageData(cell);
                        rowData.push(imgData);
                    } else {
                        rowData.push(cell.innerText);
                    }
                }
                data.push(rowData);
            }

            var worksheet = XLSX.utils.aoa_to_sheet(data);
            var workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Items List");
            var workbookBlob = XLSX.write(workbook, { bookType: "xlsx", type: "array" });
            saveWorkbook(workbookBlob, "items_list.xlsx");
        }

        function getImageData(cell) {
            var img = cell.querySelector("img");
            var canvas = document.createElement("canvas");
            canvas.width = img.width;
            canvas.height = img.height;
            var ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0);
            return canvas.toDataURL("image/png");
        }

        function saveWorkbook(blob, filename) {
            if (navigator.msSaveBlob) {
                navigator.msSaveBlob(new Blob([blob], { type: "application/octet-stream" }), filename);
            } else {
                var link = document.createElement("a");
                link.href = URL.createObjectURL(new Blob([blob], { type: "application/octet-stream" }));
                link.download = filename;
                link.style.display = "none";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }
		
		//if the status is already active show only inactive button and vice versa
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