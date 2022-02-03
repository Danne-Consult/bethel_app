<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
		session_start();
		include '../config/_database/database.php';

			$namex=mysqli_real_escape_string($conn,$_POST['namex']);
			$emailx=mysqli_real_escape_string($conn,$_POST['emailx']);
			$genderx=mysqli_real_escape_string($conn,$_POST['genderx']);
			$datebirthx=mysqli_real_escape_string($conn,$_POST['datebirthx']);
			$countyx=mysqli_real_escape_string($conn,$_POST['countyx']);
			$inschoolx=mysqli_real_escape_string($conn,$_POST['inschoolx']);
			$edulevel=mysqli_real_escape_string($conn,$_POST['edulevel']);
			$repasswordx=mysqli_real_escape_string($conn,$_POST['repasswordx']);
     
		$userpassword= base64_encode(hash('sha256',$repasswordx));
		
		function generateRandomString($length = 10) {
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$randomString = '';
				for ($i = 0; $i < $length; $i++) {
					$randomString .= $characters[rand(0, $charactersLength - 1)];
				}
				return $randomString;
		}
		$randstr = generateRandomString();

		
		$sql1="SELECT email FROM ".$prefix."user WHERE email='$emailx'";
		$result =  $conn->query($sql1) or die(mysqli_error($conn));
		$row = $result->num_rows;
	
		if($row==1){	
			
			header('Location: ../register-user.php?status=Error:User Exists');
			exit();
			
		}else{
			$sql2="INSERT INTO ".$prefix."user (username,email,password,gender,dateofbirth,county,inschool,schoollevel,usercode) VALUES ('$namex','$emailx','$userpassword','$genderx','$datebirthx','$countyx','$inschoolx','$edulevel','$randstr' )";
			
			$conn->query($sql2) or die(mysqli_error($conn));
			
			header('Location: ../register-user.php?status=success');
		}
		$conn->close();
		
    }
?>