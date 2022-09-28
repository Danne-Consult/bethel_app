<?php
		ob_start();
		session_start();
		include '../config/_database/database.php';
		
		$courseid= $_POST['courseid'];
		$coursenumber= $_POST['coursenumber'];
        $coursetitle= $_POST['coursename'];
        $sectitle= $_POST['sectitle'];
        $seccontent= $_POST['courseconent'];     
		$reflinks= $_POST['courselinks'];
		$conttext = "";
		
		$numques = count($sectitle);
		for($i=0;$i<$numques;$i++){
			 if($sectitle[$i]!=""){
				$sec = $sectitle[$i];
				$cont = $seccontent[$i];
			 }
			for($z=0;$z<$numques;$z++){
				$quiz = $_POST['hasquiz'.$z];
				echo $quiz;
			}
			$conttext .=  "||/~". $sec ."/~" . $cont ."/~". $quiz; 
		}
		$conttext = $conn -> real_escape_string($conttext);
		
		echo $conttext;
		$sql2="UPDATE ".$prefix."course SET course_brief='$conttext' WHERE course_id = '$courseid'";	
		echo $sql2;
		$conn->query($sql2) or die(mysqli_error($conn));
		
		$allowTypes = array('jpg','png','jpeg','gif','pdf','doc','docx');
		$allowimageTypes = array('JPG','jpg','png','jpeg','gif');
		$allowvideoTypes = array('mp4','wmv','flv');
		
		if(!$_FILES['bannerimage'] == ""){
			$filename2 = str_replace(" ","_",$_FILES['bannerimage']['name']);
			$targetFilePath2 = "../assets/uploads/". $filename2;
			$fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);
			
			if(in_array($fileType2,$allowimageTypes)){
					move_uploaded_file($_FILES['bannerimage']['tmp_name'], $targetFilePath2 );
					$sql3="UPDATE ".$prefix."course SET course_banner='$filename2' WHERE course_id = '$courseid'";	
					$conn->query($sql3) or die(mysqli_error($conn));
					echo $sql3;
			}
		}
		
		$conn->close();
		header('Location: ../update-course.php?coursenumber='.$courseid.'&status=success');
    
?>