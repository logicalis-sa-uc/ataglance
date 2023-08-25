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
    <title>LSA @ A GLANCE | RESET PASSWORD</title>
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
    <!-- Header -->
    <div class="header">
            <div class="header-content">
                <!-- <div class="heading-wrapper">
                    <h1></h1>
                </div> -->
                <div class="logo-wrapper">
                    <img src="images/logicalis-logo-white_1.png" alt="Logicalis_Logo"> 
                </div>
                <div class="links-wrapper">
                    <!-- Nav Link -->
                    <div class="nav-link">
                        <a href="login.php">Login</a>
                    </div>
                    <!-- Nav Link -->
                    <div class="nav-link">
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
    </div>
</div>

    <?php
    // Include config file
    require_once "/configs/config1.php";
    //Set Variables
    $userPassword = $_POST['userPassword'];
    $userName = $_SESSION['username'];
    $hashedPassword = md5($userPassword);
    ?>

<div class="main-container">
  <h2>PASSWORD RESET</h2>
  <br>
  <br>
    <p>Your password was reset successfully!<br><br>
    Return to <a href="index.php">LOGIN</a></p>

    <?php
    // Create connection
    $conn = new mysqli("$DB_SERVER", "$DB_USERNAME", "$DB_PASSWORD", "$DB_NAME");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

    $sql = "UPDATE lsa_users SET userPassword = '$hashedPassword' WHERE userName = '$userName'";
    //$result = $conn->query($sql);
    // Check connection
    if ($conn->query($sql) === TRUE) {
        // echo Password updated successfully.
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
