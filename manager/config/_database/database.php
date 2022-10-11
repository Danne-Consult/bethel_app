<?php
    $hostname = "localhost";
    $user = "root";
    $password = "root";
    $database = "bethel_old";
    $prefix = "djfk_";
	
	// Create database connection
	/* $db = new mysqli($hostname,$user,$password,$database);

	// Check connection
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	} */

    $conn = new mysqli($hostname,$user,$password,$database);
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
?>