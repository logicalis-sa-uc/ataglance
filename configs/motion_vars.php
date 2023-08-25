<?php
// SERVICES
$nginxCommand = "pgrep -x nginx | wc -l";
$nodejsCommand = "ps -ef | grep node | wc -l";
$motionCommand = "cat /var/www/html/ataglance/info/motion.info";
//
$nginxOut = shell_exec($nginxCommand);
$nodejsOut = shell_exec($nodejsCommand);
$motionOut = shell_exec($motionCommand);
$motionOutLines = explode("\n", trim($motionOut));
//
if ($nginxOut > 0) {
  $nginxRunning = "Running...";
} else {
  $nginxRunning = "Stopped...";
}
if ($nodejsOut > 1) {
  $nodejsRunning = "Running...";
} else {
  $nodejsRunning = "Stopped...";
}
?>

