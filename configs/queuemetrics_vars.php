<?php
// SERVICES
$qmCommand = "cat /var/www/html/ataglance/info/qmstatus.info";
$qloaderCommand = "cat /var/www/html/ataglance/info/qloaderstatus.info";
$uniloaderCommand = "cat /var/www/html/ataglance/info/uniloaderstatus.info";
//
$qmOut = shell_exec($qmCommand);
$qloaderOut = shell_exec($qloaderCommand);
$uniloaderOut = shell_exec($uniloaderCommand);
//
if ($qmOut > 1) {
  $qmRunning = "Running...";
} else {
  $qmRunning = "Stopped...";
}
if ($qloaderOut > 1) {
  $qloaderRunning = "Running...";
} else {
  $qloaderRunning = "Stopped...";
}
if ($uniloaderOut > 1) {
  $uniloaderRunning = "Running...";
} else {
  $uniloaderRunning = "Stopped...";
}
?>
