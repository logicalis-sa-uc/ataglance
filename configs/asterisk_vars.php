<?php
// DB Connection
require "../configs/config1.php";
//Variable Commands
$totalExtensionsCommand = "cat /var/www/html/ataglance/info/totalextensions.info";
$onlineExtensionsCommand = "cat /var/www/html/ataglance/info/onlineextensions.info";
$offlineExtensionsCommand = "cat /var/www/html/ataglance/info/offlineextensions.info";
$totalQueuesCommand = "cat /var/www/html/ataglance/info/totalqueues.info";
$onlineQueuesCommand = "cat /var/www/html/ataglance/info/onlinequeues.info";
$offlineQueuesCommand = "cat /var/www/html/ataglance/info/offlinequeues.info";
$totalTrunksCommand = "cat /var/www/html/ataglance/info/totaltrunks.info";
$onlineTrunksCommand = "cat /var/www/html/ataglance/info/onlinetrunks.info";
$offlineTrunksCommand = "cat /var/www/html/ataglance/info/offlinetrunks.info";
$concurrentCallsCommand = "cat /var/www/html/ataglance/info/concurrentcallstotal.info";
$longCallsCommand = "cat /var/www/html/ataglance/info/longcalls.info";

// Execute for variablers
$totalExtensions = shell_exec($totalExtensionsCommand);
$onlineExtensions = shell_exec($onlineExtensionsCommand);
$offlineExtensions = shell_exec($offlineExtensionsCommand);
$totalQueues = shell_exec($totalQueuesCommand);
$onlineQueues = shell_exec($onlineQueuesCommand);
$offlineQueues = shell_exec($offlineQueuesCommand);
$totalTrunks = shell_exec($totalTrunksCommand);
$onlineTrunks = shell_exec($onlineTrunksCommand);
$offlineTrunks = shell_exec($offlineTrunksCommand);
//
$concurrentCallsInfo = shell_exec($concurrentCallsCommand);
$longCalls = shell_exec($longCallsCommand);
?>


