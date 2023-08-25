<?php
shell_exec("asterisk -rx 'dialplan reload'");

// Respond with a success message
echo "Diaplan Reload command executed successfully.";
sleep(5);
header("location: ../admin/asterisk.php");
?>

