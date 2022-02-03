<?php require '../manager/config/_database/database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<link rel="stylesheet" href="../assets/css/flexslider.css">
	<link rel="stylesheet" href="../assets/css/menuscript.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<script src="../assets/js/jquery.min.js"></script>
</head>


<body class="inner">

	<div class="container12">
		<article>
			<h4>Add School</h4>
			<form class="contactForm" action="components/schoolsreg.php" method="post" name="login" >
	
			<div class="row">
				<div class="col-md-6">
					<label for="namex">School Name</label>
					<input type="text" name="schoolnamex" placeholder="name" required />
				</div>
				
			</div>
			
			<hr />
			
			<div class="row">
				<div class="col-md-6 ">
					<p>&nbsp;</p>
					<button type="submit" name="regschool" class="submit">Add School</button>
				</div>
			</div>
		</form>
		</article>
	</div>
		
	
</div>
</body>
</html>