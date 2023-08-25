<?php
//ini_set("include_path", '/home/develyla/php:' . ini_get("include_path") );
// Initialize the session
@ob_start();
session_start();

// Check if the user is logged in, if not then redirect him to the login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}
?>
<?php
// Include config file
require_once "../configs/config1.php";
require_once "../configs/config2.php";
require_once "../configs/display_settings.php";
require_once "../configs/menu_settings.php";

$userName = $_SESSION['username'];

// Get variables
$startDate = $_POST["startDate"];
$startTime = $_POST["startTime"];
$endDate = $_POST["endDate"];
$endTime = $_POST["endTime"];
$clid = $_POST["clid"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LSA @ A GLANCE | CDR's</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        table {
            width: 100%;
	    overflow-x: auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h3> CDR Information</h3>
<br>
<table>
    <tr>
        <th>Call Date</th>
        <th>CLID</th>
        <th>Source</th>
        <th>Destination</th>
        <th>DContext</th>
        <th>Channel</th>
        <th>Dst Channel</th>
        <th>Last App</th>
        <th>Duration</th>
        <th>Bill Seconds</th>
        <th>Disposition</th>
        <th>UniqueID</th>
    </tr>
    <?php
    // Create connection
    $conn = new mysqli("$DB_SERVER2", "$DB_USERNAME2", "$DB_PASSWORD2", "$DB_NAME2");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Prepare the MySQL Query
    $sql = "SELECT calldate, clid, src, dst, dcontext, channel, dstchannel, lastapp, lastdata, duration, billsec, disposition, uniqueid, cnum, cnam FROM cdr WHERE calldate BETWEEN '" . $startDate . " " . $startTime . "' AND '" . $endDate . " " . $endTime . "' AND (src LIKE '%" . $clid . "%' OR dst LIKE '%" . $clid . "%')";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Output the CDR Information
            echo "<tr>";
            echo "<td>" . $row["calldate"] . "</td>";
            echo "<td>" . $row["clid"] . "</td>";
            echo "<td>" . $row["src"] . "</td>";
            echo "<td>" . $row["dst"] . "</td>";
            echo "<td>" . $row["dcontext"] . "</td>";
            echo "<td>" . $row["channel"] . "</td>";
            echo "<td>" . $row["dstchannel"] . "</td>";
            echo "<td>" . $row["lastapp"] . "</td>";
            echo "<td>" . $row["duration"] . "</td>";
            echo "<td>" . $row["billsec"] . "</td>";
            echo "<td>" . $row["disposition"] . "</td>";
            echo "<td>" . $row["uniqueid"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='14'>No records found</td></tr>";
    }
    // Close the database connection
    $conn->close();
    ?>
</table>

<footer>
    <?php
    ob_flush();
    ?>
</footer>
</body>
</html>
