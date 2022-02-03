<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>

<body class="inner">
<div class="pagecont">
	<?php include 'controllers/navigation/innernav.php' ?>
	<div class="container12 cont-box">
		<article>
			<div class="row">
				<div class="col-md-8">
					<h3>Add New Test</h3>
					<form class="contactForm" id="testquest" method="post" action="components/addtest.php">
						
						<div class="row">
							<div class="col-md-7">
							<h4>Select Session</h4>
							
							<select name="thematicarea" id="themerec">
								<option>...</option>
								<?php
									$sqlthematic="SELECT * FROM ".$prefix."course ORDER BY course_number ASC";
									$resultthematic = $conn->query($sqlthematic) or die(mysqli_error($conn));
									$rownumthematic = $resultthematic->num_rows;

									if(!$rownumthematic == 0){
										
										while($rowthematic = $resultthematic->fetch_assoc()){
											echo "<option value='".$rowthematic['course_id']."'>Session - ".$rowthematic['course_number'].": ".$rowthematic['course_title']."</option>";
									}
									
									}
								?>
							</select>
							
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h4>Section in Session</h4>
								
								<select name="section" id="secname"></select>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-12">
							<h4>Test Questions and Answers</h4>
							<div class="divholder">
								<div class="testcont">
									<hr />
									<div class="qanda row">
										<div class="col-md-6">
											<label>Question Type</label>
											<select name="qtype[]">
												<option>...</option>
												<option value="inputtext">Text</option>
												<option value="checkboxes">Checkboxes</option>
												<option value="radio">Radio Buttons</option>
											</select>
										</div>
										<div class="col-md-12">
										<div class="quest"><label>Question</label><br /><textarea name="question[]"></textarea></div>
										</div>
										<div class="col-md-6">
										<div class="ans"><label>Answers - Radio buttons and checkboxes Separate with (~)</label><br /><textarea name="answers[]" /></textarea></div>
										</div>
										<div class="col-md-6">
										<div class="corrans"><label>Correct Answer - Separate multiple answers with (~)</label><br /><textarea name="correctans[]"></textarea></div>
										</div>
										<div class="col-md-12">
										<div class="comment"><label>Comment</label><br /><textarea name="comments[]"></textarea></div>
										</div>
									</div>
								</div>
							</div>
							<div class="addquest"><button id="morefield" class="addbtn" type="button">+</button></div>
							</div>
						</div>
						<hr />
						<div class="row">
							<div class="col-md-6"><button type="submit" name="addassignment" class="submit" id="savetest">Add Test</button></div>
						</div>
					</form>
				</div>
				<div class="col-md-4">
					<h4>Test List</h4>
					<?php include 'controllers/lists/testtlist.php' ?>
				</div>
			</div>
		</article>
	</div>
	<div class="container12"><article><hr /></article></div>
	
	<?php include 'controllers/base/footer.php' ?>
	<?php include 'controllers/base/scripts.php' ?>
	
	<script>
		$(document).ready(function(){
			$('#themerec').change(function(){
				var valx = $(this).val();
				
				 $.ajax({
					type:"GET",
					cache:false,
					url:"components/getsection.php",
					data:{themeid: valx},
					success: function (datax) {
					  $('#secname').html(datax);
					}
				});	
			});
		});
	</script>
	
	

</body>
</html>