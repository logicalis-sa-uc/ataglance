<?php
// Execute the system command
exec("service fwconsole restart");

// Respond with a success message
echo "FWCONSOLE Restarted successfully.";
header("location: ../admin/freepbx.php");
?>
