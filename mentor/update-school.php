<?php require '../manager/config/_database/database.php'; 
	$schooid = $_GET["schoolid"];
	$sql1="SELECT * FROM ".$prefix."schools WHERE id='$schooid'";
	$result =  $conn->query($sql1);
	$rws = $result->fetch_array();
?>

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
			<h4>Update School</h4>
			<?php
				if(isset($_GET['error'])){
					echo "<div class='error-red'>". $_GET['error'] ."</div>";
				}
				if(isset($_GET['success'])){
					echo "<div class='success-green'>". $_GET['success'] ."</div>";
				}
			?>
			<form class="contactForm" action="components/updateschool.php" method="post" name="login" >
	
			<div class="row">
				<div class="col-md-6">
					<label for="namex">School Name</label>
					<input type="hidden" name="schoolid" value="<?php echo $rws['id']; ?>" />
					<input type="text" name="schoolnamex" placeholder="name" value="<?php echo $rws['schoolname']; ?>" required />
				</div>
				
			</div>
			
			<hr />
			
			<div class="row">
				<div class="col-md-6 ">
					<p>&nbsp;</p>
					<button type="submit" name="updateschool" class="submit">Update School</button>
				</div>
			</div>
		</form>
		</article>
	</div>
		
	
</div>
</body>
</html>