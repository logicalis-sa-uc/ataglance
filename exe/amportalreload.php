<?php
// Execute the system command
exec("service amportal restart");

// Respond with a success message
echo "AMPORTAL Restarted successfully.";
header("location: freepbx.php");
?>
