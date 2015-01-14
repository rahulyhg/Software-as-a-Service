#!/bin/bash
chmod 755 /opt/lampp/etc/my.cnf
chmod -R 777 /opt/lampp/var/mysql
chown -hR root /opt/lampp

/opt/lampp/lampp $1 
