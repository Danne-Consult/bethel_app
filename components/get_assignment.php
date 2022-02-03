<?php
	$assignmentx = $_GET['a'];
	$sqlass="SELECT * FROM ".$prefix."assignments WHERE course_id='$assignmentx'";
	$resultsass = $conn->query($sqlass);
	$rowass = $resultsass->fetch_array();
	
	$usercode = $_SESSION['userid'];
	
	$sqluser = "SELECT username, email FROM ".$prefix."user WHERE usercode='$usercode'";
	$resultsuser = $conn->query($sqluser);
	$rowuser = $resultsuser->fetch_array();
	
?>