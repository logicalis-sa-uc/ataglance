<?php
//SHOW REPLICATION
require_once "../configs/config3.php";
//Create connection to the MySQL server
$connrep = new mysqli($DB_SERVER3, $DB_USERNAME3, $DB_PASSWORD3, $DB_NAME3);
//Check connection
if ($connrep->connect_error) {
   die("Connection failed: " . $connrep->connect_error);
   }
// Execure the Query
$repquery = "SHOW SLAVE STATUS";
$represult = $connrep->query($repquery);
?>
