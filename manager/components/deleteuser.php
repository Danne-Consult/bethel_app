<?php
	session_start();
	include '../config/_database/database.php';
	
	$user = mysqli_real_escape_string($conn,$_REQUEST['user']);
    
	if(!$user ==""){
		
		$sql1 = "DELETE FROM ".$prefix."user WHERE id = '$user'";

		$conn->query($sql1);

		$conn->close();
		
		header("location: ../register-user.php");
    }else{
		header("location: ../updatecourse.php?error=User not found");
	};
?>