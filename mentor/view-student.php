<?php 
    session_start();
	require '../manager/config/_database/database.php'; 
	
	$studentid = $_GET["userid"];
	$sql="SELECT * FROM ".$prefix."user WHERE usercode='$studentid'";
	$result = $conn->query($sql);
	$rws = $result->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 

	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../assets/css/flexslider.css">
	<link rel="stylesheet" href="../assets/css/menuscript.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<script src="../assets/js/jquery.min.js"></script>
</head>


<body class="inner">

	<div class="container12">
		<article>
			<h3>User</h3>
			<?php
				if(isset($_GET['error'])){
					echo "<div class='error-red'>". $_GET['error'] ."</div>";
				}
				if(isset($_GET['success'])){
					echo "<div class='success-green'>". $_GET['success'] ."</div>";
				}
			?>
			<div class="row">
				<div class="col-md-6">
					<h4>Student name: <?php echo $rws['username']; ?></h4>
					<p><b>Gender:</b> <?php echo $rws['gender']; ?><br />
					<b>Date of Birth:</b> <?php echo $rws['dateofbirth']; ?><br />
					<b>Email:</b> <?php echo $rws['email']; ?></p>
					<p><b>In School:</b> <?php echo $rws['inschool']; ?><br />
					<b>School Level:</b> <?php echo $rws['schoollevel']; ?><br />
					<b>School/Institution name:</b> <?php echo $rws['schoolname']; ?><br />
					<b>location:</b> <?php echo $rws['schoolloc']; ?><br />
					</p>
				</div>
				<div class="col-lg-12">
					<hr />
					<p><b>Has the student attended any Menstrual Hygiene Management and life skill program?:</b> <?php echo $rws['progprev']; ?> </p>
					<p><b>If yes, by which organization:</b> <?php echo $rws['progby']; ?> </p>
					<p><b>If other, tell us about the program:</b> <?php echo $rws['yesprogprev']; ?> </p>
				</div>
			</div>
		</article>
	</div>
		
	
</div>
</body>
	<script>
		$(document).ready(function() {
			
			
			$(".delete").click(function(){
				return confirm("Are you sure you want to delete this record?");	
			});
		})
	</script>
</html>