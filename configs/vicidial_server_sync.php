<?php
//SHOW SERVER UPDATER
require_once "../configs/config2.php";
//Create connection to the MySQL server
$connsu = new mysqli($DB_SERVER2, $DB_USERNAME2, $DB_PASSWORD2, $DB_NAME2);
//Check connection
if ($connsu->connect_error) {
   die("Connection failed: " . $connsu->connect_error);
   }
// Execure the Query
$suquery = "SELECT * FROM server_updater;";
$suresult = $connsu->query($suquery);
?>

