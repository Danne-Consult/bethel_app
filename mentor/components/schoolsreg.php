<?php
   ob_start();
    session_start();
    session_regenerate_id();
	$new_sessionid = session_id();
	require '../../manager/config/_database/database.php';
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$schoolnamex = mysqli_real_escape_string($conn,$_POST['schoolnamex']);
		
		$registrarid= $_SESSION['userid'];
				
		$sql1="SELECT mentor_id FROM ".$prefix."mentor WHERE usercode='$registrarid'";
		$result1 =  $conn->query($sql1);
		$rws1 =  $result1->fetch_array();
		
		$sql="INSERT INTO ".$prefix."schools(schoolname, enterby) VALUES ('$schoolnamex','$rws1[0]')";
		$conn->query($sql);
				
		header("location: ../schools.php?status=success");
	}else{
		header("location: ../schools.php?error=unable to register school. Contact the administrator");
	}
	
?>