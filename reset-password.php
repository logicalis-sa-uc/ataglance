<?php
//ini_set("include_path", '/home/develyla/php:' . ini_get("include_path") );
// Initialize the session
@ob_start();
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>LSA @ A GLANCE | RESET PASSWORD</title>
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">
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
                        <a href="index.php">Login</a>
                    </div>
                    <!-- Nav Link -->
                    <div class="nav-link">
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">        
        <form class="login-form" action="reset_pw_exe.php" method="post">
            <div class="form-group">
		<br>
<!--                <h2>RESET<br>PASSWORD</h2> -->
                <br>
                <label>New Password</label>
                <input type="password" name="userPassword" class="form-control" required>
                <br>
            </div>
            <br>
            <br>
            <div class="centered-btn-wrapper">
                    <button type="submit" name="login" class="btn"><strong>RESET</strong></button>
            </div>
        </form>
    </div>
</div>

<footer>
<?php
ob_flush();
?>
</footer>
</body>
</html>

