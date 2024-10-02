<?php
// Function to count online users
function countOnlineUsers() {
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

    $active_users = array();

    // Retrieve sessions from the user_sessions table
    $sql = "SELECT * FROM user_sessions";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $login_time = strtotime($row['login_time']);
            $logout_time = strtotime($row['logout_time']);

            // Check if the user's session is still active (login_time is more recent than logout_time)
            if ($login_time > $logout_time) {
                $active_users[$row['user_id']] = $login_time;
            } else {
                // If the user has logged out, remove them from the active_users list
                unset($active_users[$row['user_id']]);
            }
        }
    }

    mysqli_close($conn);

    // Update the active users list in the session
    $_SESSION['active_users'] = $active_users;

    return count($active_users);
}
?>
