<?php 
		
	$sqllist = "SELECT ".$prefix."files.document_id,".$prefix."files.document_path,".$prefix."files.document_name FROM ".$prefix."files LEFT JOIN (".$prefix."course) ON ".$prefix."files.course_code = ".$prefix."course.course_id WHERE ".$prefix."course.course_id=".$rowcourse['course_id'];
	
	$resultlist = mysqli_query($conn,$sqllist) or die(mysqli_error()); 

	if(!$rowlist = mysqli_num_rows($resultlist) == 0){
		echo "<ul>";
		while($rowlist = mysqli_fetch_array($resultlist)){
			echo "<li><a target='_new' href='manager/assets/uploads/".$rowlist['document_name']."'>".$rowlist['document_name']."</a></li>";
		}
		echo "</ul>";
	}else{
		echo "No reference files added!";
	}
?>