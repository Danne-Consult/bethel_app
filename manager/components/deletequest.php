<?php
	include '../config/_database/database.php';
	
	$course = mysqli_real_escape_string($conn,$_REQUEST['course']);
	$rec = mysqli_real_escape_string($conn,$_REQUEST['rec']);
	
	if(!$rec==""){
		
		$sql1 = "DELETE FROM ".$prefix."questions WHERE id = '$rec'";
		$conn->query($sql1);
		$conn->close();
		header("location: ../update-test.php?t=".$course."&success=success");
    }else{
		header("location: ../update-test.php?t=".$course."&error=Could not delete the record");
	}
?>