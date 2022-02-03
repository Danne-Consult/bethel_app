<?php include 'components/session-check.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>Edit Profile - Bethel</title>
	
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet"> 
	<link rel="icon" type="image/png" href="../ico.png"/>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/flexslider.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/slick-theme.css">
	<link rel="stylesheet" href="assets/css/font-awesome.css">
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
			<div class="title"><h3>Edit Profile</h3></div>
		</article>
		</div>
	</div>
	<div class="container12 ">
		<article>
			<?php 
				if($_SESSION['usertype']=='stud'){ 
					include "controllers/form/edit_user_form.php"; 
				}
				if($_SESSION['usertype']=='ment'){
					include "controllers/form/edit_ment_form.php"; 
				}
				?>
		</article>
	</div>
	<div class="container12"><article><hr /></article></div>
	
	<?php include "controllers/base/footer.php"; ?>
	
</div>
<?php include "controllers/base/scripts.php"; ?>

</body>
</html>