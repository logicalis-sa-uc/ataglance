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
<html>
<head>
<title>LSA @ A GLANCE | COMMANDS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
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
    <h3>COMMANDS</h3>
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
    <a href="commands.php" class="w3-bar-item w3-button w3-padding w3-red"><i class="fa fa-code fa-fw"></i>  Commands</a>
    <a href="cdrs.php" class="w3-bar-item w3-button w3-padding"<?php if ($cdrsEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-calendar fa-fw"></i> CDRs</a>
    <a href="settings.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h3><b><i class="fa fa-dashboard"></i> LSA COMMANDS</b></h3>
  </header>
<hr>
  <!-- ASTERISK INFO -->

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>CHECK LOGS</h3>
        <form method="post" action='../exe/logfilesm.php'>
            <label for="logFile">Log File</label><br>
            <select class="form-control" id="logFile" name="logFile" style="background-color: lightgrey;">
                <option value="/var/log/messages">messages (server)</option>
                <option value="/var/log/asterisk/full">full (asterisk)</option>
                <option value="/var/log/asterisk/queue_log">queue_log (asterisk)</option>
                <option value="/var/log/asterisk/qloaderd.log">qloaderd (asterisk)</option>
		<option value="/var/log/asterisk/uniloader.log">uniloader (asterisk)</option>
                <option value="/var/log/access_log">access_log (httpd)</option>
                <option value="/var/log/error_log">error log (httpd)</option>
                <option value="/var/log/ssl_access_log">ssl access log (httpd)</option>
                <option value="/var/log/ssl_error_log">ssl error log (httpd)</option>
                <option value="/var/log/mysqld.log">mysqld log</option>
                <option value="/usr/local/queuemetrics/tomcat/logs/catalina.<?php echo $thisdate; ?>.log">catalina (QM)</option>
                <option value="/usr/local/queuemetrics/tomcat/logs/catalina.out">catalina out</option>
                <option value="/usr/local/queuemetrics/tomcat/logs/host-manager.<?php echo $thisdate; ?>.log">host-manager (QM)</option>
                <option value="/usr/local/queuemetrics/tomcat/logs/localhost.<?php echo $thisdate; ?>.log">localhost (QM)</option>
                <option value="/usr/local/queuemetrics/tomcat/logs/manager.<?php echo $thisdate; ?>.log">manager (QM)</option>
                <option value="/usr/local/queuemetrics/tomcat/logs/queuemetrics.<?php echo $thisdate; ?>.log">queuemetrics</option>
            </select><br>
            <label for="logCount">Log Count</label><br>
            <input type="text" class="form-control" id="logCount" name="logCount" style="background-color: lightgrey;"><br><br>
            <button type="submit" name="submit" class="w3-black" style="width:200px; cursor: pointer; border-radius: 10px; border:none; padding:10px; margin-left:5px; margin-right:5px;">Check Logs</button>
        </form>
    </div>
    <hr>
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>CHECK ASTERISK FULL</h3>
        <form method="post" action='../exe/asteriskSearchm.php'>
            <label for="astSearch">Search For</label><br>
            <input type="text" class="form-control" id="astSearch" name="astSearch" style="background-color: lightgrey"><br><br>
            <button type="submit" name="submit" class="w3-black" style="width:200px; cursor: pointer; border-radius: 10px; border:none; padding:10px; margin-left:5px; margin-right:5px;">Asterisk Search</button>
        </form>
    </div>

  </div>
  <hr>


    <br>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- End page content -->
</div>

</script>

</body>
</html>

