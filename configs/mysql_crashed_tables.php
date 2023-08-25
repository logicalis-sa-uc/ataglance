<?php
//SHOW CRASHED TABLES
require_once "../configs/config1.php";
//Create connection to the MySQL server
$connctbl = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
//Check connection
if ($connctbl->connect_error) {
   die("Connection failed: " . $connctbl->connect_error);
   }
// Execure the Query
$ctblquery = "SHOW TABLE STATUS";
$ctblresult = $connctbl->query($ctblquery);
?>
