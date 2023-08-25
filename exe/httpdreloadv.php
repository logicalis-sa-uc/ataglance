<?php
// Execute the system command
exec("service httpd restart");

// Respond with a success message
echo "HTTPD Restarted successfully.";
header("location: ../admin/vicidial.php");
?>
