<?php
// Top Section
$uptimeCommand = "uptime | awk '{print $3}'";
$cpuCountCommand = "nproc";
$memoryTotalCommand = "free -g | awk 'NR==2 {print $2}'";
$averageLoadCommand = "uptime | awk '{print $10}' | sed 's/,//g'";
// SERVICES
$httpdCommand = "cat /var/www/html/ataglance/info/httpdstatus.info";
$asteriskCommand = "cat /var/www/html/ataglance/info/asteriskstatus.info";
$mysqldCommand = "cat /var/www/html/ataglance/info/mysqldstatus.info";
$ntpdCommand = "cat /var/www/html/ataglance/info/ntpddstatus.info";
$sslcertbCommand = "cat /var/www/html/ataglance/info/sslcert.info | grep Before";
$sslcertaCommand = "cat /var/www/html/ataglance/info/sslcert.info | grep After";
// PERFORMANCE
$cpuCommand = "top -bn 1 | grep 'Cpu(s)' | awk '{print $2 + $4}'";
$memCommand = "free -m | grep Mem | awk '{print ($3/$2)*100}'";
// RUN COMMANDS AND GET OUTPUTS
$uptimeOut = shell_exec($uptimeCommand);
$cpuCountOut = shell_exec($cpuCountCommand);
$memoryTotalOut = shell_exec($memoryTotalCommand);
$averageLoadOut = shell_exec($averageLoadCommand);
//
$httpdOut = shell_exec($httpdCommand);
$asteriskOut = shell_exec($asteriskCommand);
$mysqldOut = shell_exec($mysqldCommand);
$ntpdOut = shell_exec($ntpdCommand);
$sslcertOutB = shell_exec($sslcertbCommand);
$sslcertOutA = shell_exec($sslcertaCommand);
//
$cpuOut = shell_exec($cpuCommand);
$memOut = shell_exec($memCommand);
//OUTPUT VALIDATION
if ($httpdOut > 0) {
        $httpdRunning = "Running...";
} else {
        $httpdRunning = "Stopped...";
}

if ($asteriskOut > 0) {
        $asteriskRunning = "Running...";
} else {
        $asteriskRunning = "Stopped...";
}

if ($mysqldOut > 0) {
        $mysqldRunning = "Running...";
} else {
        $mysqldRunning = "Stopped...";
}

if ($ntpdOut > 0) {
        $ntpdRunning = "Running...";
} else {
        $ntpdRunning = "Stopped...";
}

//Changes to Intiger
if ($cpuOut !== null) {
    $cpuIntValue = intval(trim($cpuOut));
    echo "CPU Output as Integer: $cpuIntValue";
} else {
    echo "Error executing CPU command.";
}

if ($memOut !== null) {
    $memIntValue = intval(trim($memOut));
    echo "Memory Output as Integer: $memIntValue";
} else {
    echo "Error executing Memory command.";
}
// Color for CPU & MEM
if ($cpuOut < 50) {
        $cpuColor = "green";
} elseif ($cpuOut >= 50 && $cpuOut <= 79) {
        $cpuColor = "orange";
} elseif ($cpuOut > 79){
        $cpuColor = "red";
} else {
        $cpuColor = "black";
}

if ($memIntValue < 50) {
        $memColor = "green";
} elseif ($memIntValue >= 50 && $memOut <= 79) {
        $memColor = "orange";
} elseif ($memIntValue > 79){
        $memColor = "red";
} else {
        $memColor = "black";
}
?>

