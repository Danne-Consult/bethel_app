<?php 

$sqlx = "SELECT course_id,course_number,course_title FROM ".$prefix."course";
$resultx = $conn->query($sqlx) or die(mysqli_error($conn)); 

if($rowx = $resultx->num_rows == 0){
		echo "<p>No Courses Added!</p>";
}else{
	echo"<table id='datable' class='display'>
	<thead>
	<tr>
		<th>Session Number</th>
		<th>Session Name</th>
		<th>Update Record</th>
	</tr>
	</thead>
	<tbody>";
	
	while($rowx = $resultx->fetch_assoc()){
	echo "<tr>
			<td>".$rowx['course_number']."</td>
			<td>".$rowx['course_title']."</td>
			<td><a href='update-course.php?coursenumber=".$rowx['course_id']."'><i class='fa fa-edit' aria-hidden='true'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class='delete' title='Delete' href='components/deletecourse.php?coursenumber=".$rowx['course_id']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td></td>
			</tr>";
	};
	
	echo "</tbody></table>";
	$conn->close();
}
?>