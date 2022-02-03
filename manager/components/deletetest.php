<?php
	include '../config/_database/database.php';
	$secid = mysqli_real_escape_string($conn,$_REQUEST['t']);
	if(!$secid==""){
		
		$sql1 = "DELETE FROM ".$prefix."questions WHERE thematicnum = '$secid'";
		$conn->query($sql1);
		$conn->close();
		header("location: ../tests.php?success");
    }else{
		header("location: ../tests.php?error=could not delete");
	}
?>