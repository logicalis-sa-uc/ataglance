<?php
// Execute the system command
exec("service qm-tomcat6 restart");

// Respond with a success message
echo "Queuemetrics Restarted successfully.";
header("location: ../exe/queuemetrics.php");
?>
