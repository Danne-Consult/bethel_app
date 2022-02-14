<?php 
$sqlx = "SELECT * FROM ".$prefix."course  ORDER BY course_number ASC";
$resultx =  $conn->query($sqlx);

?>

<div class="thematicside">
		<h3>Thematic areas</h3>
			<div class="row">
			<?php 
				if($resultx->num_rows == 0){
						echo "<duv class='col-md-12'><p>No Users Added!</p></div>";
				}else{
					while($rowx = $resultx->fetch_array()){
						echo '<div class="col-md-12" >
								<div class="coursebox box'.$rowx["course_number"].'" style="background:url(manager/assets/uploads/'.$rowx["course_banner"].') no-repeat center; background-size:cover;">
									<div class="aboutcourse">
										<h3 class="coursetitle">Unit '.$rowx["course_number"].'</h3>
										<p class="aligncenter"><a href="course.php?course='.$rowx["course_number"].'" class="morebtn">Get Started</a></p>
									</div>
								</div>
							</div>';
					}
					$conn->close();
				}			
			?>
			</div>
	</div>