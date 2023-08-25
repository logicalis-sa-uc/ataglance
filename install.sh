#!/bin/bash

# Prompt the user for MySQL username, password, and database IP address
read -p "Enter MySQL root username: " db_username
read -sp "Enter MySQL root password: " db_password
read -p "Enter db IP address: " db_ip
echo
read -p "Enter server IP address(127.0.0.1 if it is the same server): " server_ip

# Install MySQL Server
sudo apt-get update
sudo apt-get install mysql-server

# Log in to MySQL as root (you may need to provide the root password)
sudo mysql -h$db_ip -u$db_username -p$db_password <<MYSQL_SCRIPT
CREATE DATABASE ataglance;
CREATE TABLE \`asterisk_info\` (
  \`id\` int(11) NOT NULL AUTO_INCREMENT,
  \`timestamp\` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  \`totalExtensios\` varchar(50) NOT NULL,
  \`onlineExtensios\` varchar(50) NOT NULL,
  \`offlineExtensios\` varchar(50) NOT NULL,
  \`totalQueues\` varchar(50) NOT NULL,
  \`onlineQueues\` varchar(50) NOT NULL,
  \`offlineQueues\` varchar(50) NOT NULL,
  \`totalTrunks\` varchar(50) NOT NULL,
  \`onlineTrunks\` varchar(50) NOT NULL,
  \`offlineTrunks\` varchar(50) NOT NULL,
  \`concurrentCalls\` varchar(50) NOT NULL,
  \`longCalls\` varchar(50) NOT NULL,
  PRIMARY KEY (\`id\`)
) ENGINE=InnoDB AUTO_INCREMENT=49287 DEFAULT CHARSET=latin1;

CREATE TABLE \`lsa_services\` (
  \`overview\` tinyint(1) NOT NULL,
  \`server\` tinyint(1) NOT NULL,
  \`asterisk\` tinyint(1) NOT NULL,
  \`freepbx\` tinyint(1) NOT NULL,
  \`queuemetrics\` tinyint(1) NOT NULL,
  \`vicidial\` tinyint(1) NOT NULL,
  \`motion\` tinyint(1) NOT NULL,
  \`enswitch\` tinyint(1) NOT NULL,
  \`mysql\` tinyint(1) NOT NULL,
  \`commands\` tinyint(1) NOT NULL,
  \`cdrs\` tinyint(1) NOT NULL,
  \`settings\` tinyint(1) NOT NULL,
  \`kamailio\` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE \`server_info\` (
  \`id\` int(11) NOT NULL AUTO_INCREMENT,
  \`timestamp\` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  \`cpuUsage\` decimal(5,2) NOT NULL,
  \`memUsage\` decimal(5,2) NOT NULL,
  \`partition1\` decimal(5,2) NOT NULL,
  \`partition2\` decimal(5,2) NOT NULL,
  \`partition3\` decimal(5,2) NOT NULL,
  \`partition4\` decimal(5,2) NOT NULL,
  PRIMARY KEY (\`id\`)
) ENGINE=InnoDB AUTO_INCREMENT=49703 DEFAULT CHARSET=latin1;

INSERT INTO lsa_services (overview, server, asterisk, freepbx, queuemetrics, vicidial, motion, enswitch, mysql, commands, cdrs, settings, kamailio) VALUES ('1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0');
INSERT INTO lsa_users (userName, userPassword, email, DepartmentAccess, DisplayMode) VALUES ('admin', 'b4426ce902b3f739860ac777447b4818', 'support@za.logicalis.com', 'admin', '1');

CREATE USER 'ataglance'@'$server_ip' IDENTIFIED BY 'Hornet2023';
GRANT ALL PRIVILEGES ON ataglance.* TO 'ataglance'@'$server_ip';
GRANT ALL PRIVILEGES ON astguiclient.* TO 'ataglance'@'$server_ip';
GRANT ALL PRIVILEGES ON asteriskcdrdb.* TO 'ataglance'@'$server_ip';
FLUSH PRIVILEGES;
MYSQL_SCRIPT