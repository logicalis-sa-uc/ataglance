<?php
// Execute the system command
exec("service kamailio restart");

// Respond with a success message
echo "Kamailio Restarted successfully.";
header("location: ../admin/kamailio.php");
?>
