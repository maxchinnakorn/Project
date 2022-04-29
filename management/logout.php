<script type="text/javascript">
	windowloation:
	function noBack(){
		window.history.forward()
	}

	noBack();
	window.onload = noBack;
	window.onpageshow = function(evt) { if (evt.persisted) noBack() }
	window.onunload = function() { void (0) }
</script>
<?php
$username = $_SESSION['username'];
$password = $_SESSION['password'];
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
		`status_use` = '0',
		`status_lastlogin` = '$time' 
	WHERE (`username` = '".$row['username']."')";
	$query_lastlogin = $connect_management->query($sql_lastlogin);
	session_start();
	session_destroy();
	header("location:index.php?warning=6");
}
else
{
	header("location:index.php?warning=3");
}		
?>