<?php
   ob_start();
    session_start();
    session_regenerate_id();
	$new_sessionid = session_id();
	require '../manager/config/_database/database.php';
	
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
		
    if($_SERVER["REQUEST_METHOD"] == "POST") {
		 if(isset($_POST['regperson'])) {
			 if($_POST['formtype']=='stud') {
			 
				$namex=mysqli_real_escape_string($conn,$_POST['namex']);
				$emailx=mysqli_real_escape_string($conn,$_POST['emailx']);
				$genderx=mysqli_real_escape_string($conn,$_POST['genderx']);
				$datebirthx=mysqli_real_escape_string($conn,$_POST['datebirthx']);
				$countyx=mysqli_real_escape_string($conn,$_POST['countyx']);
				$inschoolx=mysqli_real_escape_string($conn,$_POST['inschoolx']);
				$edulevel=mysqli_real_escape_string($conn,$_POST['edulevel']);
				$schoolname=mysqli_real_escape_string($conn,$_POST['schoolname']);
				$schoolloc=mysqli_real_escape_string($conn,$_POST['schoolloc']);
				$progprev=mysqli_real_escape_string($conn,$_POST['progprev']);
				$progby=mysqli_real_escape_string($conn,$_POST['progby']);
				$yesprogprev=mysqli_real_escape_string($conn,$_POST['yesprogprev']);
				$howdidyou=mysqli_real_escape_string($conn,$_POST['howdidyou']);
				$repasswordx=mysqli_real_escape_string($conn,$_POST['repasswordx']);
				$usertype=mysqli_real_escape_string($conn,$_POST['formtype']);
							
				date_default_timezone_set("Africa/Nairobi");
				$currdatetime= date("y-m-d h:i:s");
		
				$password= base64_encode(hash('sha256',$repasswordx));
				
				$randstr = generateRandomString();
				
				$sql="INSERT INTO ".$prefix."user (username,email,password,gender,dateofbirth,county,inschool,schoollevel,schoolname.schoolloc,progprev,progby,yesprogprev,howdidyou,usercode,user_type) VALUES ('$namex','$emailx','$password','$genderx','$datebirthx','$countyx','$inschoolx','$edulevel','$schoolloc','$progprev','$progby','$yesprogprev','$howdidyou','$randstr','$usertype')";
				$conn->query($sql);
				
				$sql2="SELECT * FROM ".$prefix."user WHERE email='$emailx'";
				$result =  $conn->query($sql2);
				$trws = mysqli_num_rows($result);
				if($trws==1){
					$rws =  $result->fetch_array();
					$_SESSION['userid']=$rws['usercode'];
					$_SESSION['username'] = $rws['username'];
					$_SESSION['usertype'] = $rws['user_type'];
					$_SESSION['lastlogintime'] = time();
					
						if(!$_SESSION['userid'] == ""){
							$sqlx= "UPDATE ".$prefix."user SET lastlogintime='$currdatetime' WHERE email='$emailx'";
							$conn->query($sqlx);
							
							header("location:../index.php?status=Registration successful");  	  
						}else{
							header("location: ../register.php?error=unable to register user. Contact the administrator");
						}
					}
					else {
					
						header("location: ../register.php?error=unable to register user. Contact the administrator");
						exit();
				}
			}
			if($_POST['formtype']=='ment') {
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
				$randstr = generateRandomString();
				$schools = preg_split("/,/", $schoolnamesx);
				
				$sql="INSERT INTO ".$prefix."mentor (username,email,mentor_tel,mentor_gender,mentor_dateofbirth,mentor_county,progprev,progby,yesprogprev,howdidyou,password,usercode,user_type) VALUES ('$namex','$emailx','$telx=','$genderx','$datebirthx','$countyx','$progprev','$progby','$yesprogprev','$howdidyou','$password','$randstr','$usertype')";
			
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
				
				if($trws==1){
					$_SESSION['userid']=$rws['usercode'];
					$usecode =$rws['usercode'];
					$_SESSION['username'] = $rws['mentor_name'];
					$_SESSION['usertype'] = $rws['user_type'];
					$_SESSION['lastlogintime'] = time();
					
						if(!$_SESSION['userid'] == ""){
							$sqlx= "UPDATE ".$prefix."mentor SET lastlogintime='$currdatetime' WHERE usercode='$usecode'";
						
							$conn->query($sqlx);
						
							header("location:../index.php?status=Registration successful");  	  
						}else{
							header("location: ../register.php?error=unable to register user. Contact the administrator");
						}
					}
					else {
						
						header("location: ../register.php?error=unable to register user. Contact the administrator");
						exit();
				}
				
				
				
			}
        }
		$conn->close();
    }else{
		 header("location: ../register.php?error=unable to register user. Contact the administrator");
	}
?>