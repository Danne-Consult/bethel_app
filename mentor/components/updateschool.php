<?php
    session_start();

if(isset($_POST['updateschool'])) {
	require '../../manager/config/_database/database.php';

	$schoolid = mysqli_real_escape_string($conn,$_POST['schoolid']);
	$schoolnamex = mysqli_real_escape_string($conn,$_POST['schoolnamex']);
	
	$registrarid= $_SESSION['userid'];
			
	$sql1="SELECT mentor_id FROM ".$prefix."mentor WHERE usercode='$registrarid'";
	$result1 =  $conn->query($sql1);
	$rws1 =  $result1->fetch_array();
	
	$sql="UPDATE ".$prefix."schools SET schoolname='$schoolnamex' WHERE id='$schoolid' AND enterby='$rws1[0]'";

	if($conn->query($sql)){	
		header("location: ../update-school.php?schoolid=".$schoolid."&success=School Updated!");
	}else{
		header("location: ../update-school.php?schoolid=".$schoolid."&error=Unable to Update school. Contact the administrator");
	}
}
	
?>