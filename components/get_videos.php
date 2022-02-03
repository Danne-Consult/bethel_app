<?php 
		
	$sqlvid = "SELECT course_video, course_embedded_video FROM ".$prefix."course WHERE course_number='$pageid'";
	
	$resultvid = $conn->query($sqlvid);
	$rowvid = $resultvid->fetch_array();
	
	if(isset($rowvid)){
		echo "<h4>Video Reference</h4>";
		
		if(!empty($rowvid['course_embedded_video'])){
			echo $rowvid['course_embedded_video']."<br /></br />";
		}
		if(!empty($rowvid['course_video'])){
			echo '<video style="width:100%" controls>
				  <source src="manager/assets/uploads/'.$rowvid['course_video'].'" type="video/mp4">
				  Your browser does not support HTML5 video.
				</video>';
		}

	}
?>