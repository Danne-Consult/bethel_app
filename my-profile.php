<?php include 'components/session-check.php' ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>Always Keeping Girls in School - Bethel</title>
		
		<meta name="keywords" content="" />
		<meta name="description" content="" />

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
		<meta property ="og:site_name" content="" />
		<meta property="og:url" content="" />
		<meta property="og:image" content="" />
		<meta property="og:type" content="website" />
		<meta property="og:description" content="" />
	
		<meta property ="twitter:title" content="" />
		<meta property ="twitter:description" content="" />
		<meta property ="twitter:url" content="" />
		<meta property ="twitter:image" content="" />

		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
		<link rel="icon" type="image/ico" href="assets/images/icon.png"/>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
		<link rel="stylesheet" href="assets/css/flexslider.css">
		<link rel="stylesheet" href="assets/css/menuscript.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<script src="assets/js/jquery.min.js"></script>
</head>

<body class="inner">
<div class="pagecont">
<?php include 'controllers/navigation/first-navigation.php'; ?>
	
	<div class="container12 banner">
		<div class="bannerimg" style="background: url(assets/images/img2.jpg) no-repeat fixed center; background-size:cover;">
		<article>
			<div class="title"><h3>My Profile</h3></div>
		</article>
		</div>
	</div>
	<div class="container12 aboutproject">
		<article>
			<div class="row">
			<div class="col-md-4">
					<div class="">
						<div class="profilepic" style="background:url(userfiles/avatars/<?php echo $row['avatar']; ?>) no-repeat center; background-size:cover;"><div class="level"><p class="aligncenter"><span class="levelon"><?php echo $row['levelon']; ?></span></p></div>
						</div>
						
					</div>
				</div>
				<div class="col-md-8" >
				<h3>About Me</h3>
				<p><b>Words that describe me:</b> <?php echo $row['aboutme']; ?> - <a title="edit" href="update-profile.php"><i class='fa fa-edit' aria-hidden='true'></i></a></p>
				
				<?php if($_SESSION['usertype']=='stud'){ ?>
				<h3>Achievements</h3>
					<?php
						$sqlscore = "SELECT * FROM ".$prefix."achievements WHERE userid='$current_user'";
						$resultx = mysqli_query($conn,$sqlscore);
						$rowscore = mysqli_fetch_array($resultx);
						if (!$rowscore['lastscore']==""){
							echo $rowscore['lastscore'];
						}else{
							echo "<p><b>No levels completed</b></p>";
						}
					?>
				<?php }?>
				
				<p class=""><a href="update-profile.php" class="morebtn">Update Profile</a></p>
			</div>
		</article>
	</div>
	
	<div class="container12"><article><hr /></article></div>
	
	<?php include "controllers/base/footer.php"; ?>
	
</div>
<?php include 'controllers/base/scripts.php'; ?>

</body>
</html>