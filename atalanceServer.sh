#!/bin/bash

# Define Partitions
partition1="/home"
partition2="/var"
partition3="/var/spool/asterisk/monitor"
partition4="/var/spool/voipmonitor"
# Define Commands
cpuUsage=$(top -bn 1 | grep "Cpu(s)" | awk '{print $3}')
memUsage=$(free -m | grep Mem | awk '{print ($3/$2)*100}')
partition1Command=$(df -h | grep $partition1 | awk '{print $4}' | tr -d '%')
partition2Command=$(df -h | grep $partition2 | awk '{print $4}' | tr -d '%')
partition3Command=$(df -h | grep $partition3 | awk '{print $4}' | tr -d '%')
partition4Command=$(df -h | grep $partition4 | awk '{print $4}' | tr -d '%')
date_time=$(date +"%Y-%m-%d %H:%M:%S")a

#DB Connection
db_host="localhost"
db_name="ataglance"
db_user="ataglance"
db_password="Hornet2023"

# MySQL Query
mysql_query="INSERT INTO server_info (timestamp, cpuUsage, memUsage, partition1, partition2, partition3, partition4) VALUES ('$date_time', '$cpuUsage', '$memUsage', '$partition1Command', '$partition2Command', '$partition3Command', '$partition4Command');"

# MySQL Run
mysql -h "$db_host" -u "$db_user" -p"$db_password" "$db_name" -e "$mysql_query"
