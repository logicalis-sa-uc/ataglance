<?php
// EDIT THIS FILE TO GET THE RELEVANT PATRITION INFORMATION
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
$homePart = shell_exec($homePartCommand);
$varPart = shell_exec($varPartCommand);
$callrecordingsPart = shell_exec($callrecordingsPartCommand);
$archive2Part = shell_exec($archive2PartCommand);
$totalExtensionsOut = intval(trim($totalExtensions));
$homePartOut = intval(trim($homePart));
$varPartOut = intval(trim($varPart));
$callrecordingsPartOut = intval(trim($callrecordingsPart));
$archive2PartOut = intval(trim($archive2Part));

// PARTITION COMMANDS
$homePartCommand = "df -h | grep /home | awk '{print $4}' | tr -d '%'";
$varPartCommand = "df -h | grep /var | awk '{print $4}' | tr -d '%'";
$callrecordingsPartCommand = "df -h | grep /callrecordings | awk '{print $4}' | tr -d '%'";
$archive2PartCommand = "df -h | grep /archive2 | awk '{print $4}' | tr -d '%'";
// PARTITIONS SPACE
$homePartTotalC = "df -h | grep /home | awk '{print $1}'";
$homePartUsedC = "df -h | grep /home | awk '{print $2}'";
$homePartFreeC = "df -h | grep /home | awk '{print $3}'";
$varPartTotalC = "df -h | grep /var | awk '{print $1}'";
$varPartUsedC = "df -h | grep /var | awk '{print $2}'";
$varPartFreeC = "df -h | grep /var | awk '{print $3}'";
$callrecordingsPartTotalC = "df -h | grep /callrecordings | awk '{print $1}'";
$callrecordingsPartUsedC = "df -h | grep /callrecordings | awk '{print $2}'";
$callrecordingsPartFreeC = "df -h | grep /callrecordings | awk '{print $3}'";
$archivePartTotalC = "df -h | grep /archive2 | awk '{print $1}'";
$archivePartUsedC = "df -h | grep /archive2 | awk '{print $2}'";
$archivePartFreeC = "df -h | grep /archive2 | awk '{print $3}'";
$swapMemTotalC = "free -g | grep Swap | awk '{print $2}'";
$swapMemUsedC = "free -g | grep Swap | awk '{print $3}'";
$swapMemFreeC = "free -g | grep Swap | awk '{print $4}'";
//
$homePart = shell_exec($homePartCommand);
$varPart = shell_exec($varPartCommand);
$callrecordingsPart = shell_exec($callrecordingsPartCommand);
$archive2Part = shell_exec($archive2PartCommand);
// PARTITION SPACE
$homePartTotal = shell_exec($homePartTotalC);
$homePartUsed = shell_exec($homePartUsedC);
$homePartFree = shell_exec($homePartFreeC);
$varPartTotal = shell_exec($varPartTotalC);
$varPartUsed = shell_exec($varPartUsedC);
$varPartFree = shell_exec($varPartFreeC);
$callrecordingsPartTotal = shell_exec($callrecordingsPartTotalC);
$callrecordingsPartUsed = shell_exec($callrecordingsPartUsedC);
$callrecordingsPartFree = shell_exec($callrecordingsPartFreeC);
$archivePartTotal = shell_exec($archivePartTotalC);
$archivePartUsed = shell_exec($archivePartUsedC);
$archivePartFree = shell_exec($archivePartFreeC);
$swapMemTotal = shell_exec($swapMemTotalC);
$swapMemUsed = shell_exec($swapMemUsedC);
$swapMemFree = shell_exec($swapMemFreeC);
$homePartOut = intval(trim($homePart));
$varPartOut = intval(trim($varPart));
$callrecordingsPartOut = intval(trim($callrecordingsPart));
$archive2PartOut = intval(trim($archive2Part));

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
