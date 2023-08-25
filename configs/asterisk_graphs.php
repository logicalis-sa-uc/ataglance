<?php
// SET GRAPH INTERVAL EX. 1 DAY / 6 HOUR
$interval = "1 HOUR";
// Get the data fron the database for graphs
$conn0 = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
if (!$conn0) {
    die("Database connection failed");
}
$query0 = "SELECT timestamp, concurrentCalls FROM asterisk_info WHERE timestamp >= NOW() - INTERVAL ".$interval;
$result0 = mysqli_query($conn0, $query0);
$timestamps = array();
$concurrentCalls = array();
while ($row0 = mysqli_fetch_assoc($result0)) {
    $timestamps[] = $row0['timestamp'];
    $concurrentCalls[] = $row0['concurrentCalls'];
}
mysqli_close($conn0);
?>
