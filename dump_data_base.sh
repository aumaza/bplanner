#!/bin/bash
fecha=`date +%d-%m-%Y`
archivo="sqls/dumps/bplanner-$fecha.sql"
mysqldump --user=root --password=slack142 --host=slackzone.ddns.net bplanner > $archivo
#mysqldump --user=root --password=slack142 --host=localhost bplanner > $archivo
chmod 777 $archivo



