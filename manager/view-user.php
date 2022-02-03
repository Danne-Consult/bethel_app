<?php include 'components/session-check.php'; ?>
<?php include 'controllers/base/head.php';

	$userid = $_GET['userid'];
	$sql1="SELECT * FROM ".$prefix."user WHERE id='$userid'";
	$resulty = $conn->query($sql1) or die(mysqli_error($conn)); 
	$rowy = $resulty->num_rows ;
	
	$rowstud = $resulty->fetch_array();
	
?>

<body class="inner">
<div class="pagecont">
	<?php include 'controllers/navigation/innernav.php' ?>

	<div class="container12 minheightbox">
		<article>
		<h3>User Record</h3>
			<div class="row">
				<div class="col-md-8">
					<?php if ($rowy==""){
						echo "No Records Found!";
					}else{?>
					<div class="row">
						<div class="col-md-12"><h4>Name: <b><?php echo $rowstud['username']; ?></b></h4></div>
						<div class="col-md-4">Email: <b><?php echo $rowstud['email']; ?></b></div>
						<div class="col-md-4">Date of birth: <b><?php echo $rowstud['dateofbirth']; ?></b></div>
						<div class="col-md-4">Gender: <b><?php echo $rowstud['gender']; ?></b></div>
						<div class="col-md-4">County from: <b><?php echo $rowstud['county']; ?></b></div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-4">In school: <b><?php echo $rowstud['inschool']; ?></b></div>
						<div class="col-md-4">Education level: <b><?php echo $rowstud['schoollevel']; ?></b></div>
					</div>
					<div class="row">
						<div class="col-md-12">School name: <b><?php echo $rowstud['schoolname']; ?></b></div>
						<div class="col-md-12">Location: <b><?php echo $rowstud['schoolloc']; ?></b></div>
					</div>
					
					<?php } ?>
				</div>
				<div class="col-md-4">
					<h4>Users List</h4>
					<?php include 'controllers/lists/userlist.php' ?>
				</div>
			</div>
		</article>
	</div>
	<div class="container12"><article><hr /></article></div>
	
	<?php include 'controllers/base/footer.php' ?>
	<?php include 'controllers/base/scripts.php' ?>

</body>
</html>