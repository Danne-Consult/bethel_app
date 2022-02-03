<?php 

$sqlx = "SELECT ".$prefix."course.course_id, ".$prefix."course.course_number, ".$prefix."assignments.assignment_id, ".$prefix."assignments.course_id FROM ".$prefix."assignments LEFT JOIN ".$prefix."course ON ".$prefix."assignments.course_id = ".$prefix."course.course_id";

$resultx =  $conn->query($sqlx) or die(mysqli_error($conn));

$rownums=$resultx->num_rows;

if($rownums== 0){
		echo "<p>No Assignments Added!</p>";
}else{
	echo"<table id='datable' class='display'>
	<thead>
	<tr>
		<th>Thematic Area</th>
		<th>Update/Delete</th>
	</tr>
	</thead>
	<tbody>";
	
	while($rowx = $resultx->fetch_array()){
	echo "<tr>
			<td>Thematic Area - ".$rowx['course_number']."</td>
			<td><a title='Update' href='update-assignment.php?ass=".$rowx['assignment_id']."'><i class='fa fa-edit' aria-hidden='true'></i></a> &nbsp;&nbsp;&nbsp;&nbsp;<a class='delete' title='Delete' href='components/deleteassignment.php?ass=".$rowx['assignment_id']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
			</tr>";
	};
	
	echo "</tbody></table>";
}
$conn->close();
?>