<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php 
	$assid= mysqli_real_escape_string($conn,$_REQUEST['ass']);

	$sqly = "SELECT ".$prefix."course.course_id, ".$prefix."course.course_number, ".$prefix."assignments.assignment_id, ".$prefix."assignments.course_id, ".$prefix."assignments.assignment_questions FROM ".$prefix."assignments LEFT JOIN ".$prefix."course ON ".$prefix."assignments.course_id = ".$prefix."course.course_id WHERE  ".$prefix."assignments.assignment_id='$assid'";
	
	$resulty = $conn->query($sqly) or die(mysqli_error($conn)); 
?>
<body class="inner">
<div class="pagecont">
	<?php include 'controllers/navigation/innernav.php' ?>
	<div class="container12 cont-box">
		<article>
			<div class="row">
				<div class="col-md-7">
					<h3>Update Assignment</h3>
					<?php
							if($resulty->num_rows == 0){
									echo "<p>No Assignments found!</p>";
							}else{
							
								$rowy = $resulty->fetch_assoc();
								
					?>
					<form class="contactForm" action="components/update_assignment.php" method="post" name="updateform">
						<input type="hidden"name="assnum" value="<?php echo $rowy['assignment_id']?>" />
						<h4>Thematic Area -<?php echo $rowy['course_number']?> Assignment</h4>
						<br />
						<div class="row">	
							<div class="col-md-12">
							<h4>Assignment Content</h4>
							<textarea class="tinymce" name="assignmentcont"><?php echo $rowy['assignment_questions']?></textarea><br /><br /></div>
						</div>
						<div class="row">
							<div class="col-md-6"><button type="submit" name="updateassignment" class="submit">Update Assignment</button>&nbsp;&nbsp; <a style="text-decoration:underline;" href="components/deleteassignment.php?ass=<?php echo $rowy['assignment_id'] ?>">delete Record</a></div>
						</div>
					</form>
							<?php } ?>
				</div>
				<div class="col-md-5">
					<h4>Assignment List</h4>
					<?php include 'controllers/lists/assignmentlist.php' ?>
				</div>
			</div>
		</article>
	</div>
	<div class="container12"><article><hr /></article></div>
	
	<?php include 'controllers/base/footer.php' ?>
	<?php include 'controllers/base/scripts.php' ?>

</body>
</html>