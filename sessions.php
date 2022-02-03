<?php include 'components/session-check.php' ?>
<?php include 'components/get_course.php' ?>
<?php include 'controllers/tests/gettest.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>Sessions- Bethel</title>
	
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
		<link rel="stylesheet" href="assets/css/flexslider.css">
		<link rel="stylesheet" href="assets/css/menuscript.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<script src="assets/js/jquery.min.js"></script>
</head>


<body class="inner">

<div id="myModal" class="modal testcheck"></div>

<div class="pagecont">
	<?php include 'controllers/navigation/first-navigation.php'; ?>
		
	<div class="container12 banner">
		<div class="bannerimg" style="background: url(assets/images/img2.jpg) no-repeat fixed center; background-size:cover;">
			<article>
				<div class="title">
				<h3>Sessions</h3>
			</div>
			</article>
		</div>
	</div>
	
	<?php include 'controllers/navigation/thematic_boxes_inner.php'; ?>
	
	<div class="container12"><article><hr /></article></div>
	
	
<?php include 'controllers/base/footer.php'; ?>
</div>
<?php include 'controllers/base/scripts.php'; ?>

<script>
	$(document).ready(function(){
		$("form .submit").click(function(){
			event.preventDefault();
			alert($(this).closest("form").serialize());
		});	
	});
</script>


</body>
</html>