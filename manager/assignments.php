<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>

<body class="inner">
<div class="pagecont">
	<?php include 'controllers/navigation/innernav.php' ?>
	<div class="container12 cont-box">
		<article>
			<div class="row">
				<div class="col-md-7">
					<h3>Add New Assignment</h3>
					<form class="contactForm" action="components/assignment-process.php" method="post" name="assignmentform">
						
						<div class="row">
							<div class="col-md-6">
							<h4>Select Thematic Area</h4>
							
							<select name="thematicarea">
								<option>...</option>
								<?php
									$sqlthematic="SELECT * FROM ".$prefix."course";
									$resultthematic = $conn->query($sqlthematic) or die(mysqli_error($conn));
									$rownumthematic = $resultthematic->num_rows;

									if(!$rownumthematic == 0){
										
										while($rowthematic = $resultthematic->fetch_assoc()){
											echo "<option value='".$rowthematic['course_id']."'>Thematic Area - ".$rowthematic['course_number']."</option>";
									}
									
									}
								?>
							</select>
							
							</div>
						</div>
						<div class="row">	
							<div class="col-md-12">
							<h4>Assignment Content</h4>
							<textarea class="tinymce" name="assignmentcont"></textarea><br /><br /></div>
						</div>
						<div class="row">
							<div class="col-md-6"><button type="submit" name="addassignment" class="submit">Add Assignment</button></div>
						</div>
					</form>
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