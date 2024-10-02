<?php
function changePassword($servername, $username, $password, $dbname, $vendor_username, $newPassword, $confirmPassword)
{
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($newPassword !== $confirmPassword) {
        return "New password and confirm password do not match.";
    }

    $query = "SELECT * FROM userinformation WHERE username = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $vendor_username);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($stmt->errno) {
        die("Execute failed: " . $stmt->error);
    }

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $userId = $user['id'];
        
		//$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); //it is for actual password
		
        // Convert the password to an integer
        $hashedPassword = intval($newPassword);

        $updateQuery = "UPDATE userinformation SET userpass = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        if ($updateStmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $updateStmt->bind_param("ii", $hashedPassword, $userId);
        if (!$updateStmt->execute()) {
            die("Execute failed: " . $updateStmt->error);
        }

        if ($updateStmt->affected_rows > 0) {
            return "Password updated successfully!";
        } else {
            return "Error updating password.";
        }
    } else {
        return "User not found.";
    }

    $stmt->close();
    mysqli_close($conn);
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproj";

if (isset($_POST["vendor_username"]) && isset($_POST["newuserpass"]) && isset($_POST["confirmuserpass"])) {
    $vendor_username = $_POST["vendor_username"];
    $newPassword = $_POST["newuserpass"];
    $confirmPassword = $_POST["confirmuserpass"];

    $result = changePassword($servername, $username, $password, $dbname, $vendor_username, $newPassword, $confirmPassword);

    echo "<script>alert('" . $result . "');</script>";
    echo "<a href='index.php'>Click here</a> to relogin to see the updates.";
}
?>
