<?php
    session_start();
    if(isset($_post['regstudent'])) {
		require '../../manager/config/_database/database.php';
        date_default_timezone_set("Africa/Nairobi");
        $currdatetime= date("y-m-d h:i:s");

		function generateRandomString($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
			 
		$namex=mysqli_real_escape_string($conn,$_POST['namex']);
		$emailx=mysqli_real_escape_string($conn,$_POST['emailx']);
		$genderx=mysqli_real_escape_string($conn,$_POST['genderx']);
		$datebirthx=mysqli_real_escape_string($conn,$_POST['datebirthx']);
		$countyx=mysqli_real_escape_string($conn,$_POST['countyx']);
		$inschoolx=mysqli_real_escape_string($conn,$_POST['inschoolx']);
		$edulevel=mysqli_real_escape_string($conn,$_POST['edulevel']);
		$schoolname=mysqli_real_escape_string($conn,$_POST['schoolname']);
		
		$progprev=mysqli_real_escape_string($conn,$_POST['progprev']);
		$progby=mysqli_real_escape_string($conn,$_POST['progby']);
		$yesprogprev=mysqli_real_escape_string($conn,$_POST['yesprogprev']);
		$passwordx=mysqli_real_escape_string($conn,$_POST['passwordx']);
        $repasswordx=mysqli_real_escape_string($conn,$_POST['repasswordx']);
		$username=mysqli_real_escape_string($conn,$_POST['username']);
		$usertype='stud';
		
		$registrarid= $_SESSION['userid'];
		$sql1="SELECT mentor_id FROM ".$prefix."mentor WHERE usercode='$registrarid'";
		$result1 =  $conn->query($sql1);
		$rws1 =  $result1->fetch_array();

		$password="";
		if(isset($passwordx)){
            if(!$passwordx==$repasswordx){
                header("location: ../update-student.php?user=".$usercode."&error=passwordmissmatch");
            }
            $password= base64_encode(hash('sha256',$repasswordx));
        }
		
		$randstr = generateRandomString();
		
		$sql="INSERT INTO ".$prefix."user (username,email,password,gender,dateofbirth,county,inschool,schoollevel,schoolname,progprev,progby,yesprogprev,usercode,user_type,mentor, shortname) VALUES ('$namex','$emailx','$password','$genderx','$datebirthx','$countyx','$inschoolx','$edulevel','$schoolname','$progprev','$progby','$yesprogprev','$randstr','$usertype', '$rws1[0]', $username)";
		
		echo $sql;
		
		if($conn->query($sql)){
			header("location: ../students.php?success=Student added!");
		}else{
			header("location: ../students.php?error=unable to register user. Contact the administrator");
	}
	$conn->close();
}
?>