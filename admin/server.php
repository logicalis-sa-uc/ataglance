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
require_once "../configs/server_vars.php";
require_once "../configs/server_graphs.php";
require_once "../configs/partition_vars.php";
require_once "../configs/graph_interval.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>LSA @ A GLANCE | SERVER</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="60">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <h3>SERVER</h3>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="dashboard.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-id-card fa-fw"></i>  Overview</a>
    <a href="server.php" class="w3-bar-item w3-button w3-padding w3-red"><i class="fa fa-server fa-fw"></i>  Server</a>
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
    <a href="settings.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h3><b><i class="fa fa-dashboard"></i> LSA SERVER</b></h3>
  </header>
<hr>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-black w3-padding-16" style="border-radius: 20px;">
        <div class="w3-left"><i class="fa fa-clock-o w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $uptimeOut; ?> days</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Uptime</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-black w3-padding-16" style="border-radius: 20px;">
        <div class="w3-left"><i class="fa fa-desktop w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $cpuCountOut; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>CPU Count</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-black w3-padding-16" style="border-radius: 20px;">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $memoryTotalOut; ?> GB</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Memory</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-black w3-text-white w3-padding-16" style="border-radius: 20px;">
        <div class="w3-left"><i class="fa fa-balance-scale w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $averageLoadOut; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Load Average</h4>
      </div>
    </div>
  </div>
<hr>
  <!-- Services -->

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>SERVICES</h3>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-globe w3-text-black w3-large"></i></td>
            <td>HTTPS</td>
            <td><i><?php echo $httpdRunning; ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-asterisk w3-text-black w3-large"></i></td>
            <td>Asterisk</td>
            <td><i><?php echo $asteriskRunning; ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-database w3-text-black w3-large"></i></td>
            <td>MySQL</td>
            <td><i><?php echo $mysqldRunning; ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-clock-o w3-text-black w3-large"></i></td>
            <td>NTP</td>
            <td><i><?php echo $ntpdRunning; ?></i></td>
          </tr>
        </table>
      </div>
    </div>
  <!-- </div> -->
  <hr>

    <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
       <h3>SSL Certification</h3>
	<p><?php echo $sslcertOutB; ?><br>
	<?php echo $sslcertOutA; ?></p>
  </div>
  </div>
  <hr>


    <!-- Performance -->

    <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
  <div class="w3-container">
    <h3>PERFORMANCE</h3>
    <p>CPU</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding" style="width:<?php echo $cpuIntValue; ?>%; background-color: <?php echo $cpuColor; ?>;"><?php echo $cpuOut; ?>%</div>
    </div>

    <p>MEMORY</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding" style="width:<?php echo $memIntValue; ?>%; background-color: <?php echo $memColor; ?>;"><?php echo $memIntValue; ?>%</div>
    </div>
  </div>

  <hr>



    <br><br>

    <!-- HDDS -->

    <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h3>PARTITIONS</h3>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-hdd-o w3-text-black w3-large"></i></td>
            <td><strong>NAME</strong></td>
            <td><strong>TOTAL</strong></td>
            <td><strong>USED</strong></td>
            <td><strong>FREE</strong></td>
          </tr>
          <tr>
            <td><i class="fa fa-hdd-o w3-text-black w3-large"></i></td>
            <td>/home</td>
            <td><i><?php echo $homePartTotal; ?></i></td>
            <td><i><?php echo $homePartUsed; ?></i></td>
            <td><i><?php echo $homePartFree; ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-hdd-o w3-text-black w3-large"></i></td>
            <td>/var</td>
            <td><i><?php echo $varPartTotal; ?></i></td>
            <td><i><?php echo $varPartUsed; ?></i></td>
            <td><i><?php echo $varPartFree; ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-hdd-o w3-text-black w3-large"></i></td>
            <td>/callrecordings</td>
            <td><i><?php echo $callrecordingsPartTotal; ?></i></td>
            <td><i><?php echo $callrecordingsPartUsed; ?></i></td>
            <td><i><?php echo $callrecordingsPartFree; ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-hdd-o w3-text-black w3-large"></i></td>
            <td>/archive2</td>
            <td><i><?php echo $archivePartTotal; ?></i></td>
            <td><i><?php echo $archivePartUsed; ?></i></td>
            <td><i><?php echo $archivePartFree; ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-microchip w3-text-black w3-large"></i></td>
            <td>SWAP</td>
            <td><i><?php echo $swapMemTotal; ?> G</i></td>
            <td><i><?php echo $swapMemUsed; ?> G</i></td>
            <td><i><?php echo $swapMemFree; ?> G</i></td>
          </tr>

        </table>
      </div>
    </div>
  <!-- </div> -->
  <hr>

  <!-- Partitions -->

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
  <div class="w3-container">
    <h3>PARTITIONS</h3>
    <p>/home</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding" style="width:<?php echo $homePartOut; ?>%; background-color: <?php echo $homeColor; ?>;"><?php echo $homePartOut; ?>%</div>
    </div>

    <p>/var</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding" style="width:<?php echo $varPartOut; ?>%; background-color: <?php echo $varColor; ?>;"><?php echo $varPartOut; ?>%</div>
    </div>

    <p>/callrecordings</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding" style="width:<?php echo $callrecordingsPartOut; ?>%; background-color: <?php echo $callrecColor; ?>;"><?php echo $callrecordingsPartOut; ?>%</div>
    </div>

    <p>/archive2</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding" style="width:<?php echo $archive2PartOut; ?>%; background-color: <?php echo $archive2Color; ?>;"><?php echo $archive2PartOut; ?>%</div>
    </div>
  </div>
  <hr>
  <br>
    <h3>Server Graphs</h3>
