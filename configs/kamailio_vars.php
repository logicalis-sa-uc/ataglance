<?php
// SERVICES
$kamailioCommand = "cat /var/www/html/ataglance/info/kamailiostatus.info";
$kamailioOut = shell_exec($kamailioCommand);
if ($kamailioOut > 0) {
  $kamailioRunning = "Running...";
} else {
  $kamailioRunning = "Stopped...";
}
?>

