<?php include 'components/session-check.php' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>Units : Bethel</title>
		
		<meta name="keywords" content="" />
		<meta name="description" content="" />

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<?php include "controllers/base/head.php" ?>
</head>


<body class="inner">

<div id="myModal" class="modal testcheck"></div>

<div class="pagecont">
	<?php include 'controllers/navigation/first-navigation.php'; ?>
		
	<div class="container12 banner">
		<div class="bannerimg" style="background: url(assets/images/img2.jpg) no-repeat fixed center; background-size:cover;">
			<article>
				<div class="title">
				<h3>Units</h3>
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