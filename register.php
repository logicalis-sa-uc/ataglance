<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>LSA @ A GLANCE | REGISTER</title>
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
<div class="header">
        <div class="header-content">

        <!-- <div class="header-wrapper"> </div>-->
            <div class="logo-wrapper">
                <img src="images/logicalis-logo-white_1.png" alt="Logicalis_Logo"> 
            </div>
                <div class="links-wrapper">
                    <!-- Nav Link -->
                    <div class="nav-link">
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
        </div>
    </div>
<div class="row">
    <div class="col-sm-12">
        <form class="login-form" action="register_exe.php" method="post">
            <div class="form-group">
                <h2>REGISTER</h2>
                <br>
                    <label>Username</label>
                    <input type="text" name="userName" class="form-control" required>
                <br>
            </div>
            <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="userPassword" class="form-control" required>
                <br>
            </div>
            <div class="form-group">
                    <label>Access Level</label>
                    <select id="DepartmentAccess" name="DepartmentAccess" required>
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                        <option value="user">User</option>
                    </select>
                <br>
                <br>
            </div>
            <div class="centered-btn-wrapper">
                <button type="submit" name="login" class="btn"><strong>REGISTER</strong></button>
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

  

