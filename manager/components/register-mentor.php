<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
		include '../config/_database/database.php';
		
		$namex=mysqli_real_escape_string($conn,$_POST['namex']);
		$emailx=mysqli_real_escape_string($conn,$_POST['emailx']);
		$telx=mysqli_real_escape_string($conn,$_POST['telx']);
		$genderx=mysqli_real_escape_string($conn,$_POST['genderx']);
		$datebirthx=mysqli_real_escape_string($conn,$_POST['datebirthx']);
		$countyx=mysqli_real_escape_string($conn,$_POST['countyx']);
		$schoolnamesx=mysqli_real_escape_string($conn,$_POST['schoolnames']);
		$progprev=mysqli_real_escape_string($conn,$_POST['progprev']);
		$progby=mysqli_real_escape_string($conn,$_POST['progby']);
		$yesprogprev=mysqli_real_escape_string($conn,$_POST['yesprogprev']);
		$howdidyou=mysqli_real_escape_string($conn,$_POST['howdidyou']);
		$repasswordx=mysqli_real_escape_string($conn,$_POST['repasswordx']);
		$usertype=mysqli_real_escape_string($conn,$_POST['formtype']);
				
		date_default_timezone_set("Africa/Nairobi");
		$currdatetime= date("y-m-d h:i:s");
		
		$password= base64_encode(hash('sha256',$repasswordx));
		
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
		$schools = preg_split("/,/", $schoolnamesx);
		
		$sql="INSERT INTO ".$prefix."mentor (username,email,mentor_tel,mentor_gender,mentor_dateofbirth,mentor_county,progprev,progby,yesprogprev,howdidyou,password,usercode,user_type) VALUES ('$namex','$emailx','$telx=','$genderx','$datebirthx','$countyx','$progprev','$progby','$yesprogprev','$howdidyou','$password','$randstr','$usertype')";
			
		echo $sql;
		$conn->query($sql);
		
		$sql2="SELECT * FROM ".$prefix."mentor WHERE email='$emailx'";
		echo $sql2;
		$result = $conn->query($sql2);
		$rws =  $result->fetch_array();
		$trws = mysqli_num_rows($result);
		
		foreach ($schools as $value) {
			$value = trim($value);
			$sql3 = "INSERT INTO ".$prefix."schools (schoolname,enterby)
			VALUES ('$value', '$rws[0]')";
			$conn->query($sql3);	
		}
		
		$conn->close();
		header("location:../register-mentor.php?status=Registration successful");
    }
?>