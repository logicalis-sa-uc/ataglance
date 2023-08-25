<?php
//ini_set("include_path", '/home/develyla/php:' . ini_get("include_path") );
// Initialize the session
@ob_start();
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
?>
<?php
// Include config file
require_once "../configs/config1.php";
//Set Variables
$userName = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LSA @ A GLANCE | DISPLAY MODE</title>
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>
<?php
        // Include config file
        require_once "../configs/config1.php";

    // Create connection
    $conn = new mysqli("$DB_SERVER", "$DB_USERNAME", "$DB_PASSWORD", "$DB_NAME");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $displayMode = isset($_POST['displayMode']) ? 1 : 0;

            $sql = 'UPDATE lsa_users SET DisplayMode ="'.$displayMode.'" WHERE userName = "'.$userName.'"';

            if ($conn->query($sql) === TRUE) {
                echo "Dask Mode saved successfully!";
                header("Location: ../admin/settings.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
?>


<footer>
<?php
ob_flush();
?>
</footer>
</body>
