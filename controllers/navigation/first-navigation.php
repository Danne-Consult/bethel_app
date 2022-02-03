<?php

	if($_SESSION['usertype']=='stud'){
		 $sqlnav = "SELECT * FROM ".$prefix."user WHERE usercode='$current_user'";
	 }
    if($_SESSION['usertype']=='ment'){
		 $sqlnav = "SELECT * FROM ".$prefix."mentor WHERE usercode='$current_user'";
	}
    $result = mysqli_query($conn,$sqlnav);
	$row = mysqli_fetch_array($result);
	
?>
    <!-- Navbar1 -->

	<header>
	<article>
		<div class="lightbg">
			<div class="logo"><a href=""><img src="assets/images/logo.png" /></a></div>
			<div class="logopartner"><img src="assets/images/always_pg.jpg" /></div>
			<div class="navigation">
				<div class="topnav">
				<?php if($_SESSION['usertype']=='stud'){ ?>
					<ul class="mainlinks">
						<li><div class="profilepicsmall" style="background:url(userfiles/avatars/<?php echo $row['avatar']; ?>) no-repeat center; background-size:cover;"></div>
						<li><span>Welcome Back <b><?php echo $row['username']; ?></b></span></li>
						<li><a href="my-profile.php">My Profile</a></li>
						<li><a href="components/logout.php">Logout</a></li>
					</ul>
				<?php } ?>
				
				<?php if($_SESSION['usertype']=='ment'){ ?>
					<ul class="mainlinks">
						<li><div class="profilepicsmall" style="background:url(userfiles/avatars/<?php echo $row['avatar']; ?>) no-repeat center; background-size:cover;"></div>
						<li><span>Welcome Back <b><?php echo $row['username']; ?></b></span></li>
						<li><a href="my-profile.php">My Profile</a></li>
						<li><a href="studentman.php">Students Management</a></li>
						<li><a href="components/logout.php">Logout</a></li>
					</ul>
				<?php } ?>
				
				</div>
				<nav id="cssmenu">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="sessions.php">sessions</a></li>
						<li><a href="#">FAQs</a></li>
					</ul>
				</nav>
			</div>
			<div style="clear:both;"></div>
		</div>
	</article>
</header>
	
<!-- ./Navbar1 -->
