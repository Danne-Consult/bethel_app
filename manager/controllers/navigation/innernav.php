<?php 
	$sqluder = "SELECT username FROM ".$prefix."manager_users WHERE id='$userid'";
	$result =  $conn->query($sqluder) or die(mysqli_error($conn));
	$rws =  $result->fetch_array();
 ?>

<header>
		<article>
			<div class="navholder">
				<div class="logo"><a href="#"><img src="assets/images/logo.png" /></a></div>
				<div class="navigation">
					<div class="topnav">
						<ul class="mainlinks">
							<li>Welcome <?php echo $rws["username"]; ?></li>
							<li><a href="components/logout.php">Logout</a></li>
						</ul>
					</div>
					<nav id="cssmenu">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="register-mentor.php">Mentor Management</a></li>
							<li><a href="register-user.php">Student Management</a></li>
							<li><a href="create-course.php">Sessions</a></li>
							<li><a href="tests.php">Tests and Questions</a></li>
							
						</ul>
					</nav>
				</div>
			</div>
		</article>
	</header>
	<div class="container12"><article><hr /></article></div>