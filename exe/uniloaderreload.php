<?php
// Execute the system command
exec("service uniloader restart");

// Respond with a success message
echo "Uniloader Restarted successfully.";
header("location: ../exe/queuemetrics.php");
?>
