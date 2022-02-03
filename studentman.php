<?php include 'components/session-check-mentor.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>Student Manegement - Bethel</title>
	
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


<body class="fixhead">
<div class="pagecont">
	<?php include 'controllers/navigation/first-navigation.php'; ?>
	<div class="container12">
		<article>
			<h3>Student Management</h3>
		</article>
	</div>
	<div class="container12 studman">
		<article>
			<div class="quickmen">
				<ul>
					<li><a href="mentor/dashboard.php" target="workframe" >Dashboard</a></li>
					<li><a href="mentor/students.php" target="workframe">Students</a></li>
					<li><a href="mentor/schools.php" target="workframe">Schools/Institutions</a></li>
					<li><a href="mentor/tests.php" target="workframe">Tests and Assignments</a></li>
					<li><a href="mentor/communication.php" target="workframe">Communication</a></li>
				</ul>
			</div>
			<div class="workarea">
				<iframe name="workframe" src="mentor/dashboard.php" class="workframe" scrolling="auto" frameborder="0"></iframe>
			</div>
		</article>
	</div>
		

	<?php include 'controllers/base/footer.php'; ?>

</div>
</body>
</html>