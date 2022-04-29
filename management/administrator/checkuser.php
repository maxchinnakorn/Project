<?php
include ('../connect/management.php');
session_start(); 
$check_username = @$_SESSION['username'];
$check_password = trim(@$_SESSION['password']);
$sql = "SELECT * FROM user WHERE username = '$check_username' AND password = '$check_password'"; 
$query = $connect_management->query($sql);
$row = $query->fetch_array();
if(empty($row['username']))
{
	header("location:index.php?warning=5");
}
else
{
	$timestamp = time();
	$time = date('Y-m-d H:i:s');
	$sql_lastlogin = "UPDATE user SET 
	`status_use` = '1',
	`status_lastlogin` = '".$time."' 
	WHERE (`username` = '".$row['username']."')";
	$query_lastlogin = $connect_management->query($sql_lastlogin);
}
?>