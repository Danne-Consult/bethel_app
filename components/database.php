<?php
    $hostname = "localhost";
    $user = "patwambu_David";
    $password = "akgis21";
    $database = "patwambu_akgis";
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