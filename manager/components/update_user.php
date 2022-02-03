<?php
if(isset($_REQUEST['updateuser'])||$_REQUEST['auto']==1){
	
	session_start();
	include '../config/_database/database.php';
	
	
	$userid = mysqli_real_escape_string($conn,$_REQUEST['user']);
	$user = mysqli_real_escape_string($conn,$_REQUEST['userfullname']);
	$email = mysqli_real_escape_string($conn,$_REQUEST['emailadd']);
	$userpassword = mysqli_real_escape_string($conn,$_REQUEST['userpassword']);
	
	$sql1="UPDATE ".$prefix."user SET username='$user', email='$email'  WHERE id='$userid'";	
	$conn->query($sql1);
	
	if(!$userpassword==""){

	$userpassword= base64_encode(hash('sha256',$userpassword));	
	
		$sql2="UPDATE ".$prefix."user SET password='$userpassword' WHERE id='$userid'";
		$conn->query($sql2);
	}
	
	header('Location: ../register-user.php?status=success');
	
	$conn->close();
	
}else{
	header('Location: ../register-user.php?status=Error:Record did not change');	
}
?>