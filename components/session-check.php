<?php
	ob_start();
 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
	if($_SESSION['userid']==""){
        header("location:login.php?session=notset");
    }
	
	if(time() - $_SESSION['lastlogintime']> 10800){
		session_unset();
        session_destroy();       
		header("location:login.php?session=notset");
		exit;
	}else{
		$_SESSION['lastlogintime'] = time();
	}
	session_regenerate_id();
	$new_sessionid = session_id();
	require 'manager/config/_database/database.php';
	$current_user = $_SESSION['userid'];
?>