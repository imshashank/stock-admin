<?php
$mysql_db_hostname = "localhost";
$mysql_db_user = "companies";
$mysql_db_password = "stockleap";
$mysql_db_database = "companies";

$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysql_select_db($mysql_db_database, $con) or die("Could not select database");
?>
