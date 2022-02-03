<?php
	
	ob_start();
 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
	if($_SESSION['userid']==""){
        header("location:login.php?session=notset");
    }
	
	session_regenerate_id();
	$new_sessionid = session_id();
	require 'config/_database/database.php';
	$userid = $_SESSION['userid'];
	

	$_SESSION['KCFINDER'] = array(
		'disabled' => false
	);
?>

