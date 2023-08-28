<?php
// NAME YOUR PARTITIONS
$partition1 = "/home";
$partition2 = "/var";
$partition3 = "/var/spool/asterisk/monitor";
$partition4 = "/var/spool/voipmonitor";
// EDIT THIS FILE TO GET THE RELEVANT PATRITION INFORMATION
$part1Command = "df -h | grep $partition1 | awk '{print $4}' | tr -d '%'";
$part2Command = "df -h | grep $partition2 | awk '{print $4}' | tr -d '%'";
$part3Command = "df -h | grep $partition3 | awk '{print $4}' | tr -d '%'";
$part4Command = "df -h | grep $partition4 | awk '{print $4}' | tr -d '%'";
$part1TotalC = "df -h | grep $partition1 | awk '{print $2}' | head -n 1";
$part1UsedC = "df -h | grep $partition1 | awk '{print $3}' | head -n 1";
$part1FreeC = "df -h | grep $partition1 | awk '{print $4}' | head -n 1";
$part2TotalC = "df -h | grep $partition2 | awk '{print $2}' | head -n 1";
$part2UsedC = "df -h | grep $partition2 | awk '{print $3}' | head -n 1";
$part2FreeC = "df -h | grep $partition2 | awk '{print $4}' | head -n 1";
$part3TotalC = "df -h | grep $partition3 | awk '{print $2}' | head -n 1";
$part3UsedC = "df -h | grep $partition3 | awk '{print $3}' | head -n 1";
$part3FreeC = "df -h | grep $partition3 | awk '{print $4}' | head -n 1";
$part4TotalC = "df -h | grep $partition4 | awk '{print $2}' | head -n 1";
$part4UsedC = "df -h | grep $partition4 | awk '{print $3}' | head -n 1";
$part4FreeC = "df -h | grep $partition4 | awk '{print $4}' | head -n 1";
$part1 = shell_exec($part1Command);
$part2 = shell_exec($part2Command);
$part3 = shell_exec($part3Command);
$part4 = shell_exec($part4Command);
$part1Out = intval(trim($part1));
$part2Out = intval(trim($part2));
$part3Out = intval(trim($part3));
$part4Out = intval(trim($part4));

$swapMemTotalC = "free -g | grep Swap | awk '{print $2}'";
$swapMemUsedC = "free -g | grep Swap | awk '{print $3}'";
$swapMemFreeC = "free -g | grep Swap | awk '{print $4}'";
// PARTITION SPACE
$part1Total = shell_exec($part1TotalC);
$part1Used = shell_exec($part1UsedC);
$part1Free = shell_exec($part1FreeC);
$part2Total = shell_exec($part2TotalC);
$part2Used = shell_exec($part2UsedC);
$part2Free = shell_exec($part2FreeC);
$part3Total = shell_exec($part3TotalC);
$part3Used = shell_exec($part3UsedC);
$part3Free = shell_exec($part3FreeC);
$part4Total = shell_exec($part4TotalC);
$part4Used = shell_exec($part4UsedC);
$part4Free = shell_exec($part4FreeC);
$swapMemTotal = shell_exec($swapMemTotalC);
$swapMemUsed = shell_exec($swapMemUsedC);
$swapMemFree = shell_exec($swapMemFreeC);

if ($part1Out < 50) {
        $part1Color = "green";
} elseif ($part1Out >= 50 && $part1Out <= 79) {
        $part1Color = "orange";
} elseif ($part1Out > 79){
        $part1Color = "red";
} else {
        $part1Color = "black";
}

if ($part2Out < 50) {
        $part2Color = "green";
} elseif ($part2Out >= 50 && $part2Out <= 80) {
        $part2Color = "orange";
} elseif ($part2Out > 79){
        $part2Color = "red";
} else {
        $part2Color = "black";
}

if ($part3Out < 50) {
        $part3Color = "green";
} elseif ($part3Out >= 50 && $part3Out <= 80) {
        $part3Color = "orange";
} elseif ($part3Out > 79){
        $part3Color = "red";
} else {
        $part3Color = "black";
}

if ($part4Out < 50) {
        $part4Color = "green";
} elseif ($part4Out >= 50 && $part4Out <= 80) {
        $part4Color = "orange";
} elseif ($part4Out > 79){
        $part4Color = "red";
} else {
        $part4Color = "black";
}

?>
