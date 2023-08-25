<?php
shell_exec("asterisk -rx 'core reload'");

// Respond with a success message
echo "Core Reload command executed successfully.";
sleep(5);
header("location: asterisk.php");
?>


