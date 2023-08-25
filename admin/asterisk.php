<?php
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
require_once "../configs/asterisk_vars.php";
require_once "../configs/asterisk_graphs.php";
require_once "../configs/graph_interval.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>LSA @ A GLANCE | ASTERISK</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="60">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../scripts/asterisk_buttons.js"></script>
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
    <h3>ASTERISK</h3>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="dashboard.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-id-card fa-fw"></i>  Overview</a>
    <a href="server.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-server fa-fw"></i>  Server</a>
    <a href="asterisk.php" class="w3-bar-item w3-button w3-padding w3-red"<?php if ($asteriskEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-asterisk fa-fw"></i> Asterisk</a>
    <a href="freepbx.php" class="w3-bar-item w3-button w3-padding"<?php if ($freepbxEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-phone fa-fw"></i> FreePBX</a>
    <a href="queuemetrics.php" class="w3-bar-item w3-button w3-padding"<?php if ($queuemetricsEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-users fa-fw"></i> Queuemetrics</a>
    <a href="vicidial.php" class="w3-bar-item w3-button w3-padding"<?php if ($vicidialEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-volume-control-phone fa-fw"></i> Vicidial</a>
    <a href="motion.php" class="w3-bar-item w3-button w3-padding"<?php if ($motionEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-window-restore fa-fw"></i> Motion</a>
    <a href="enswitch.php" class="w3-bar-item w3-button w3-padding"<?php if ($enswitchEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-vcard-o fa-fw"></i> Enswitch</a>
    <a href="kamailio.php" class="w3-bar-item w3-button w3-padding"<?php if ($kamailioEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-globe fa-fw"></i> Kamailio</a>
    <a href="mysql.php" class="w3-bar-item w3-button w3-padding"<?php if ($mysqlEnabled != 1) echo ' style="display: none;"'; ?>><i class="fa fa-database fa-fw"></i> MySQL</a>
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
    <h3><b><i class="fa fa-dashboard"></i> LSA ASTERISK</b></h3>
  </header>
<hr>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-black w3-padding-16" style="border-radius: 20px;">
        <div class="w3-left"><i class="fa fa-phone w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $totalExtensions; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Extensions</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-black w3-padding-16" style="border-radius: 20px;">
        <div class="w3-left"><i class="fa fa-volume-control-phone w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $totalQueues; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Queues</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-black w3-padding-16" style="border-radius: 20px;">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $totalTrunks; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Trunks</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-black w3-text-white w3-padding-16" style="border-radius: 20px;">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $concurrentCallsInfo; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Concurrent Calls</h4>
      </div>
    </div>
  </div>
<hr>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>RUN COMMANDS</h3>
	    <button type="button" onclick="confirmReload('SIP');" class="w3-black" style="width:200px; border-radius: 10px; cursor: pointer; border:none; padding:10px; margin-left:5px; margin-right:5px;">Reload SIP</button>
	    <button type="button" onclick="confirmReload('Dialplan');" class="w3-black" style="width:200px; border-radius: 10px; cursor: pointer; border:none; padding:10px; margin-left:5px; margin-right:5px;">Reload Dialplan</button>
	    <button type="button" onclick="confirmReload('Core');" class="w3-black" style="width:200px; border-radius: 10px; cursor: pointer; border:none; padding:10px; margin-left:5px; margin-right:5px;">Reload Core</button>
    </div>
  </div>
    <hr>
  <!-- ASTERISK INFO -->

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>ASTERISK EXTENSIONS & TRUNKS</h3>
        <table class="w3-table w3-striped w3-white">
            <tr>
            <td></td>
            <td><strong>Feature</strong></td>
            <td><strong>Total</strong></td>
            <td><strong>Registered</strong></td>
            <td><strong>Offline</strong></td>
          </tr>
          <tr>
            <td><i class="fa fa-phone w3-text-black w3-large"></i></td>
            <td>Extensions</td>
            <td><?php echo $totalExtensions; ?></td>
            <td><?php echo $onlineExtensions; ?></td>
            <td><?php echo $offlineExtensions; ?></td>
          </tr>
          <tr>
            <td><i class="fa fa-volume-control-phone w3-text-black w3-large"></i></td>
            <td>Queues</td>
            <td><?php echo $totalQueues; ?></td>
            <td><?php echo $onlineQueues; ?></td>
            <td><?php echo $offlineQueues; ?></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-black w3-large"></i></td>
            <td>Trunks</td>
            <td><?php echo $totalTrunks; ?></td>
            <td><?php echo $onlineTrunks; ?></td>
            <td><?php echo $offlineTrunks; ?></td>
          </tr>
        </table>
      </div>
    </div>
  <hr>

    <br>
    <!-- ASTERISK INFO -->

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <!-- <div class="w3-twothird"> -->
        <h3>ASTERISK CONCURENT CALLS</h3>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-users w3-text-black w3-large"></i></td>
            <td>Concurrent Calls</td>
            <td><?php echo $concurrentCallsInfo; ?></td>
          </tr>
          <tr>
            <td><i class="fa fa-phone w3-text-black w3-large"></i></td>
            <td>Calls Longer than 1 Hour</td>
            <td><?php echo $longCalls; ?></td>
          </tr>
        </table>
      </div>
    </div>
  <!-- </div> -->
  <hr>

    <br>

<div class="w3-container">
    <h3>Concurrent Call Graph - <?php echo $interval; ?></h3>
    <canvas id="concurrentCallsChart" style="background-color: white;"></canvas>
</div>

    <br><br>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-red">
    <p>Powered by <strong>LOGICALIS</strong></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Concurrent Calls Graph
var concurrentCallsChart = new Chart(document.getElementById("concurrentCallsChart"), {
    type: 'line',
    data: {
        labels: <?php echo json_encode($timestamps); ?>,
        datasets: [{
            label: 'Concurrent Calls',
            data: <?php echo json_encode($concurrentCalls); ?>,
            borderColor: 'rgba(45, 129, 255, 1)',
            fill: true,
	    backgroundColor: 'rgba(45, 129, 255, 1)',
	    tension: 0.1
        }]
    },
    options: {
        responsive: true
    }
});

</script>
</body>
</html>

