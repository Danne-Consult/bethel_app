<?php 
	$cn = $_GET['cn'];

	$sqlcourseno = "SELECT course_number FROM ".$prefix."course WHERE course_id='$cn'";
	
	$result1 = $conn->query($sqlcourseno) or die(mysqli_error($conn)); 
	$row1 = $result1->fetch_array();
?>