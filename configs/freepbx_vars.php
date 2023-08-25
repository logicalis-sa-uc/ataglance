<?php
// SERVICES
$httpdCommand = "cat /var/www/html/ataglance/info/httpdstatus.info";
$httpdOut = shell_exec($httpdCommand);
if ($httpdOut > 0) {
  $httpdRunning = "Running...";
} else {
  $httpdRunning = "Stopped...";
}
$amportalCommand = "ls -l /usr/sbin/ | grep amportal | wc -l";
$amportalOut = shell_exec($amportalCommand);
if ($amportalOut > 0) {
  $amportalRunning = "Installed";
} else {
  $amportalRunning = "Not isntalled";
}
$fwconsoleCommand = "ls -l /usr/sbin/ | grep fwconsole | wc -l";
$fwconsoleOut = shell_exec($fwconsoleCommand);
if ($fwconsoleOut > 0) {
  $fwconsoleRunning = "Installed";
} else {
  $fwconsoleRunning = "Not installed";
}
?>

