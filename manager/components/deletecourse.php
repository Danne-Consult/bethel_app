<?php
	session_start();
	include '../config/_database/database.php';
	
	$coursenumber = mysqli_real_escape_string($conn,$_REQUEST['coursenumber']);

    
	if(!$coursenumber==""){
		
		$sql1 = "DELETE FROM ".$prefix."course WHERE course_id = '$coursenumber'";

		$conn->query($sql1) or die(mysqli_error($conn));

		$conn->close();
		header("location: ../create-course.php?status=Deleted Successfully");
    }else{
		header("location: ../create-course.php?status=&error: Could not delete");
	}
?>