<?php
// Run the Asterisk command and capture the output
$mysqldCommand = "cat /var/www/html/ataglance/info/mysqldstatus.info";
$mysqldOut = shell_exec($mysqldCommand);
if ($mysqldOut > 0) {
  $mysqldRunning = "Running...";
} else {
  $mysqldRunning = "Stopped...";
}
?>
