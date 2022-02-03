<?php
	session_start();
	include '../config/_database/database.php';
	
	$assnumber = mysqli_real_escape_string($conn,$_REQUEST['ass']);

    
	if(!$assnumber==""){
		
		$sql1 = "DELETE FROM ".$prefix."assignments WHERE assignment_id = '$assnumber'";

		$conn->query($sql1) or die(mysqli_error($conn));

		$conn->close();
		header("location: ../assignments.php?status=Deleted Successfully");
    }else{
		header("location: ../assignments.php?status=&error: Could not delete");
	}
?>