<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LSA @ A GLANCE | LOGIN</title>
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
</head>
<body>
<!-- LOGO -->
<div class="header">
            <div class="header-content">
                <!-- <div class="heading-wrapper">
                    <h1></h1>
                </div> -->
                <div class="logo-wrapper">
                    <img src="images/logicalis-logo-white_1.png" alt="Logicalis_Logo"> 
                </div>
                <div class="links-wrapper">
		<img src="images/logo-white.png" alt="ataglance" style="width: 200px; margin-top: -20px;">
                    <!-- Nav Link -->
                </div>
    </div>
</div>


<div class="row">
  <div class="col-sm-12" style="background-color: #333333;">        
        <form class="login-form" action="logon_exe.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="userName" autocomplete="username" class="form-control" required>
                <br>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="userPassword" autocomplete="current-password" class="form-control" required>
                <br>
                <br>
            </div>
            <div class="centered-btn-wrapper">
                    <button type="submit" name="login" class="btn"><strong>LOGIN</strong></button>
            </div>
        </form>
    </div>
</div>

<!-- <div class="footer"></div> -->
<footer>
<?php
ob_flush();
?>
</footer>
</body>


