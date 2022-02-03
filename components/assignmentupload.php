<?php
session_start();
include '../manager/config/_database/database.php';

if(isset($_REQUEST['submitassignment']) || !$_SESSION['userid']==""){

	$usercode = $_SESSION['userid'];
	
	$assid= mysqli_real_escape_string($conn,$_REQUEST['assid']);
	$assubject= mysqli_real_escape_string($conn,$_REQUEST['assubject']);
	$assbrief= mysqli_real_escape_string($conn,$_REQUEST['assbrief']);
	
	$sql0 = "SELECT id FROM ".$prefix."user WHERE usercode='$usercode'";
	$result0 = $conn->query($sql0) or die(mysqli_error($conn));
	$row0 = $result0->fetch_array();
	
	$userid = $row0["id"];
	
	$sql1 = "INSERT INTO ".$prefix."assignment_submissions (student_id,course_id,subject,assignment_brief) VALUES ('$userid','$assid','$assubject','$assbrief')";

	if ($conn->query($sql1) === TRUE) {
		$last_id = $conn->insert_id;
		
		$RandomNum   = rand(0,999999);
		$allowTypes = array('jpg','png','jpeg','gif','pdf','doc','docx');
		$countfiles = count($_FILES['assup']['name']);
		
		if(isset($_FILES['assup'])){
			 for($i=0;$i<$countfiles;$i++){
				$filename = $_FILES['assup']['name'][$i];
				$Destination = "../userfiles/assignments";
				
				$targetFilePath = $Destination . $filename;			
				$ImageExt = pathinfo($targetFilePath, PATHINFO_EXTENSION);
				
				$ImageExt = str_replace('.','',$ImageExt);
				$filename = preg_replace("/\.[^.\s]{3,4}$/", "", $filename);
				$NewImageName = $filename.'-'.$RandomNum.'.'.$ImageExt;
				
				if(in_array($ImageExt,$allowTypes)){
									
					move_uploaded_file($_FILES['assup']['tmp_name'][$i], "$Destination/$NewImageName");
					
					$sql2 = "INSERT INTO ".$prefix."assignment_uploads (assignment_sub_id,file_address) VALUES ('$last_id','$NewImageName' )";
					$conn->query($sql2) or die(mysqli_error($conn));
				}else{
					
					
				}	
			 } 
		}

		header("location: ../completed.php?cn=".$assid);
		
	}else{
		
		header("location: ../assignments.php?a".$assid."&error=error_uf");
		
	}
	$conn->close();
}

?>