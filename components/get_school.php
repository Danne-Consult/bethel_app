<?php
include '../manager/config/_database/database.php';

if (isset($_POST['school'])) {

	$output = "";
	$school = $_POST['school'];
	$sql = "SELECT * FROM ".$prefix."schools WHERE schoolname LIKE '%$school%'";
	$result = $conn->query($sql) or die(mysqli_error($conn));

	$output = '<ul class="list-unstyled">';		

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_array()) {
			$output .= '<li>'.ucwords($row['schoolname']).'</li>';
		}
	}else{
		  $output .= '<li>School not Found</li>';
	}
	
	$output .= '</ul>';
	echo $output;

}
?>