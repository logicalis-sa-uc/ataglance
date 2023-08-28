<?php
//SHOW PROCESS LIST
require_once "../configs/config3.php";
//Create connection to the MySQL server
$connspl = new mysqli($DB_SERVER3, $DB_USERNAME3, $DB_PASSWORD3, $DB_NAME3);
//Check connection
if ($connspl->connect_error) {
   die("Connection failed: " . $connspl->connect_error);
   }
// Execure the Query
$splquery = "SHOW PROCESSLIST";
$splresult = $connspl->query($splquery);
?>
