<?php
shell_exec("asterisk -rx 'sip reload'");

// Respond with a success message
echo "SIP Reload command executed successfully.";
sleep(5);
header("location: ../exe/asterisk.php");
?>
