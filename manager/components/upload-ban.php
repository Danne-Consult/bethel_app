<?php
		
		print_r($_FILES);
		include '../config/_database/database.php';
		
		if(!$_FILES['file'] == ""){
			$filename2 = $_FILES['file']['name'];
			$targetFilePath2 = "../assets/uploads/". $filename2;
			$fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);
			
			if(in_array($fileType2,$allowimageTypes)){
					move_uploaded_file($_FILES['bannerimage']['tmp_name'], $targetFilePath2 );
					$sql3="UPDATE ".$prefix."course SET course_banner='$filename2' WHERE course_id = '$courseid'";	
					//$conn->query($sql3) or die(mysqli_error($conn));
					
					echo $sql3;
			}
		}
		
		//$conn->close();
		/*header('Location: ../create-course.php?status=success');*/
    
?>