<br>
<br>
    <h3>CPU Graph - <?php echo $interval; ?></h3>
<!-- CPU Usage Graph -->
<div class="w3-container">
    <canvas id="cpuUsageChart" style="background-color: white;"></canvas>
</div>
<hr>
<br>
    <h3>Memory Graph - <?php echo $interval; ?></h3>
<!-- Memory graph -->
 <div class="w3-container">
    <canvas id="memUsageChart" style="background-color: white;"></canvas>
</div>
<hr>
<br>
    <h3>Partition Graph - <?php echo $interval; ?></h3>
<!-- Partition Usage Graph -->
 <div class="w3-container">
    <canvas id="partitionUsageChart" style="background-color: white;"></canvas>
</div>
  <br>
  <hr>
  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-red">
    <p>Powered by <strong>LOGICALIS</strong></p>
  </footer>

  <!-- End page content -->
</div>

<script>
var cpuUsageChart = new Chart(document.getElementById("cpuUsageChart"), {
    type: 'line',
    data: {
        labels: <?php echo json_encode($timestamps); ?>,
        datasets: [{
            label: 'CPU Usage',
            data: <?php echo json_encode($cpuUsages); ?>,
            borderColor: 'rgba(75, 192, 192, 1)',
            fill: false,
	    backgroundColor: 'rgba(75, 192, 192, 1)'
        }]
    },
    options: {
        responsive: true
    }
});

var memUsageChart = new Chart(document.getElementById("memUsageChart"), {
    type: 'line',
    data: {
        labels: <?php echo json_encode($timestamps); ?>,
        datasets: [{
            label: 'Memory Usage',
            data: <?php echo json_encode($memUsages); ?>,
            borderColor: 'rgba(255, 99, 132, 1)',
            fill: false,
	    backgroundColor: 'rgba(255, 99, 132, 1)'
        }]
    },
    options: {
        responsive: true
    }
});

var partitionUsageChart = new Chart(document.getElementById("partitionUsageChart"), {
    type: 'line',
    data: {
        labels: <?php echo json_encode($timestamps); ?>,
        datasets: [
            {
                label: '/home',
                data: <?php echo json_encode($partition1Data); ?>,
                borderColor: 'rgba(255, 159, 64, 1)',
                fill: false
            },
            {
                label: '/var',
                data: <?php echo json_encode($partition2Data); ?>,
                borderColor: 'rgba(54, 162, 235, 1)',
                fill: false
            },
            {
                label: '/callrecordings',
                data: <?php echo json_encode($partition3Data); ?>,
                borderColor: 'rgba(153, 102, 255, 1)',
                fill: false
            },
            {
                label: '/archive2',
                data: <?php echo json_encode($partition4Data); ?>,
                borderColor: 'rgba(75, 192, 192, 1)',
                fill: false
            }
        ]
    },
    options: {
        responsive: true
    }
});
</script>

</body>
</html>

