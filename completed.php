<?php include 'components/session-check.php' ?>
<?php include 'components/get_posttest.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>Completed- Katindi & Company</title>
	
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

<body class="innercourse course course1">

<div id="myModal" class="modal testcheck"></div>

<div class="pagecont">
	<?php include 'controllers/navigation/first-navigation.php'; ?>
	
	<div class="container12">
		<article>
		<hr />
			<div class="row">
				<div class="col-md-7" >
					<h3>Congratulations!</h3>
						<p>You have successfully completed <b>Thematic area - <?php echo $row1['course_number']; ?></b></p>
						
						<p>Before you proceed to the next thematic area, we would like you to please take time to take this test.</p>
						<p><a class="morebtn" href="test.php?tn=<?php echo $row1['course_number']; ?>&tt=post">Take Test</a></p>
				
				</div>
				<div class="col-md-3 offset-md-2" >
					<?php include 'controllers/navigation/thematic_boxes_sidebar.php'; ?>
				</div>
			</div>
		</article>
	</div>
	
	<div class="container12"><article><hr /></article></div>
	
	<footer>
<?php include 'controllers/base/footer.php'; ?>
</div>
<?php include 'controllers/base/scripts.php'; ?>


</body>
</html>