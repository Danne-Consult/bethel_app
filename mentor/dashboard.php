<?php 
session_start();
$usercode = $_SESSION['userid'];
require '../manager/config/_database/database.php'; 
	
	$sql0="SELECT mentor_id FROM ".$prefix."mentor WHERE usercode = '$usercode'";
	$result0 =  $conn->query($sql0);
	$rws0 =  $result0->fetch_array();
	
	
	$sql1="SELECT * FROM ".$prefix."user WHERE mentor='$rws0[0]'";
	$result1 =  $conn->query($sql1);
	$trws1 = mysqli_num_rows($result1);
	
	$sql2="SELECT * FROM ".$prefix."schools WHERE enterby='$rws0[0]'";
	$result2 =  $conn->query($sql2);
	$trws2 = mysqli_num_rows($result2);
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
			<h3>Dashboard</h3>
			
			<div class="row">
				<div class="col-md-12">
					<div class="quicklinks">
						<ul>
							<li><a href="students.php" target="workframe">Add Students</a></li>
							<li><a href="viewstudents.php" target="workframe">View Students</a></li>
							<li><a href="schools.php" target="workframe">Add Schools</a></li>
							<li><a href="viewschools.php" target="workframe">View Schools</a></li>
						<ul>
					</div>
				</div>
			</div>
			<hr />
			<div class="row">	
				<div class="col-md-4">
					<div class="registered usersx">
						<p><?php echo $trws1; ?><br /><span>Students</span></p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="registered schoolsx">
						<p><?php echo $trws2; ?><br /><span>Schools Registered</span></p>
					</div>
				</div>
				
			</div>
		</article>
	</div>
		
	
</div>
</body>
</html>