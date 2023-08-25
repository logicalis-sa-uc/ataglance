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
require_once "../configs/mysql_vars.php";
require_once "../configs/mysql_process_list.php";
require_once "../configs/mysql_crashed_tables.php";
require_once "../configs/mysql_replication.php";
require_once "../configs/mysql_slow_queries.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>LSA @ A GLANCE | MYSQL</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="60">
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
    <h3>MYSQL</h3>
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
    <a href="mysql.php" class="w3-bar-item w3-button w3-padding w3-red"<?php if ($mysqlEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-database fa-fw"></i> MySQL</a>
    <a href="commands.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-code fa-fw"></i>  Commands</a>
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
    <h3><b><i class="fa fa-dashboard"></i> LSA MYSQL</b></h3>
  </header>
<hr>
  <!-- ASTERISK INFO -->

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>MYSQL SERVICES</h3>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-globe w3-text-black w3-large"></i></td>
            <td>MySQL</td>
            <td><?php echo $mysqldRunning; ?></td>
          </tr>
        </table>
      </div>
    </div>
  <!-- </div> -->
  <hr>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>MYSQL PROCESS LIST</h3>
	<?php
	if ($splresult) {
	 echo "<table class='w3-table w3-striped w3-white'>";
	    echo "<tr><th>ID</th><th>User</th><th>Host</th><th>db</th><th>Command</th><th>Time</th><th>State</th><th>Info</th></tr>";
	    while ($splrow = $splresult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $splrow['Id'] . "</td>";
        echo "<td>" . $splrow['User'] . "</td>";
        echo "<td>" . $splrow['Host'] . "</td>";
        echo "<td>" . $splrow['db'] . "</td>";
        echo "<td>" . $splrow['Command'] . "</td>";
        echo "<td>" . $splrow['Time'] . "</td>";
        echo "<td>" . $splrow['State'] . "</td>";
        echo "<td>" . $splrow['Info'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . $connspl->error;
}

// Close the connection
$connspl->close();
?>
</div>
</div>
<hr>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>MYSQL CRASHED TABLES</h3>
        <?php
        if ($ctblresult) {
    	echo "<ul>";
    	while ($ctblrow = $ctblresult->fetch_assoc()) {
        if ($ctblrow['Engine'] == 'MyISAM' && $ctblrow['Data_length'] == 0) {
            echo "<li>" . $row['Name'] . "</li>";
        }
    	}
    	echo "</ul>";
	} else {
        echo "Error: " . $connctbl->error;
	}

// Close the connection
$connctbl->close();
?>
</div>
</div>
<hr>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>MYSQL REPLICATION</h3>
        <?php
	if ($represult) {
	    $reprow = $represult->fetch_assoc();
	    if ($reprow) {
	        echo "<h2>Replication Status:</h2>";
	        echo "<pre>";
	        print_r($reprow);
	        echo "</pre>";
	    } else {
	        echo "No replication status information available.";
	    }
	} else {
	    echo "Error: " . $connrep->error;
	}

// Close the connection
$connrep->close();
?>
</div>
</div>
<hr>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>MYSQL SLOW QUERIES</h3>
        <?php
	if ($slowresult) {
    echo "<table class='w3-table w3-striped w3-white'>";
    echo "<tr><th>Digest</th><th>Query Text</th><th>Total Execution Time</th></tr>";
    while ($slowrow = $slowresult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $slowrow['DIGEST'] . "</td>";
        echo "<td>" . $slowrow['DIGEST_TEXT'] . "</td>";
        echo "<td>" . $slowrow['SUM_TIMER_WAIT'] . " seconds</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . $connslow->error;
}

// Close the connection
$connslow->close();
?>
</div>
</div>
<hr>



    <br>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- End page content -->
</div>

</body>
</html>

