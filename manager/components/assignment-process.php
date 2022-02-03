<?php
    if(isset($_REQUEST['addassignment'])){
		
		session_start();
		include '../config/_database/database.php';

		$thematicarea= mysqli_real_escape_string($conn,$_REQUEST['thematicarea']);
        $asscontent= mysqli_real_escape_string($conn,$_REQUEST['assignmentcont']);

		
		$sql1 = "INSERT INTO ".$prefix."assignments (course_id,assignment_questions) VALUES ('$thematicarea','$asscontent')";

		$conn->query($sql1) or die(mysqli_error($conn));
		
		header('Location: ../assignments.php?status=success');
		
		$conn->close();
		
    }
?>