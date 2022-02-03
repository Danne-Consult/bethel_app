
<?php 
	$page =  mysqli_real_escape_string($conn,$_REQUEST['test']);

	include "controllers/tests/test-".$page.".php";
		
?>