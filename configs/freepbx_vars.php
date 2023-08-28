<?php
// SERVICES
$httpdCommand = "cat /var/www/html/ataglance/info/httpdstatus.info";
$httpdOut = shell_exec($httpdCommand);
if ($httpdOut > 0) {
  $httpdRunning = "Running...";
} else {
  $httpdRunning = "Stopped...";
}
$amportalCommand = "cat /var/www/html/ataglance/info/amportal.info";
$amportalOut = shell_exec($amportalCommand);
if ($amportalOut > 0) {
  $amportalRunning = "Installed";
} else {
  $amportalRunning = "Not isntalled";
}
$fwconsoleCommand = "cat /var/www/html/ataglance/info/fwconsole.info";
$fwconsoleOut = shell_exec($fwconsoleCommand);
if ($fwconsoleOut > 0) {
  $fwconsoleRunning = "Installed";
} else {
  $fwconsoleRunning = "Not installed";
}
?>

