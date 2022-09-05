<?php
    session_start();
	
	if(isset($_POST['regschool'])) {

		require '../../manager/config/_database/database.php';
		$schoolnamex = mysqli_real_escape_string($conn,$_POST['schoolnamex']);
		
		$registrarid= $_SESSION['userid'];
				
		$sql1="SELECT mentor_id FROM ".$prefix."mentor WHERE usercode='$registrarid'";
		$result1 =  $conn->query($sql1);
		$rws1 =  $result1->fetch_array();
		
		$sql="INSERT INTO ".$prefix."schools(schoolname, enterby) VALUES ('$schoolnamex','$rws1[0]')";
				
		if($conn->query($sql)){	
			header("location: ../schools.php?success=School added!");
		}else{
			header("location: ../schools.php?error=Unable to add school. Contact the administrator");
		}
	}
	
?>