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
<title>LSA @ A GLANCE | COMMANDS</title>
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
    <h3>COMMANDS</h3>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="../user/dashboard.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-id-card fa-fw"></i>  Overview</a>
    <a href="../user/server.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-server fa-fw"></i>  Server</a>
    <a href="../user/asterisk.php" class="w3-bar-item w3-button w3-padding"<?php if ($asteriskEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-asterisk fa-fw"></i> Asterisk</a>
    <a href="../user/freepbx.php" class="w3-bar-item w3-button w3-padding"<?php if ($freepbxEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-phone fa-fw"></i> FreePBX</a>
    <a href="../user/queuemetrics.php" class="w3-bar-item w3-button w3-padding"<?php if ($queuemetricsEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-users fa-fw"></i> Queuemetrics</a>
    <a href="../user/vicidial.php" class="w3-bar-item w3-button w3-padding"<?php if ($vicidialEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-volume-control-phone fa-fw"></i> Vicidial</a>
    <a href="../user/motion.php" class="w3-bar-item w3-button w3-padding"<?php if ($motionEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-window-restore fa-fw"></i> Motion</a>
    <a href="../user/enswitch.php" class="w3-bar-item w3-button w3-padding"<?php if ($enswitchEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-vcard-o fa-fw"></i> Enswitch</a>
    <a href="../user/kamailio.php" class="w3-bar-item w3-button w3-padding"<?php if ($kamailioEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-globe fa-fw"></i> Kamailio</a>
    <a href="../user/mysql.php" class="w3-bar-item w3-button w3-padding"<?php if ($mysqlEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-database fa-fw"></i> MySQL</a>
    <a href="../user/commands.php" class="w3-bar-item w3-button w3-padding w3-red"><i class="fa fa-code fa-fw"></i>  Commands</a>
    <a href="../user/cdrs.php" class="w3-bar-item w3-button w3-padding"<?php if ($cdrsEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-calendar fa-fw"></i> CDRs</a>
    <a href="../user/settings.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
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

  <!-- ASTERISK INFO -->

  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $logFile = $_POST["logFile"];
    $logCount = $_POST["logCount"];
    
    // Validate input (you should perform more thorough validation)
    if (!empty($logFile) && is_numeric($logCount)) {
        $logCount = (int)$logCount;
        
        // Execute the tail command
        $command = "tail -n $logCount $logFile";
        $output = shell_exec($command);
        
	// Split the output into lines
        $outputLines = explode("\n", trim($output));
    } else {
        echo "Invalid input";
    }
}
?>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>CHECK LOGS</h3>
        <?php
	if (isset($outputLines)) {
            foreach ($outputLines as $line) {
                echo "<p>$line</p>";
            }
        }

	?>
    </div>
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

