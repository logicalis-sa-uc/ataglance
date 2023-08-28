<?php
//SHOW CRASHED TABLES
require_once "../configs/config3.php";
//Create connection to the MySQL server
$connctbl = new mysqli($DB_SERVER3, $DB_USERNAME3, $DB_PASSWORD3, $DB_NAME3);
//Check connection
if ($connctbl->connect_error) {
   die("Connection failed: " . $connctbl->connect_error);
   }
// Execure the Query
$ctblquery = "SHOW TABLE STATUS";
$ctblresult = $connctbl->query($ctblquery);
?>
