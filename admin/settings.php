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
// Includes
require_once "../configs/display_settings.php";
require_once "../configs/menu_settings.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>LSA @ A GLANCE | SETTINGS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../scripts/sidebar.js"></script>
</head>
<body class="dash-body" style="background-color: <?php echo $bgColor; ?>; color: <?php echo $txtColor; ?>;">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  MENU</button>
  <span class="w3-bar-item w3-right"><img src="../images/logicalis-logo-white_1.png" height="35px"></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-animate-left" style="z-index:3;width:300px; background-color: <?php echo $bgColor; ?>; color: <?php echo $txtColor; ?>;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $userName; ?></strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h3>SETTINGS</h3>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="dashboard.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-id-card fa-fw"></i>  Overview</a>
    <a href="server.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-server fa-fw"></i>  Server</a>
    <a href="asterisk.php" class="w3-bar-item w3-button w3-padding"<?php if ($asteriskEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-asterisk fa-fw"></i> Asterisk</a>
    <a href="freepbx.php" class="w3-bar-item w3-button w3-padding"<?php if ($freepbxEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-phone fa-fw"></i> FreePBX</a>
    <a href="queuemetrics.php" class="w3-bar-item w3-button w3-padding"<?php if ($queuemetricsEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-users fa-fw"></i> Queuemetrics</a>
    <a href="vicidial.php" class="w3-bar-item w3-button w3-padding"<?php if ($vicidialEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-volume-control-phone fa-fw"></i> Vicidial</a>
    <a href="motion.php" class="w3-bar-item w3-button w3-padding"<?php if ($motionEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-window-restore fa-fw"></i> Motion</a>
    <a href="enswitch.php" class="w3-bar-item w3-button w3-padding"<?php if ($enswitchEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-vcard-o fa-fw"></i> Enswitch</a>
    <a href="kamailio.php" class="w3-bar-item w3-button w3-padding"<?php if ($kamailioEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-globe fa-fw"></i> Kamailio</a>
    <a href="mysql.php" class="w3-bar-item w3-button w3-padding"<?php if ($mysqlEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-database fa-fw"></i> MySQL</a>
    <a href="commands.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-code fa-fw"></i>  Commands</a>
    <a href="cdrs.php" class="w3-bar-item w3-button w3-padding"<?php if ($cdrsEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-calendar fa-fw"></i> CDRs</a>
    <a href="settings.php" class="w3-bar-item w3-button w3-padding w3-red"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h3><b><i class="fa fa-dashboard"></i> LSA SETTINGS</b></h3>
  </header>
<hr>
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>DISPLAY MODE</h3>
        <form class="settingsForm" method="post" action='../exe/displaymode.php'>
            <input type="checkbox" name="displayMode" id="displayMode" value="1"> Toggle Dark Mode<br><br>
            <button type="submit" class="w3-black" style="width:200px; border:none; border-radius: 10px; padding:5px; cursor: pointer; margin-left:5px; margin-right:5px;">Select Mode</button>
        </form>
    </div>
  <hr>


  <!-- ASTERISK INFO -->

    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>CREATE A USER</h3>
        <form class="settingsForm"  method="post" action='../exe/createuser.php'>
            <label for="userName">Username:</label><br>
            <input type="text" name="userName" required><br><br>
            <label for="userPassword">Password:</label><br>
            <input type="password" name="userPassword" required><br><br>
            <label for="emailAddress">Email Address:</label><br>
            <input type="email" name="emailAddress" required><br><br>
            <label for="departmentAccess">Department Access:</label><br>
            <select class="form-control" id="departmentAccess" name="departmentAccess" required>
                <option value="">-- Select Access --</option>
                <option value="admin">admin</option>
                <option value="manager">manager</option>
                <option value="user">user</option>
            </select><br><br>
            <button type="submit"class="w3-black" style="width:200px; border:none; border-radius: 10px; cursor: pointer; padding:5px; margin-left:5px; margin-right:5px;">Add User</button>
        </form>
    </div>
    <hr>
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>REMOVE A USER</h3>
        <form class="settingsForm" method="post" action='../exe/deleteuser.php'>
            <label for="userNameDel">Username to Delete:</label><br>
            <input type="text" name="userNameDel" required><br><br>
            <button type="submit" class="w3-black" style="width:200px; border:none; border-radius: 10px; cursor: pointer; padding:5px; margin-left:5px; margin-right:5px;">Delete User</button>
        </form>
    </div>
  <hr>

  <div class="w3-row-padding" style="margin:0 -16px">
        <h3>SELECT SERVICES</h3>
        <form class="settingsForm" method="post" action='../exe/selectServices.php'>
            <label for="services"></label><br>
            <input type="checkbox" name="asterisk" id="asterisk" value="1"> Asterisk<br>
            <input type="checkbox" name="freepbx" id="freepbx" value="1"> FreePBX<br>
            <input type="checkbox" name="queuemetrics" id="queuemetrics" value="1"> Queuemetrics<br>
            <input type="checkbox" name="vicidial" id="vicidial" value="1"> Vicidial<br>
            <input type="checkbox" name="motion" id="motion" value="1"> Motion<br>
            <input type="checkbox" name="enswitch" id="enswitch" value="1"> Enswitch<br>
            <input type="checkbox" name="kamailio" id="kamailio" value="1"> Kamailio<br>
            <input type="checkbox" name="mysql" id="mysql" value="1"> MySQL<br>
            <input type="checkbox" name="cdrs" id="cdrs" value="1"> CDRs<br><br>
            <button type="submit" class="w3-black" style="width:200px; border:none; border-radius: 10px; cursor: pointer; padding:5px; margin-left:5px; margin-right:5px;">Save Services</button>
        </form>
    </div>
    <hr>

    <br>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-red">
    <p>Powered by <strong>LOGICALIS</strong></p>
  </footer>

  <!-- End page content -->
</div>

</body>
</html>

