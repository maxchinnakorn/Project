<?php
include ('connect/management.php');
$username = $_POST['username'];
$password = trim($_POST['password']);
//$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//echo $username.' '.$password;
if(empty($username) || empty($password))
{
	header("location:index.php?warning=1");
}
else
{
	$sql = "SELECT * FROM data_personel WHERE username = '$username'";
	$query = $connect_management->query($sql);
	$row = $query->fetch_array();
	//$total = $query->num_rows;
	$query->close();
	if(empty($row['username']))
	{
		header("location:index.php?warning=2");
	}
	elseif($row['username'] == $username && password_verify($password, $row['password']))
	{
		$timestamp = time();
		$time = date('Y-m-d H:i:s');
		session_start();
		$_SESSION['username'] = $row['username'];
		$_SESSION['password'] = $row['password'];
		$sql_lastlogin = "UPDATE data_personel SET 
			`status_use` = '1',
			`status_lastlogin` = '$time' 
		WHERE (`username` = '".$row['username']."')";
		$query_lastlogin = $connect_management->query($sql_lastlogin);
		header("location:index.php?warning=4");
	}
	else
	{
		header("location:index.php?warning=3");
	}		
}
$connect_management->close();
?>