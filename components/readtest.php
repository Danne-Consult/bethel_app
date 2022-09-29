<?php 

	include '../manager/config/_database/database.php';
	
	$themeid= $_POST['themeno'];
	$secnum= $_POST['section'];
	$usertype= $_POST['usertype'];
	$userid= $_POST['userid'];
	$lastest= $_POST['lastest'];

	$return_arr = array();
		
	$box = $_POST;
	
	$questans = "";
	$newlevel = "";
	
	
	unset($box['themeno']); 
	unset($box['section']); 
	unset($box['usertype']); 
	unset($box['userid']);
	unset($box['lastest']);
	
	$score = 0;
	$wrongans="";
	
	foreach ($box as $x => $value) {
		
		$sqlx = "SELECT correct_ans,questiontype FROM ".$prefix."questions WHERE id = '$x'";
		$resultx = $conn->query($sqlx) or die(mysqli_error($conn));
		$rowcount = mysqli_num_rows($resultx);
		$rowx = $resultx->fetch_array();
		
		if(!$rowcount == 0){
			if($rowx['questiontype']=='radio'){
				if(trim($rowx['correct_ans']) === trim($value)){
					$score += 1;
				}	
				else{
					$wrongans .= $x.",";
				}
			}
			if($rowx['questiontype']=='checkboxes'){
				$answers= explode("~", $rowx['correct_ans']);
				foreach ($answers as $ans) {
					if(trim($value) === ($ans)){
						$score += 1;
					}
					else{
						$wrongans .= $x.",";
					}
				}
			}					
		}
	}
	
	function translateToGrade($percentage) {
		if ($percentage >= 90.0) { return "A"; }
		else if ($percentage >= 80.0) { return "B"; }
		else if ($percentage >= 70.0) { return "C"; }
		else if ($percentage >= 60.0) { return "D"; }
		else { return "F"; }
	}

	
	
	$sql = "INSERT INTO ".$prefix."studanswers (userid,usertype,themeid,section,answers,score) VALUES ('$userid','$usertype','$themeid','$secnum','$answers','$score')";
	$conn->query($sql) or die(mysqli_error($conn));	
	
	if($lastest==1){
		$sql1 = "SELECT levelon FROM ".$prefix."user WHERE usercode = '$userid'";
		$result = $conn->query($sql1) or die(mysqli_error($conn));
		$row = $result->fetch_array();
		
		$newlevel = $row['levelon']+1;
		$sql2 = "UPDATE ".$prefix."user SET levelon = '$newlevel' WHERE usercode = '$userid'";
		$conn->query($sql2) or die(mysqli_error($conn));
	}
	
	
	$return_arr[] = array('themeno'=>$themeid,'secno'=>$secnum,'lasttest'=>$lastest,'status'=>'success','score'=>$score,'wrongans'=>$wrongans);
	
	header("Content-Type: application/json");
	echo json_encode($return_arr);
	exit();

?>