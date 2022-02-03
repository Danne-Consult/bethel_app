<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>

<?php 
$coursenumber= mysqli_real_escape_string($conn,$_REQUEST['coursenumber']);

$sqly = "SELECT * FROM ".$prefix."course WHERE course_id='$coursenumber'";
$resulty = $conn->query($sqly) or die(mysqli_error($conn)); 


?>
<body class="inner">
<div class="pagecont">
	<?php include 'controllers/navigation/innernav.php' ?>
	<div class="container12 cont-box">
		<article>
			<div class="row">
				<div class="col-md-9">
					<h3>Update Thematic Area</h3>
					<?php
						if($resulty->num_rows == 0){
								echo "<p>No course found!</p>";
						}else{	
							$rowy = $resulty->fetch_assoc();
							
					?>
					<form class="contactForm" id="updatefrm" action="components/update-course.php" method="post" name="login" enctype="multipart/form-data">
						<div class="row">
							<input type="hidden" name="courseid" value="<?php echo $rowy['course_id']?>" />
						
							<div class="col-md-4 fieldtitle">Session Number</div><div class="col-md-8"><input type="text" name="coursenumber" placeholder="Enter the course number" value="<?php echo $rowy['course_number']?>" disabled /></div>
						</div>
						<div class="row">
							<div class="col-md-4 fieldtitle">Section Title</div><div class="col-md-8"><input type="text" name="coursename" placeholder="Enter the course name" value="<?php echo $rowy['course_title']?>" /></div>
						</div>
						
						
						<div id="secbx">	
							
							<?php 
								$coursetext= explode("||", $rowy['course_brief']);
								$coursetext= array_filter($coursetext);
								$countx = 0;
								$sectext = "";
								
					
								foreach($coursetext as $key => $value)
									{
										$coursetextdit= explode("/~",$value);	
										$radionum = $countx + 0;
									
								?>	
					
								
									<div class="sectionbox">
		
										<br /><hr />
										<div class="row">
											<div class="col-md-4 fieldtitle">Section title</div><div class="col-md-8"><input type="text" name="sectitle[]" Value="<?php echo $coursetextdit[1]; ?>" placeholder="Enter the section title" /></div>
										</div>
										<div class="row">
											<div class="col-md-4 fieldtitle">Content</div><div class="col-md-8"><textarea class="tinymce" name="courseconent[]"><?php echo $coursetextdit[2]; ?></textarea></div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-4 fieldtitle">Has quiz</div><div class="col-md-8"><label style="float:none !important;">
												<?php
													if($coursetextdit[3]==""){echo '<input type="radio" name="hasquiz'.$countx.'" value="Yes" required />Yes</label>&nbsp;&nbsp;&nbsp;<label style="float:none !important;"><input type="radio" name="hasquiz'.$countx.'" value="No" />No</label>';}
													if($coursetextdit[3]=="Yes"){
														echo '<input type="radio" name="hasquiz'.$countx.'" value="Yes" required checked="checked" />Yes</label>&nbsp;&nbsp;&nbsp;<label style="float:none !important;"><input type="radio" name="hasquiz'.$countx.'" value="No" />No</label>';
													}
													if($coursetextdit[3]=="No"){
														
														echo '<input type="radio" name="hasquiz'.$countx.'" value="Yes" required />Yes</label>&nbsp;&nbsp;&nbsp;<label style="float:none !important;"><input type="radio" name="hasquiz'.$countx.'" value="No" checked="checked" />No</label>';
													}
												?>
												<p><u><a href="" id="deletesec">Delete Section</a></u></p>
											</div>
										</div>
									</div>
		
									<?php 
										$countx++;
										} 
									?>
						</div>
						<div class="row">
							<div class="col-md-4 fieldtitle"></div><div class="col-md-8"><p><br /></p><button type="button" class="submit" id="addsec">Add Section</button></div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-4 fieldtitle">Reference Links</div><div class="col-md-8"><textarea class="tinymce2"  name="courselinks"><?php echo $rowy['course_reference_links']?></textarea><br /><br /></div>
						</div>
						
						<div class="row">
							<div class="col-md-4 fieldtitle">Banner Image</div><div class="col-md-8"><input id="banimg" type="file" name="bannerimage" data-style="zoom-in"  /></br /><div class="imgpreview" style="background:url(assets/uploads/<?php echo $rowy['course_banner']?>) no-repeat center"></div>
							
							<div><p>Current banner</p>
								<img src="../assets/images/<?php echo $rowy['course_banner']?>" style="width:70%;" />
							</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-4"><button type="submit" id="submitupdate" class="submit" name="updatecourse">Update Course</button></div>
						</div>
					</form>
					<?php } ?>
				</div>
				<div class="col-md-3">
				<h4>Course List</h4>
				<?php include 'controllers/lists/courselist.php' ?>
			</div>
			</div>
		</article>
	</div>
	<div class="container12"><article><hr /></article></div>
	
	<?php include 'controllers/base/footer.php' ?>
	<?php include 'controllers/base/scripts.php' ?>
	
	<!--<script>
		$(document).ready(function(){
			
			$("#updatefrm").submit(function(){		
				tinyMCE.triggerSave();
				event.preventDefault();
				
				
				var formData = new FormData();
				

				$.ajax({  
					type: "post",  
					url: "components/update-course.php",  
					data: formData,
					dataType: 'text',
					cache: false,
					contentType: false,
					processData: false,					
					success: function(data) {  
							console.log(data);
							//location.reload();
					}
				});
			});	
			
			
			
		});
	</script>-->

</body>
</html>