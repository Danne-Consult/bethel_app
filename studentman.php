<?php header('Content-type: text/html; charset=utf-8'); ?>
<?php include 'components/session-check-mentor.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>Student Manegement - Bethel</title>
	
	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<?php include "controllers/base/head.php" ?>
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