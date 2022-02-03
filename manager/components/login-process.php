<?php
ob_start();
 
session_start();
    if(isset($_REQUEST['login_button'])){
        include '../config/_database/database.php';
		date_default_timezone_set("Africa/Nairobi");
		$currdatetime= date("y-m-d h:i:s");
		
        $errmsg_arr = array();
        $errflag = false;
        $username=  mysqli_real_escape_string($conn,$_REQUEST['username']);
        $password=  mysqli_real_escape_string($conn,$_REQUEST['passentry']);
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
		
        $sql="SELECT * FROM ".$prefix."manager_users WHERE username='$username' AND password='$password'";
		
        $result =  $conn->query($sql) or die(mysqli_error($conn));
        $trws = $result->num_rows;
        if($trws==1){
            $rws =  $result->fetch_array();
            $_SESSION['userid']=$rws['id'];
            $_SESSION['usertype']=$rws['usertype'];
		
				if(!$_SESSION['userid'] == ""){
					$sqlx= "UPDATE ".$prefix."manager_users SET lastlogintime='$currdatetime' WHERE username='$username'";
					$conn->query($sqlx) or die(mysqli_error($conn));
					
					header("location:../index.php?login-status=success");  	  
				}else{
					header("location: ../login.php?error=unable to verify user.");
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
    }
?>