<?php
    if(isset($_REQUEST['submitcourse'])){
		
		session_start();
		include '../config/_database/database.php';

		$coursenumber= mysqli_real_escape_string($conn,$_REQUEST['coursenumber']);
        $coursetitle= mysqli_real_escape_string($conn,$_REQUEST['coursename']);
        $coursecontent= mysqli_real_escape_string($conn,$_REQUEST['courseconent']);
		$embeddedvideo= mysqli_real_escape_string($conn,$_REQUEST['course_embedded_video']);
		$reflinks= mysqli_real_escape_string($conn,$_REQUEST['courselinks']);
		
		$sql1 = "INSERT INTO ".$prefix."course (course_number,course_title,course_brief,course_embedded_video,course_reference_links) VALUES ('$coursenumber','$coursetitle','$coursecontent','$embeddedvideo','$reflinks')";

		$conn->query($sql1) or die(mysqli_error($conn));
		
		$sqlcourse = "SELECT * FROM ".$prefix."course";
		$resultcourse = $conn->query($sqlcourse) or die(mysqli_error($conn));
		
		$rowcourse = mysqli_fetch_array($resultcourse);
		$selectedcourse = $rowcourse["course_id"];

		
		$allowTypes = array('jpg','png','jpeg','gif','pdf','doc','docx');
		$allowimageTypes = array('jpg','png','jpeg','gif');
		$allowvideoTypes = array('mp4','wmv','flv');
		
		$errorxx = "";
		
		$countfiles = count($_FILES['coursefiles']['name']);
		
		if(!$_FILES['coursefiles'] == ""){
		 for($i=0;$i<$countfiles;$i++){
			$filename = $_FILES['coursefiles']['name'][$i];
			$targetFilePath = "../assets/uploads/". $filename;
			$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
			
			if(in_array($fileType,$allowTypes)){
				move_uploaded_file($_FILES['coursefiles']['tmp_name'][$i], $targetFilePath );
				$sql2 = "INSERT INTO ".$prefix."files (document_name,document_path,course_code) VALUES ('$filename','$targetFilePath','$selectedcourse')";
				$conn->query($sql2) or die(mysqli_error($conn));
			}else{
				$errorxx = "error:unknown file type::". $errorxx;
				$return; 
			}	
		 } 
		}
		 
		if(!$_FILES['bannerimage'] == ""){
			$filename2 = $_FILES['bannerimage']['name'];
			$targetFilePath2 = "../assets/uploads/". $filename2;
			$fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);
			
			if(in_array($fileType2,$allowimageTypes)){
					move_uploaded_file($_FILES['bannerimage']['tmp_name'], $targetFilePath2 );
					$sql3="UPDATE ".$prefix."course SET course_banner='$filename2' WHERE course_id = '$selectedcourse'";	
					$conn->query($sql3) or die(mysqli_error($conn));					
			}else{
				$errorxx = "banner must be an image::". $errorxx;
				$return; 
			}
		}
		
		if(!$_FILES['coursevideo'] == ""){

			$filename3 = $_FILES['coursevideo']['name'];
			$targetFilePath3 = "../assets/uploads/". $filename3;
			
			$fileType3 = pathinfo($targetFilePath3,PATHINFO_EXTENSION);
			
			if(in_array($fileType3,$allowvideoTypes)){
					move_uploaded_file($_FILES['coursevideo']['tmp_name'], $targetFilePath3);
					$sql4 = "INSERT INTO ".$prefix."videos (video_title,course_code) VALUES ('$filename3','$selectedcourse')";
					$conn->query($sql4) or die(mysqli_error($conn));
			}else{
				$errorxx = "File must be video::". $errorxx;
				$return; 
			}
		}
	
		if (isset($errorxx)){
			header('Location: ../create-course.php?status=error:'.$errorxx);
		}else{
			header('Location: ../create-course.php?status=success');
		}
		$conn->close();
		
    }
?>