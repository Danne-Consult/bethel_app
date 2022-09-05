<?php
    if(isset($_REQUEST['submitcourse'])){
		
		session_start();
		include '../config/_database/database.php';

		$coursenumber= mysqli_real_escape_string($conn,$_REQUEST['coursenumber']);
        $coursetitle= mysqli_real_escape_string($conn,$_REQUEST['coursename']);
        $sectitle= $_POST['sectitle'];
        $seccontent= $_POST['courseconent'];     
		$reflinks= mysqli_real_escape_string($conn,$_REQUEST['courselinks']);
		$conttext = "";
		
		$sql1 = "INSERT INTO ".$prefix."course (course_number,course_title) VALUES ('$coursenumber','$coursetitle')";
		$conn->query($sql1) or die(mysqli_error($conn));
		
		$sqlcourse = "SELECT * FROM ".$prefix."course WHERE course_number = '$coursenumber'";
		$resultcourse = $conn->query($sqlcourse) or die(mysqli_error($conn));
		
		$rowcourse = mysqli_fetch_array($resultcourse);
		$selectedcourse = $rowcourse["course_id"];
		
		$numques = count($sectitle);
		for($i=0;$i<$numques;$i++){
			 if($sectitle[$i]!=""){
				$sec = $sectitle[$i];
				$cont = $seccontent[$i];
			 }
			for($z=0;$z<$numques;$z++){
				$quiz = $_POST['hasquiz'.$z];
			}
			$conttext .=  "||/~". $sec ."/~" . $cont ."/~". $quiz; 
		}
		
		$sql2="UPDATE ".$prefix."course SET course_brief='$conttext' WHERE course_id = '$selectedcourse'";	
	
		$conn->query($sql2) or die(mysqli_error($conn));
		
		$allowTypes = array('jpg','png','jpeg','gif','pdf','doc','docx');
		$allowimageTypes = array('jpg','png','jpeg','gif');
		$allowvideoTypes = array('mp4','wmv','flv');
		
		 
		if(!$_FILES['bannerimage'] == ""){
			$filename2 = $_FILES['bannerimage']['name'];
			$targetFilePath2 = "../assets/uploads/". $filename2;
			$fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);
			
			if(in_array($fileType2,$allowimageTypes)){
					move_uploaded_file($_FILES['bannerimage']['tmp_name'], $targetFilePath2 );
					$sql3="UPDATE ".$prefix."course SET course_banner='$filename2' WHERE course_id = '$selectedcourse'";	
					$conn->query($sql3) or die(mysqli_error($conn));
			}
		}
		
		header('Location: ../create-course.php?status=success');
	
		$conn->close();
		
    }
?>