<?php
require "../configs/config1.php";
// SET INTERVAL EX. 1 DAY / 2 HOUR
$interval = "1 HOUR";
// Connect to your database using the appropriate credentials
$conn0 = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if (!$conn0) {
    die("Database connection failed");
}

// Query to get the required data from the database for the past 24 hours
$query0 = "SELECT timestamp, cpuUsage, memUsage, partition1, partition2, partition3, partition4 FROM server_info WHERE timestamp >= NOW() - INTERVAL ".$interval;
$result0 = mysqli_query($conn0, $query0);

// Initialize arrays to store data for the graphs
$timestamps = array();
$cpuUsages = array();
$memUsages = array();
$partition1Data = array();
$partition2Data = array();
$partition3Data = array();
$partition4Data = array();

while ($row0 = mysqli_fetch_assoc($result0)) {
    $timestamps[] = $row0['timestamp'];
    $cpuUsages[] = $row0['cpuUsage'];
    $memUsages[] = $row0['memUsage'];
    $partition1Data[] = $row0['partition1'];
    $partition2Data[] = $row0['partition2'];
    $partition3Data[] = $row0['partition3'];
    $partition4Data[] = $row0['partition4'];
}

mysqli_close($conn0);
?>

