<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
		session_start();

		 if(isset($_POST['login_btn'])) {
			require '../manager/config/_database/database.php';
			date_default_timezone_set("Africa/Nairobi");
			$currdatetime= date("y-m-d h:i:s");
			
			$errmsg_arr = array();
			$errflag = false;
			$username=  mysqli_real_escape_string($conn,$_POST['username']);
			$password=  mysqli_real_escape_string($conn,$_POST['passentry']);
			if($username == '') {
				$errmsg_arr[] = 'Username missing';
				$errflag = true;
			}
			if($password == '') {
				$errmsg_arr[] = 'Password missing';
				$errflag = true;
			}
			if($errflag) {
				header("location: ../login.php?error=missing username and password");
				exit();
			}
			
			$password= base64_encode(hash('sha256',$password));
			
			$sql="SELECT * FROM (SELECT user_type, password, username, email, usercode, shortname FROM ".$prefix."user UNION SELECT user_type, password,username,email, usercode, shortname FROM ".$prefix."mentor) AS u WHERE u.email='$username' OR u.shortname='$username'";
			$result =  $conn->query($sql);
			$rws =  $result->fetch_array();
			$trws = mysqli_num_rows($result);
			
			if($rws['password'] == $password){
				
				$_SESSION['userid']=$rws['usercode'];
				$_SESSION['usertype']=$rws['user_type'];
				$_SESSION['username'] = $rws['username'];
				$_SESSION['lastlogintime'] = time();
				
					if(!$_SESSION['userid'] == ""){
						if($rws['user_type']=="stud"){
							$sqlx= "UPDATE ".$prefix."user SET lastlogintime='$currdatetime' WHERE email='$username'";
							$conn->query($sqlx);
						}
						if($rws['user_type']=="ment"){
							$sqlx= "UPDATE ".$prefix."mentor SET lastlogintime='$currdatetime' WHERE email='$username'";
							$conn->query($sqlx);
						}
						
						header("location:../index.php?login-status=success");  	  
					}else{
						header("location: ../login.php?error=unable to verify user. Contact the administrator");
					}
				}else {
				$errmsg_arr[] = 'User name or Password incorrect';
				$errflag = true;
				if($errflag) {
                header("location: ../login.php?error=wrong username and password");
                exit();
            }
        }
		$conn->close();
    }else{
		header("location: ../login.php?error=try again");
	}
}
?>