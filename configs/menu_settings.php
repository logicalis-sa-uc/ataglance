<?php
    // Include config file
    require_once "../configs/config1.php";
    //Set Variables
    $userName = $_SESSION['username'];
    // Fetch the value of "freepbx" from the database
    $menulink = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $menuquery = "SELECT * FROM lsa_services";
    $menuresult = mysqli_query($menulink, $menuquery);

    if ($menuresult) {
      $row = mysqli_fetch_assoc($menuresult);
      $asteriskEnabled = $row['asterisk'];
      $freepbxEnabled = $row['freepbx'];
      $queuemetricsEnabled = $row['queuemetrics'];
      $vicidialEnabled = $row['vicidial'];
      $motionEnabled = $row['motion'];
      $enswitchEnabled = $row['enswitch'];
      $mysqlEnabled = $row['mysql'];
      $cdrsEnabled = $row['cdrs'];
      $kamailioEnabled = $row['kamailio'];
      mysqli_free_result($resultmenu);
    } else {
      // Handle database query error if needed
      $asteriskEnabled = 0; // Default value if the query fails
      $freepbxEnabled = 0; // Default value if the query fails
      $queuemetricsEnabled = 0; // Default value if the query fails
      $vicidialEnabled = 0; // Default value if the query fails
      $motionEnabled = 0; // Default value if the query fails
      $enswitchEnabled = 0; // Default value if the query fails
      $mysqlEnabled = 0; // Default value if the query fails
      $cdrsEnabled = 0; // Default value if the query fails
      $kamailioEnabled = 0; // Default value if the query fails
  }

?>

