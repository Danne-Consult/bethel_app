<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
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
			
			$sql="SELECT * FROM (SELECT user_type, password, username, email, usercode FROM ".$prefix."user UNION SELECT user_type, password,username,email, usercode FROM ".$prefix."mentor) AS u WHERE u.email='$username' AND u.password='$password'";
			echo $sql;
			
			$result =  $conn->query($sql);
			$trws = mysqli_num_rows($result);
			if($trws==1){
				$rws =  $result->fetch_array();
				$_SESSION['userid']=$rws['usercode'];
				$_SESSION['usertype']=$rws['user_type'];
				$_SESSION['username'] = $rws['username'];
				$_SESSION['lastlogintime'] = time();
				
					if(!$_SESSION['userid'] == ""){
						if($rws['usertype']=="stud"){
							$sqlx= "UPDATE ".$prefix."user SET lastlogintime='$currdatetime' WHERE email='$username'";
							$conn->query($sqlx);
						}
						if($rws['usertype']=="ment"){
							$sqlx= "UPDATE ".$prefix."mentor SET lastlogintime='$currdatetime' WHERE email='$username'";
							$conn->query($sqlx);
						}
						
						header("location:../index.php?login-status=success");  	  
					}else{
						header("location: ../login.php?error=unable to verify user. Contact the administrator");
					}
				}
				else {
				$errmsg_arr[] = 'User name or Password incorrect';
				$errflag = true;
				if($errflag) {
                header("location: ../login.php?error=wrong username and password");
                exit();
            }
        }
		$conn->close();
    }else{
		 //header("location: ../login.php?error=try again");
	}}
?>