<?php

$hostname="localhost";
$user="np.web";
$password="2wsx.369*";
$dbname="vocasmss";
$system_office_code="1173100048";     //รหัสสถานศึกษา
mysql_connect($hostname,$user,$password) or die("Could not connect MySql");
mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_query("SET NAMES UTF8");

?> 