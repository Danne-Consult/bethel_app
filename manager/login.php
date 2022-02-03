<?php include 'controllers/base/head.php' ?>

<body class="login">
<div class="pagecont">
	<header>
		<article>
			<div class="logo"><a href="#"><img src="assets/images/logo.png" /></a></div>
		</article>
	</header>
	
	<div class="container12 loginbody">
		<article>
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<h3 class="aligncenter">Admin Login</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 offset-md-4 " >
					
					<div class="errorbox"></div>
					<form class="contactForm aligncenter loginform" action="components/login-process.php" method="post" name="login" >
						<input type="text" name="username" placeholder="Username" /><br />
						<input type="password" name="passentry" placeholder="Password" /><br />
						<button type="submit" class="submit" name="login_button" >Login</button>
					</form>
				</div>
			</div>
		</article>
	</div>
</div>
</body>
</html>