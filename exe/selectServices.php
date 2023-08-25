<?php
//ini_set("include_path", '/home/develyla/php:' . ini_get("include_path") );
// Initialize the session
@ob_start();
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LSA @ A GLANCE | REGISTER</title>
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>
<?php
        // Include config file
        require_once "../configs/config1.php";

    // Create connection
    $conn = new mysqli("$DB_SERVER", "$DB_USERNAME", "$DB_PASSWORD", "$DB_NAME");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $asterisk = isset($_POST['asterisk']) ? 1 : 0;
            $freepbx = isset($_POST['freepbx']) ? 1 : 0;
            $queuemetrics = isset($_POST['queuemetrics']) ? 1 : 0;
            $vicidial = isset($_POST['vicidial']) ? 1 : 0;
            $motion = isset($_POST['motion']) ? 1 : 0;
            $enswitch = isset($_POST['enswitch']) ? 1 : 0;
            $mysql = isset($_POST['mysql']) ? 1 : 0;
            $cdrs = isset($_POST['cdrs']) ? 1 : 0;
	    $kamailio = isset($_POST['kamailio']) ? 1 : 0;

            $sql = 'UPDATE lsa_services SET asterisk="'.$asterisk.'", freepbx="'.$freepbx.'", queuemetrics="'.$queuemetrics.'", vicidial="'.$vicidial.'", motion="'.$motion.'", enswitch="'.$enswitch.'", mysql="'.$mysql.'", cdrs="'.$cdrs.'", kamailio="'.$kamailio.'"';

            if ($conn->query($sql) === TRUE) {
                echo "Services saved successfully!";
                header("Location: ../admin/settings.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
?>


<footer>
<?php
ob_flush();
?>
</footer>
</body>
