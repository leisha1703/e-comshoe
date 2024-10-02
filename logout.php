<?php
// Start the session (if not already started)
session_start();

// Function to log out the user
function logoutUser() {
	
    
    if (isset($_SESSION['id'])) {
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

        // Update the logout_time for the current user in the user_sessions table
        $user_id = $_SESSION['id'];
        $logout_time = date('Y-m-d H:i:s'); // Current time

        $sql_update = "UPDATE user_sessions SET logout_time = '$logout_time' WHERE user_id = '$user_id' ";
        mysqli_query($conn, $sql_update);

        // Update the active users count
        include 'online_users.php'; 
        countOnlineUsers();

        // Close the database connection
        mysqli_close($conn);
    }

    // Destroy the session and remove all session variables
    session_unset();
    session_destroy();

    // Redirect the user to the login page or any other desired page
    header("Location: index.php"); 
    exit();
}

if (isset($_POST['logout'])) {
    
    logoutUser();
}
?>
