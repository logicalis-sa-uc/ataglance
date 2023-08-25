<?php
    // Include config file
    require_once "../configs/config1.php";
    // Set Variables
    $userName = $_SESSION['username'];
    // Fetch the value of "freepbx" from the database
    $displaylink = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $displayquery = "SELECT DisplayMode FROM lsa_users WHERE userName = '$userName'";
    $displayresult = mysqli_query($displaylink, $displayquery);

    // Default colors
    $bgColor = "#333333";
    $txtColor = "#ffffff";

    if ($displayresult) {
        $row = mysqli_fetch_assoc($displayresult);
        $displayMode = $row['DisplayMode'];

        if ($displayMode == 0) {
            $bgColor = "#ffffff";
            $txtColor = "#333333";
        } else {
            $bgColor = "#333333";
            $txtColor = "#ffffff";
        }
    }

    // Close the database connection
    mysqli_close($displaylink);
?>
