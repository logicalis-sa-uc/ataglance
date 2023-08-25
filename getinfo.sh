#!/bin/bash

# Get the info
#Server
# CPU Usage
top -bn 1 | grep "Cpu(s)" | awk '{print $2 + $4}' > /var/www/html/ataglance/info/cpu_usage.info
# Memory Usage
free -m | grep Mem | awk '{print ($3/$2)*100}' > /var/www/html/ataglance/info/memory_usage.info
#Get SSL Cert Information
openssl s_client -connect example.com:443 | openssl x509 -noout -dates > /var/www/html/ataglance/info/sslcert.info
# Swap Memory Percentage
free -m | grep Swap | awk '{printf "%.1f\n", ($3/$2)*100}' > /var/www/html/ataglance/info/swapmempercentage.info
#
# Services
# HTTPD Status
netstat -tnlup | grep httpd | wc -l > /var/www/html/ataglance/info/httpdstatus.info
# Asterisk Status
netstat -tnlup | grep asterisk | wc -l > /var/www/html/ataglance/info/asteriskstatus.info
# MySQL Status
netstat -tnlup | grep mysqld | wc -l > /var/www/html/ataglance/info/mysqldstatus.info
# NTPD Status
netstat -tnlup | grep ntpd | wc -l > /var/www/html/ataglance/info/ntpddstatus.info
# Queuemetrics Check
ps -ef | grep qm-tomcat | wc -l > /var/www/html/ataglance/info/qmstatus.info
# Qloader Check
ps -ef | grep qloader | wc -l > /var/www/html/ataglance/info/qloaderstatus.info
# Uniloader Check
ps -ef | grep uniloader | wc -l > /var/www/html/ataglance/info/uniloaderstatus.info
#Get Kamailio Status
ps -ef | grep kamailio | wc -l > /var/www/html/ataglance/info/kamailio.info
#
# Astereisk Checks
# Extensions
/usr/sbin/asterisk -rx 'sip show peers' | grep -E "([0-9]+/+[0-9])" | wc -l > /var/www/html/ataglance/info/extensionstotal.info
# Trunks
/usr/sbin/asterisk -rx 'sip show peers' | grep '^[A-Za-z]' | wc -l > /var/www/html/ataglance/info/trunkstotal.info
# Concurrent Calls
/usr/sbin/asterisk -rx 'core show channels' | grep 'active calls' | awk '{print $1}' > /var/www/html/ataglance/info/concurrentcallstotal.info
# Total Extensions
/usr/sbin/asterisk -rx 'sip show peers' | grep -E "([0-9]+/+[0-9])" | wc -l > /var/www/html/ataglance/info/totalextensions.info
# Online Extensions
/usr/sbin/asterisk -rx 'sip show peers' | grep -E "([0-9]+/+[0-9])" | grep "OK" | wc -l > /var/www/html/ataglance/info/onlineextensions.info
# Offline Extensions
/usr/sbin/asterisk -rx 'sip show peers' | grep -E "([0-9]+/+[0-9])" | grep "UN" | wc -l > /var/www/html/ataglance/info/offlineextensions.info
# Total Trunks
/usr/sbin/asterisk -rx 'sip show peers' | grep '^[A-Za-z]' | grep -E 'OK|Unmonitored|UN' | wc -l > /var/www/html/ataglance/info/totaltrunks.info
# Online Trunks
/usr/sbin/asterisk -rx 'sip show peers' | grep '^[A-Za-z]' | grep -E 'OK|Unmonitored' | wc -l > /var/www/html/ataglance/info/onlinetrunks.info
# Offline Trunks
/usr/sbin/asterisk -rx 'sip show peers' | grep '^[A-Za-z]' | grep 'UN' | wc -l > /var/www/html/ataglance/info/offlinetrunks.info
# Total Queues
/usr/sbin/asterisk -rx 'queue show' | grep 'max' | wc -l > /var/www/html/ataglance/info/totalqueues.info
# Online Agents
/usr/sbin/asterisk -rx 'queue show' | grep 'Not in use' | wc -l > /var/www/html/ataglance/info/onlinequeues.info
# Offline Agents
/usr/sbin/asterisk -rx 'queue show' | grep 'Unavailable' | wc -l > /var/www/html/ataglance/info/offlinequeues.info
# Long Calls
/usr/sbin/asterisk -rx "core show channels verbose" | awk '$8 ~ /01:..:../ || $9 ~ /01:..:../ || $10 ~ /01:..:../' | wc -l > /var/www/html/ataglance/info/longcalls.info
