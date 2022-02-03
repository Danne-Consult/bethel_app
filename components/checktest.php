<?php 

session_start();
require '../manager/config/_database/database.php';
date_default_timezone_set("Africa/Nairobi");
$currdatetime= date("y-m-d h:i:s");
		
$responses = array();
$errflag = false;

$usercode = $_SESSION['userid'];
$page=  mysqli_real_escape_string($conn,$_REQUEST['pageno']);

	
$sql1 = "SELECT course_id FROM ".$prefix."course WHERE course_number = '$page'";
$result1 =  $conn->query($sql1) or die(mysqli_error($conn));
$row1 = $result1->fetch_array();

$courseid= $row1['course_id'];

$sql2="SELECT ".$prefix."user.id, ".$prefix."user.usercode, ".$prefix."tests.test_number, ".$prefix."tests.student_id, ".$prefix."tests.course_id FROM ".$prefix."tests LEFT JOIN ".$prefix."user ON ".$prefix."tests.student_id = ".$prefix."user.id WHERE ".$prefix."user.usercode='$usercode' AND djfk_tests.course_id = '$courseid' AND ".$prefix."tests.test_number = '$page'";

$result2 =  $conn->query($sql2) or die(mysqli_error($conn));

$rown=$result2->fetch_array();

if(!$rown["test_number"]>=$page){
	$responses= array("0","false");
	header("Content-type: application/json");

	echo json_encode($responses);
}

return;





?>