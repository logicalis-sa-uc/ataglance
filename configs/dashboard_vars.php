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
?>

