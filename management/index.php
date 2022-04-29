<!DOCTYPE html>
<html lang="en">
<head>
	<title>NP Management System</title>
	<link href="assets/images/nplogoicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/images/nplogo.jpg" alt="IMG">
				</div>
				<form class="login100-form validate-form" action="checklogin.php" method="post">
					<span class="login100-form-title">MANAGEMENT SYSTEM</span>
					<div class="wrap-input100 validate-input" data-validate="Username is required.">
						<input name="username" type="text" class="input100" placeholder="Username" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required.">
						<input name="password" type="password" class="input100" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
<?php
$warning = @$_REQUEST['warning'];
if($warning == 1)
{
	echo '<meta http-equiv="Refresh" content="3;URL=index.php">';
?>
					<div class="text-center p-t-95">
						<div class="alert alert-warning" role="alert">
							<b>Please enter<br />Username or Password.</b>
						</div>
					</div>
<?php
}
elseif($warning == 2)
{
	echo '<meta http-equiv="Refresh" content="3;URL=index.php">';
?>
					<div class="text-center p-t-95">
						<div class="alert alert-danger" role="alert">
							<b>This account is not found<br />in the system.</b>
						</div>
					</div>
<?php
}
elseif($warning == 3)
{
	echo '<meta http-equiv="Refresh" content="3;URL=index.php">';
?>
					<div class="text-center p-t-95">
						<div class="alert alert-danger" role="alert">
							<b>Login Unsccessful,<br />Password is incorrect.</b>
						</div>
					</div>
<?php
}
elseif($warning == 4)
{
	echo '<meta http-equiv="Refresh" content="3;URL=home.php">';
?>
					<div class="text-center p-t-95">
						<div class="alert alert-success" role="alert">
							<b>Login Successful,<br />Welcome to the system.</b>
						</div>
					</div>
<?php
}
elseif($warning == 5)
{
	echo '<meta http-equiv="Refresh" content="3;URL=logout.php">';
?>
					<div class="text-center p-t-95">
						<div class="alert alert-warning" role="alert">
							<b>Please Login.</b>
						</div>
					</div>
<?php
}
elseif($warning == 6)
{
	echo '<meta http-equiv="Refresh" content="3;URL=logout.php">';
?>
					<div class="text-center p-t-95">
						<div class="alert alert-success" role="alert">
							<b>Logout Successful,<br />Exit to the system.</b>
						</div>
					</div>
<?php
}
else
{
?>
					<div class="text-center p-t-136">
						<a href="administrator"><p>For Administrator Login</p></a>
                        <p>&nbsp;</p>
					</div>
<?php
}
?>
					<!--<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>-->
				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>
</body>
</html>