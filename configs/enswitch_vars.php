<?php
// SERVICES
$nginxCommand = "netstat -tnlup | grep nginx | wc -l";
$rpcbindCommand = "netstat -tnlup | grep rpcbind | wc -l";
$enswitch_rout = "netstat -tnlup | grep enswitch_rout | wc -l";
$enswitch_messa = "netstat -tnlup | grep enswitch_messa | wc -l";
$enswitch_sipd = "netstat -tnlup | grep enswitch_sipd | wc -l";
$rtpengineCommand = "pgrep -x rtpengine | wc -l";
//
$nginxOut = shell_exec($nginxCommand);
$rpcbindOut = shell_exec($rpcbindCommand);
$enswitch_routOut = shell_exec($enswitch_rout);
$enswitch_messaOut = shell_exec($enswitch_messa);
$enswitch_sipdOut = shell_exec($enswitch_sipd);
$rtpengineOut = shell_exec($rtpengineCommand);
//
if ($nginxOut > 0) {
  $nginxRunning = "Running...";
} else {
  $nginxRunning = "Stopped...";
}
if ($rpcbindOut > 0) {
  $rpcbindRunning = "Running...";
} else {
  $rpcbindRunning = "Stopped...";
}
if ($enswitch_routOut > 0) {
    $enswitchroutRunning = "Running...";
  } else {
    $enswitchroutRunning = "Stopped...";
}
if ($enswitch_messaOut > 0) {
    $enswitchmessaRunning = "Running...";
  } else {
    $enswitchmessaRunning = "Stopped...";
}
if ($enswitch_sipdOut > 0) {
    $enswitchsipdRunning = "Running...";
  } else {
    $enswitchsipdRunning = "Stopped...";
}
if ($rtpengineOut > 1) {
    $rtpengineRunning = "Running...";
  } else {
    $rtpengineRunning = "Stopped...";
}
?>

