<?php
$database_hostname = 'localhost';
$database_username = 'root'; 
$database_password = '';
$database_databasename = 'management';
$connect_management = new mysqli($database_hostname, $database_username, $database_password, $database_databasename);
date_default_timezone_set('Asia/Bangkok');
putenv('TZ=Asia/Bangkok');
//$connect_management->set_charset('utf8');

//define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', '');
//define('DB_NAME', 'management');
//$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) or die('Lost connection to Host');
//date_default_timezone_set('Asia/Bangkok');
//putenv('TZ=Asia/Bangkok');
?>