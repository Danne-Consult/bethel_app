<?php 
session_start();
if(isset($_SESSION['usercode'])){
	header('location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>Login : Bethel</title>
		
		<meta name="keywords" content="" />
		<meta name="description" content="" />

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<?php include "controllers/base/head.php" ?>
</head>

<body class="login">

	<div class="whitebg">
	<div class="logobx">
        <a href="index.php"><img src="assets/images/logo.png" alt="Bethel"></a>
    </div>
	
	<div class="loginbox">
		<h3 class="aligncenter">Login</h3><br />
		<?php
			if(isset($_GET['error'])){
				echo "<div class='error-red'>". $_GET['error'] ."</div>";
			}
		?>
		<form class="contactForm aligncenter loginform" action="components/login-process.php" method="post" name="login" >
			<label>Email</label><br />
			<input type="email" name="username" required /><br />
			<label>Password</label><br />
			<input type="password" name="passentry" required /><br />
			
			<button type="submit" name="login_btn" class="submit" >Login</button><br /></br >
			<a href="register.php?fmt=stud">Don't have an account?</a>
		</form>
	</div>
	</div>
	<div class="slogan">
		<i>Transforming Lives</i>
	</div>
</body>
</html>