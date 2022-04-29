<!DOCTYPE html>
<html>
  <head>
	  <title>Administrator Login</title>
    <!--Made with love by Mutiullah Samim -->
		<!--Bootsrap 4 CDN-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!--Fontawesome CDN-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<!--Custom styles-->
		<link rel="stylesheet" type="text/css" href="styles.css">
		<style type="text/css">
			/* Made with love by Mutiullah Samim*/
		@import url('https://fonts.googleapis.com/css?family=Numans');
		html,body{
		background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
		background-size: cover;
		background-repeat: no-repeat;
		height: 100%;
		font-family: 'Numans', sans-serif;
    text-align: center;
		}
		.container{
		height: 100%;
		align-content: center;
		}
		.card{
		height: 375px;
		margin-top: 100px;
		margin-bottom: auto;
		width: 400px;
		background-color: rgba(0,0,0,0.5) !important;
		}
		.social_icon span{
		font-size: 60px;
		margin-left: 10px;
		color: #FFC312;
		}
		.social_icon span:hover{
		color: white;
		cursor: pointer;
		}
		.card-header h3{
		color: white;
		}
		.social_icon{
		position: absolute;
		right: 20px;
		top: -45px;
		}
		.input-group-prepend span{
		width: 50px;
		background-color: #FFC312;
		color: black;
		border:0 !important;
		}
		input:focus{
		outline: 0 0 0 0  !important;
		box-shadow: 0 0 0 0 !important;
		}
		.remember{
		color: white;
		}
		.remember input
		{
		width: 20px;
		height: 20px;
		margin-left: 15px;
		margin-right: 5px;
		}
		.login_btn_success{
		color: white;
		background-color: #007bff;
		width: 170px;
		}
		.login_btn_danger{
		color: white;
		background-color: #dc3545;
		width: 170px;
		}
		.login_btn_success:hover, .login_btn_danger:hover{
		color: black;
		background-color: white;
		}
		.links{
		color: white;
		}
		.links a{
		margin-left: 4px;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<span class="glyphicon glyphicon-lock"> </span>
						<h3>Administrator Login</h3>
						<!--<div class="d-flex justify-content-end social_icon">
							<a href="https://www.facebook.com/devtai.com2019/?" target="_blank"><span><i class="fab fa-facebook-square"></i></span></a>
							<a href="https://devtai.com/" target="_blank"><span><i class="fab fa-google-plus-square"></i></span></a>
							<a href="https://www.youtube.com/channel/UCeJ1ZmVB969fLWqqbwRZ89Q?" target="_blank"><span><i class="fab fa-twitter-square"></i></span></a>
						</div>-->
					</div>
					<div class="card-body">
<?php
$warning = @$_REQUEST['warning'];
if($warning == 1)
{
	echo '<meta http-equiv="Refresh" content="3;URL=index.php">';
?>	
						<div class="alert alert-danger" role="alert">
							<b>Please enter Username or Password.</b>
						</div>
<?php
}
elseif($warning == 2)
{
	echo '<meta http-equiv="Refresh" content="3;URL=index.php">';
?>
						<div class="alert alert-danger" role="alert">
							<b>This account is not found.</b>
						</div>
<?php
}
elseif($warning == 3)
{
	echo '<meta http-equiv="Refresh" content="3;URL=index.php">';
?>
						<div class="alert alert-danger" role="alert">
							<b>Password is incorrect.</b>
						</div>
<?php
}
elseif($warning == 4)
{
	echo '<meta http-equiv="Refresh" content="3;URL=home.php">';
?>
						<div class="alert alert-success" role="alert">
							<b>Login Successful.</b>
						</div>
<?php
}
elseif($warning == 5)
{
	echo '<meta http-equiv="Refresh" content="3;URL=logout.php">';
?>
						<div class="alert alert-warnin" role="alert">
							<b>Please Login.</b>
						</div>
<?php
}
elseif($warning == 6)
{
	echo '<meta http-equiv="Refresh" content="3;URL=logout.php">';
?>
						<div class="alert alert-success" role="alert">
							<b>Logout Successful, Exit to the system.</b>
						</div>
<?php
}
else
{
?>
						<div class="alert alert-primary" role="alert">
							<b>Welcome to the system.</b>
						</div>
<?php
}
?>
						<form name="formlogin" action="checklogin.php" method="POST" id="login" class="form-horizontal">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" name="username" class="form-control" placeholder="Username">
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<!--<div class="row align-items-center remember">
								<input type="checkbox">Remember Me
							</div>-->
							<div class="form-group">
							  <button type="submit" class="btn login_btn_success"><i class="fas fa-sign-in-alt"></i> Login</button>
							  <a href="../"><button type="button" class="btn login_btn_danger"><i class="fas fa-sign-out-alt"></i> Exit</button></a>
							</div>
							<div class="form-group">
								<font style="color:white;">
								© 2020 by Chinnakorn Boonbumrung<br />
								System by Chinnakorn Boonbumrung
								</font>
							</div>
            			</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>