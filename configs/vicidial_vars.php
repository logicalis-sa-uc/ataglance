<?php
// SERVICES
$httpdCommand = "cat /var/www/html/ataglance/info/httpdstatus.info";
$AST_VdadaptCommand = "screen -ls | grep -i AST_Vdadapt | wc -l";
$ASTVDremoteCommand = "screen -ls | grep -i ASTVDremote | wc -l";
$ASTupdateCommand = "screen -ls | grep -i ASTupdate | wc -l";
$ASTVDadaptCommand = "screen -ls | grep -i ASTVDadapt | wc -l";
$ASTVDautoCommand =  "screen -ls | grep -i ASTVDauto | wc -l";
$ASTVDadFILLCommand =  "screen -ls | grep -i ASTVDadFILL | wc -l";
$ASTlistenCommand =  "screen -ls | grep -i ASTlisten | wc -l";

$httpdOut = shell_exec($httpdCommand);
if ($httpdOut > 0) {
  $httpdRunning = "Running...";
} else {
  $httpdRunning = "Stopped...";
}
$AST_VdadaptOut = shell_exec($AST_VdadaptCommand);
if ($AST_VadaptOut > 0) {
  $AST_VdadaptRunning = "Running...";
} else {
  $AST_VdadaptRunning = "Stopped...";
}
$ASTVDremoteOut = shell_exec($ASTVDremoteCommand);
if ($ASTVDremoteOut > 0) {
  $ASTVDremoteRunning = "Running...";
} else {
  $ASTVDremoteRunning = "Stopped...";
}
$ASTupdateOut = shell_exec($ASTupdateCommand);
if ($ASTupdateOut > 0) {
  $ASTupdateRunning = "Running...";
} else {
  $ASTupdateRunning = "Stopped...";
}
$ASTVDadaptOut = shell_exec($ASTVDadaptCommand);
if ($ASTVDadaptOut > 0) {
  $ASTVDadaptRunning = "Running...";
} else {
  $ASTVDadaptRunning = "Stopped...";
}
$ASTVDautoOut = shell_exec($ASTVDautoCommand);
if ($ASTVDautoOut > 0) {
  $ASTVDautoRunning = "Running...";
} else {
  $ASTVDautoRunning = "Stopped...";
}
$ASTVDadFILLOut = shell_exec($ASTVDadFILLCommand);
if ($ASTVDadFILLOut > 0) {
  $ASTVDadFILLRunning = "Running...";
} else {
  $ASTVDadFILLRunning = "Stopped...";
}
$ASTlistenOut = shell_exec($ASTlistenCommand);
if ($ASTlistenOut > 0) {
  $ASTlistenRunning = "Running...";
} else {
  $ASTlistenRunning = "Stopped...";
}
?>
