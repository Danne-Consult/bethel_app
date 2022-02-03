<?php include 'components/session-check.php' ?>
<?php include 'components/get_assignment.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>Course Assignment - Katindi & Company</title>
	
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<link rel="stylesheet" href="assets/css/menuscript.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="assets/js/jquery.min.js"></script>
</head>

<body class="innercourse course course1">

<div id="myModal" class="modal testcheck"></div>
<div id="modalwarn" class="modal aligncenter"><h3 class="aligncenter">Note!</h3><p>All work submitted in this forum shall constitute original works and all content from any publication. Journal, research paper or report shall be referenced accordingly. Plagerism shall not be accepted </p><br /><p><a class="morebtn" href="#" rel="modal:close">Proceed</a></p></div>

<div class="pagecont">
<?php include 'controllers/navigation/first-navigation.php'; ?>
	
	<div class="container12 banner">
		<article>
			<div class="bantitle" style="background: url(assets/images/img3.jpg) no-repeat fixed center; background-size:cover;">
				<h3>Course Assignment</h3>
			</div>
		</article>
	</div>
	<div class="container12 aboutproject">
		<article>
			<div class="row">
				<div class="col-md-7" >
					<h4>Brief</h4>

					<?php if(!$rowass['assignment_questions']==""){ echo $rowass['assignment_questions']; } ?>
					<hr />
					
					<h3>Submit Assignment</h3>
					<?php include 'controllers/form/upload-form.php'; ?>
				</div>
			</div>
		</article>
	</div>
	
	<div class="container12"><article><hr /></article></div>
	
	<footer>
<?php include 'controllers/base/footer.php'; ?>
</div>
<?php include 'controllers/base/scripts.php'; ?>
<?php include 'controllers/base/course-scripts.php'; ?>
<?php include 'controllers/base/assignments-scripts.php'; ?>

</body>
</html>