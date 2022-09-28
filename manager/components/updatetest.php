<?php

	include '../config/_database/database.php';
	
	$recordid = mysqli_real_escape_string($conn,$_POST["recordid"]);
	$question = mysqli_real_escape_string($conn,$_POST["questionx"]);
	$questtype = mysqli_real_escape_string($conn,$_POST["questtype"]);
	$answers = mysqli_real_escape_string($conn,$_POST["answersx"]);
	$corrans = mysqli_real_escape_string($conn,$_POST["correctans"]);
	$comment = mysqli_real_escape_string($conn,$_POST["commentx"]);
	
	$sql = "UPDATE ".$prefix."questions SET question = '$question', questiontype='$questtype', answers='$answers', correct_ans='$corrans', comments='$comment' WHERE id='$recordid'";
	
	if($conn->query($sql)){
		$response_array['status'] = 'success';  
	}else {
		$response_array['status'] = 'error -' .die(mysqli_error($conn));  
	}
	
	//$conn->query($sql) or die(mysqli_error($conn));
	
	header('Content-type: application/json');
    echo json_encode($response_array);
	
	$conn->close();
	
?>