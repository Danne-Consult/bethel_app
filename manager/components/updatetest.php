<?php

	include '../config/_database/database.php';
	
	$recordid = $_POST["recordid"];
	$question = $_POST["questionx"];
	$questtype = $_POST["questtype"];
	$answers = $_POST["answersx"];
	$corrans = $_POST["correctans"];
	$comment = $_POST["commentx"];
	
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