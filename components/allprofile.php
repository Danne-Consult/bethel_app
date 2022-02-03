<?php 
	if(!empty(mysqli_real_escape_string($conn,$_REQUEST['u']))){
		
	$usercode= mysqli_real_escape_string($conn,$_REQUEST['u']);	
		
	$sqluser = "SELECT username, organization, aboutme, avatar, levelon FROM ".$prefix."user WHERE usercode='$usercode'";
	$resultuser = $conn->query($sqluser);
	$rowluser = $resultuser->fetch_array();
	}else{
		
	}
?>