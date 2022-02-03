<?php
	session_start();
	include '../config/_database/database.php';
	
	$filenumber = mysqli_real_escape_string($conn,$_REQUEST['file']);
	$pnum = mysqli_real_escape_string($conn,$_REQUEST['p']);
    
	if(!$filenumber==""){
		
		$sql1 = "DELETE FROM ".$prefix."files WHERE document_id = '$filenumber'";

		$conn->query($sql1);

		$conn->close();
		header("location: ../update-course.php?coursenumber=".$pnum);
    }else{
		header("location: ../update-course.php?coursenumber=".$pnum."&error");
	}
?>