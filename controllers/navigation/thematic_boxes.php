<?php 
$sqlx = "SELECT * FROM ".$prefix."course  ORDER BY course_number ASC";
$resultx =  $conn->query($sqlx);

$sqly = "SELECT levelon FROM ".$prefix."user WHERE usercode = '$current_user'";
$resulty = $conn->query($sqly);
$rowy = $resulty->fetch_assoc();
?>

<div class="container12 beakx thematics">
		<article>
		<h3 class="aligncenter">Units</h3>
			<div class="row justify-content-center slidex">
			<?php 
				if($resultx->num_rows == 0){
						echo "<div class='col-md-12'><p>No thematics added!</p></div>";
				}else{
					
					while($rowx = $resultx->fetch_array()){
						$msg = '<div class="col-md-3" ><div class="themebox box'.$rowx["course_number"].'" style="background:url(manager/assets/uploads/'.$rowx["course_banner"].') no-repeat center; background-size:cover;"><div class="titlebox"><h4><span>Unit '.$rowx["course_number"].'</span><br />'.$rowx["course_title"].'</h4>';

						if($_SESSION['usertype']=='stud'){
						
							if($rowy['levelon']==$rowx["course_number"]){$msg .= '<p class="aligncenter"><a href="course.php?course='.$rowx["course_number"].'" class="morebtn">Get Started</a></p>';}
							if($rowy['levelon'] > $rowx["course_number"]){$msg .= '<p class="aligncenter"><a href="course.php?course='.$rowx["course_number"].'" class="morebtn greyed">View Unit</a>';}
						}
						
						if($_SESSION['usertype']=='ment'){$msg .= '<p class="aligncenter"><a href="course.php?course='.$rowx["course_number"].'" class="morebtn">Start Unit</a></p>';}
						
						$msg .= '</div></div></div>';
						
						echo $msg;
					}
					$conn->close();
				}			
			?>
			</div>
		</article>
	</div>