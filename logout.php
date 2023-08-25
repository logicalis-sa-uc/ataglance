<?php
// Initialize the session
// ini_set("include_path", '/home/develyla/php:' . ini_get("include_path") );
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
?>
