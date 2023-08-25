<?php
// Start session
session_start();

// Connect to database
require_once "configs/config1.php";
$conn = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// Check if login form submitted
if(isset($_POST['login'])) {
    // Get username and password from login form
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $userPassword = mysqli_real_escape_string($conn, $_POST['userPassword']);

    $hashedPassword = md5($userPassword);

    // Query database for user with matching credentials
    $query = "SELECT * FROM lsa_users WHERE userName='$userName' AND userPassword='$hashedPassword'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        // User found, set session variables and redirect to appropriate destination
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $row['userName'];
        $_SESSION['DepartmentAccess'] = $row['DepartmentAccess'];
        
        if($row['DepartmentAccess'] == 'admin') {
            header('Location: admin/dashboard.php');
        } else if($row['DepartmentAccess'] == 'manager') {
            header('Location: manager/dashboard.php');
        } else if($row['DepartmentAccess'] == 'user') {
            header('Location: user/dashboard.php');
        } else {
            header('Location: index.php');
        }
    } else {
        // User not found, display error message
        echo "Invalid username or password";
    }
}
?>
