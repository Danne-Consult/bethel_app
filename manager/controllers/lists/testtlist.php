<?php 


$sqlx = "SELECT DISTINCT ".$prefix."questions.thematicnum, ".$prefix."course.course_number FROM ".$prefix."questions LEFT JOIN ".$prefix."course ON ".$prefix."questions.thematicnum = ".$prefix."course.course_id";
$resultx =  $conn->query($sqlx) or die(mysqli_error($conn));

$rownums=$resultx->num_rows;

if($rownums== 0){
		echo "<p>No tests Added!</p>";
}else{
	echo"<table id='datable' class='display'>
	<thead>
	<tr>
		<th>Session Number</th>
		<th>Update/Delete</th>
	</tr>
	</thead>
	<tbody>";
	
	while($rowx = $resultx->fetch_array()){
	echo "<tr>
			<td>Session - ".$rowx['course_number']."</td>
			<td><a title='Update' href='update-test.php?t=".$rowx['thematicnum']."'><i class='fa fa-edit' aria-hidden='true'></i></a> &nbsp;&nbsp;&nbsp;&nbsp;<a class='delete' title='Delete' href='components/deletetest.php?t=".$rowx['thematicnum']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
			</tr>";
	};
	
	echo "</tbody></table>";
}
$conn->close();
?>