<?php
//SHOW SLOW QUERIES
require_once "../configs/config3.php";
//Create connection to the MySQL server
$connslow = new mysqli($DB_SERVER3, $DB_USERNAME3, $DB_PASSWORD3, $DB_NAME3);
//Check connection
if ($connslow->connect_error) {
   die("Connection failed: " . $connslow->connect_error);
   }
// Execure the Query
$slowquery = "SELECT * FROM performance_schema.events_statements_summary_by_digest WHERE digest_text IS NOT NULL AND SUM_TIMER_WAIT > 60 ORDER BY SUM_TIMER_WAIT DESC";
$slowresult = $connslow->query($slowquery);
?>
