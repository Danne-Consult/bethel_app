<?php
	$pageid = $_GET['course'];
	$sqlcourse="SELECT * FROM ".$prefix."course WHERE course_number='$pageid'";
	$resultscourse = $conn->query($sqlcourse);
	$rowcourse = $resultscourse->fetch_array();
	
	$usercode = $_SESSION['userid'];
	
	$usercourselevel="SELECT tests_complete FROM ".$prefix."user WHERE usercode = '$usercode'";

	$resultlevel = $conn->query($usercourselevel);
	
	$rowclevel = $resultlevel->fetch_array();
	
	
?>