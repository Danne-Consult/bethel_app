<?php
if(isset($_REQUEST['updateassignment'])||$_REQUEST['auto']==1){
	
	session_start();
	include '../config/_database/database.php';
	
	
	$assid = mysqli_real_escape_string($conn,$_REQUEST['assnum']);
	$asscont = mysqli_real_escape_string($conn,$_REQUEST['assignmentcont']);
	
	$sql1="UPDATE ".$prefix."assignments SET assignment_questions='$asscont' WHERE assignment_id='$assid'";	
	$conn->query($sql1) or die(mysqli_error($conn));
	
	
	header('Location: ../update-assignment.php?status=success&ass='.$assid);
	
	$conn->close();
	
}else{
	header('Location: ../update-assignment.php?status=error: Could not update&ass='.$assid);	
}
?>