<?php
// Execute the system command
exec("service qloaderd restart");

// Respond with a success message
echo "Qloader Restarted successfully.";
header("location: ../exe/queuemetrics.php");
?>
