<?php
//SHOW REPLICATION
require_once "../configs/config1.php";
//Create connection to the MySQL server
$connrep = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
//Check connection
if ($connrep->connect_error) {
   die("Connection failed: " . $connrep->connect_error);
   }
// Execure the Query
$repquery = "SHOW SLAVE STATUS";
$represult = $connrep->query($repquery);
?>
