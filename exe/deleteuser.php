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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LSA @ A GLANCE | DELETE USER</title>
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/text-container.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/media-queries.css">
</head>
<body>
<?php
        // Include config file
        require_once "../configs/config1.php";
        //Set Variables
        $userNameDel = $_POST['userNameDel'];
    // Create connection
    $conn = new mysqli("$DB_SERVER", "$DB_USERNAME", "$DB_PASSWORD", "$DB_NAME");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

    $sql = "DELETE FROM lsa_users WHERE userName LIKE '%" . $userNameDel . "%'";
    // Check connection
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully.";
        header("Location: ../admin/settings.php");
           } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

    mysqli_close($conn);
?>


<footer>
<?php
ob_flush();
?>
</footer>
</body>
