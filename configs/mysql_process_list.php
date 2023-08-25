<?php
//SHOW PROCESS LIST
require_once "../configs/config1.php";
//Create connection to the MySQL server
$connspl = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
//Check connection
if ($connspl->connect_error) {
   die("Connection failed: " . $connspl->connect_error);
   }
// Execure the Query
$splquery = "SHOW PROCESSLIST";
$splresult = $connspl->query($splquery);
?>
