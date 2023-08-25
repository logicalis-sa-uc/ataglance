#!/bin/bash

# Extensions
totalExtensions=$(/usr/sbin/asterisk -rx 'sip show peers' | grep -E "([0-9]+/+[0-9])" | wc -l)
onlineExtensions=$(/usr/sbin/asterisk -rx 'sip show peers' | grep 'OK' | grep -E "([0-9]+/+[0-9])" | wc -l)
offlineExtensions=$(/usr/sbin/asterisk -rx 'sip show peers' | grep 'UN' | grep -E "([0-9]+/+[0-9])" | wc -l)
# Queues
totalQueues=$(/usr/sbin/asterisk -rx 'queue show' | grep 'max' | wc -l)
onlineQueues=$(/usr/sbin/asterisk -rx 'queue show' | grep 'Not in use' | wc -l)
offlineQueues=$(/usr/sbin/asterisk -rx 'queue show' | grep 'Unavailable' | wc -l)
# Trunks
totalTrunks=$(/usr/sbin/asterisk -rx 'sip show peers' | grep '^[A-Za-z]' | grep -E 'OK|Unmonitored|UN' | wc -l)
onlineTrunks=$(/usr/sbin/asterisk -rx 'sip show peers' | grep '^[A-Za-z]' | grep -E 'OK|Unmonitored' | wc -l)
offlineTrunks=$(/usr/sbin/asterisk -rx 'sip show peers' | grep 'UN' | grep '^[A-Za-z]' | wc -l)
# Calls Stats
concurrentCalls=$(/usr/sbin/asterisk -rx 'core show channels' | grep 'active calls' | awk '{print $1}')
longCalls=$(/usr/sbin/asterisk -rx 'core show channels verbose' | awk '$8 ~ /01:..:../ || $9 ~ /01:..:../ || $10 ~ /01:..:../' | wc -l)
# Timestamp
date_time=$(date +"%Y-%m-%d %H:%M:%S")

#DB Connection
db_host="localhost"
db_name="ataglance"
db_user="ataglance"
db_password="Hornet2023"

# MySQL Query
mysql_query="INSERT INTO asterisk_info (timestamp, totalExtensios, onlineExtensios, offlineExtensios, totalQueues, onlineQueues, offlineQueues, totalTrunks, onlineTrunks, offlineTrunks, concurrentCalls, longCalls) VALUES ('$date_time', '$totalExtensions', '$onlineExtensions', '$offlineExtensions', '$totalQueues', '$onlineQueues', '$offlineQueues', '$totalTrunks', '$onlineTrunks', '$offlineTrunks', '$concurrentCalls', '$longCalls');"

# MySQL Run
mysql -h "$db_host" -u "$db_user" -p"$db_password" "$db_name" -e "$mysql_query"

