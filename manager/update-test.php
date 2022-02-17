<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>


<body class="inner">
<div class="pagecont">
	<?php include 'controllers/navigation/innernav.php' ?>
	<div class="container12 cont-box">
		<article>
			<div class="row">
				<div class="col-md-8">
					<h3>Update Test</h3>
					<div class="row">
						<div class="col-md-12">
						<?php
							$courseid=  mysqli_real_escape_string($conn,$_REQUEST['t']);
							$sqltests="SELECT * FROM ".$prefix."questions LEFT JOIN ".$prefix."course ON ".$prefix."questions.thematicnum=".$prefix."course.course_id WHERE ".$prefix."questions.thematicnum='$courseid'";
							
							$sqltests2="SELECT * FROM ".$prefix."questions LEFT JOIN ".$prefix."course ON ".$prefix."questions.thematicnum=".$prefix."course.course_id WHERE ".$prefix."questions.thematicnum='$courseid'";
							
							
							$resulttest = $conn->query($sqltests) or die(mysqli_error($conn));
							$resulttest2 = $conn->query($sqltests2) or die(mysqli_error($conn));
							
							$rownumthematic = $resulttest->num_rows;
							$rowtest1 = $resulttest2->fetch_array();

							if($rownumthematic !==""){
								
									echo "<h4>". $rowtest1['course_title'] ."</h4>";
							
							}
						?>
						</div>
					</div>
					
					<div class="row">
						<?php 
						
						while($rowtest = $resulttest->fetch_array()){ ?>
							<div class="col-md-12">
							<form class="contactForm">
							<div class="successmsg">Change was successful</div>
							<div class="row">
								<input type="hidden" name="recordid" value="<?php echo $rowtest['id']; ?>" />
								<div class="col-md-7"><b><label>Section: 
							
								<?php
									
									$sqlrow="SELECT * FROM " .$prefix. "course WHERE course_id = ".$rowtest['thematicnum'];

									$result =  $conn->query($sqlrow);
									$row = $result->fetch_array();
									
									$coursetext= explode("||", $row['course_brief']);
									$coursetext= array_filter($coursetext);
									
									$texttitle= explode("/~",$coursetext[$rowtest['question_part']]);
									$texttitle= array_filter($texttitle);


									print_r($texttitle[1]);
	
								?>
								</label></b>
							</div>
								<div class="col-md-7"><label>Question</label><br /><input type="text" name="questionx" value="<?php echo $rowtest['question']; ?>" required /></div>
								<div class="col-md-5"><label>Question Type</label>
									<select name="questtype">
										<option value="<?php echo $rowtest['questiontype']; ?>"><?php if( $rowtest['questiontype']== 'inputtext'){echo 'Text (current)';} if( $rowtest['questiontype']== 'checkboxes'){echo 'Checkboxes (current)';}  if( $rowtest['questiontype']== 'radio'){echo 'Radio Buttons (current)';}?></option>
											<option>...</option>
											<option value="inputtext">Text</option>
											<option value="checkboxes">Checkboxes</option>
											<option value="radio">Radio Buttons</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-7"><label>Answers</label><textarea name="answersx" ><?php echo $rowtest['answers']; ?></textarea></div>
								<div class="col-md-5"><label>Correct Answer</label><textarea name="correctans" ><?php echo $rowtest['correct_ans']; ?></textarea></div>
								
							</div>
							<div class="row">
								<div class="col-md-12"><label>Comments</label><textarea name="commentx"><?php echo $rowtest['comments']; ?></textarea></div>
								
								<div class="col-md-12"><br /><button type="submit" class="submit">Save</button> &nbsp; <a onclick='confirm("Are you sure you want to delete this question?")' href="components/deletequest.php?course=<?php echo $courseid;?>&rec=<?php echo $rowtest['id']; ?>">Delete</a></div>
							</div>
							</form>
							
							<hr />
						</div>
						<?php } ?>
					</div>
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
			
			
			$("form .submit").click(function(){
			event.preventDefault();
			$str = $(this).closest("form").serialize();
			console.log($str);
			$formx = $(this).closest("form").find('.successmsg');

				$.ajax({  
					type: "POST",  
					url: "components/updatetest.php",  
					data: $str,
					dataType: "json",					
					success: function(data){
						console.log(data);
						
						if(data['status'] == 'success'){
							//alert("Change was successful");
							$formx.fadeIn('slow', function(){
								$formx.fadeOut(7000);
							});
						}
						
					}
				});
			});	
		});

	</script>
	
	

</body>
</html>