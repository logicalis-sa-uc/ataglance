<?php
// Get Variables
$asteriskTotalExtensionsCommand = "cat /var/www/html/ataglance/info/extensionstotal.info";
$asteriskTotalTrunksCommand = "cat /var/www/html/ataglance/info/trunkstotal.info";
$asteriskConcurrentCalls = "cat /var/www/html/ataglance/info/concurrentcallstotal.info";
$uptimeCommand = "uptime | awk '{print $3}'";
$osVersionCommand = "cat /etc/redhat-release";
$asteriskVersionCommand = "/usr/sbin/asterisk -V";
$phpVersionCommand = "php -v | awk 'NR==1 {print $2}'";
$mySqlVersionCommand = "mysql -V | awk '{print $5}' | sed 's/,//g'";
$cpuCountCommand = "nproc";
$memoryTotalCommand = "free -g | awk 'NR==2 {print $2}'";
$homePartCommand = "df -h | grep /home | awk '{print $4}' | tr -d '%'";
$varPartCommand = "df -h | grep /var | awk '{print $4}' | tr -d '%'";
$callrecordingsPartCommand = "df -h | grep /callrecordings | awk '{print $4}' | tr -d '%'";
$archive2PartCommand = "df -h | grep /archive2 | awk '{print $4}' | tr -d '%'";
$homeTotalC = "df -h | grep /home | awk '{print $1}'";
$homeUsedC = "df -h | grep /home | awk '{print $2}'";
$homeFreeC = "df -h | grep /home | awk '{print $3}'";
$varTotalC = "df -h | grep /var | awk '{print $1}'";
$varUsedC = "df -h | grep /var | awk '{print $2}'";
$varFreeC = "df -h | grep /var | awk '{print $3}'";
$callrecTotalC = "df -h | grep /callrecordings | awk '{print $1}'";
$callrecUsedC = "df -h | grep /callrecordings | awk '{print $2}'";
$callrecFreeC = "df -h | grep /callrecordings | awk '{print $3}'";
$archiveTotalC = "df -h | grep /archive2 | awk '{print $1}'";
$archiveUsedC = "df -h | grep /archive2 | awk '{print $2}'";
$archiveFreeC = "df -h | grep /archive2 | awk '{print $3}'";
$totalExtensions = shell_exec($asteriskTotalExtensionsCommand);
$totalTrunks = shell_exec($asteriskTotalTrunksCommand);
$concurrentCalls = shell_exec($asteriskConcurrentCalls);
$serverUptime = shell_exec($uptimeCommand);
$osVersion = shell_exec($osVersionCommand);
$asteriskVersion = shell_exec($asteriskVersionCommand);
$phpVersion = shell_exec($phpVersionCommand);
$totalCpus = shell_exec($cpuCountCommand);
$totalMemory = shell_exec($memoryTotalCommand);
$mysqlVersion = shell_exec($mySqlVersionCommand);
$homePart = shell_exec($homePartCommand);
$varPart = shell_exec($varPartCommand);
$callrecordingsPart = shell_exec($callrecordingsPartCommand);
$archive2Part = shell_exec($archive2PartCommand);
$totalExtensionsOut = intval(trim($totalExtensions));
$homePartOut = intval(trim($homePart));
$varPartOut = intval(trim($varPart));
$callrecordingsPartOut = intval(trim($callrecordingsPart));
$archive2PartOut = intval(trim($archive2Part));
// Check if processes are running
if ($asteriskEnabled == "1") {
        $asteriskVersionA = $asteriskVersion;
} else {
        $asteriskVerionA = "Asterisk is not isntalled";
}

if ($freepbxEnabled == "1") {
        $freepbxVersion = "FreePBX is installed";
} else {
        $freepbxVersion = "FreePBX is not installed";
}

if ($queuemetricsEnabled == "1") {
        $queuemetricsVersion = "Queuemetrics is installed";
} else {
        $queuemetricsVersion = "Queuemetrics is not installed";
}

if ($vicidialEnabled == "1") {
        $vicidialVersion = "Vicidial is installed";
} else {
        $vicidialVersion = "Vicidial is not installed";
}

if ($motionEnabled == "1") {
        $motionVersion = "XCally Motion is installed";
} else {
        $motionVersion = "XCally Motion is not installed";
}

if ($enswitchEnabled == "1") {
        $enswitchVersion = "Enswitch is installed";
} else {
        $enswitchVersion = "Enswitch is not installed";
}

if ($mysqlEnabled == "1") {
        $mysqlVersionA = $mysqlVersion;
} else {
        $mysqlVersionA = "MySQL is not installed";
}
// Change colors
if ($homePartOut < 50) {
        $homeColor = "green";
} elseif ($homePartOut >= 50 && $homePartOut <= 79) {
        $homeColor = "orange";
} elseif ($homePartOut > 79){
        $homeColor = "red";
} else {
        $homeColor = "black";
}

if ($varPartOut < 50) {
        $varColor = "green";
} elseif ($varPartOut >= 50 && $varPartOut <= 80) {
        $varColor = "orange";
} elseif ($varPartOut > 79){
        $varColor = "red";
} else {
        $varColor = "black";
}
if ($callrecordingsPartOut < 50) {
        $callrecColor = "green";
} elseif ($callrecordingsPartOut >= 50 && $callrecordingsPartOut <= 80) {
        $callrecColor = "orange";
} elseif ($callrecPartOut > 79){
        $callrecColor = "red";
} else {
        $callrecColor = "black";
}

if ($archive2PartOut < 50) {
        $archive2Color = "green";
} elseif ($archive2PartOut >= 50 && $archive2PartOut <= 80) {
        $archive2Color = "orange";
} elseif ($archive2PartOut > 79){
        $archive2Color = "red";
} else {
        $arcive2Color = "black";
}

?>

