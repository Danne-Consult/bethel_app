<?php 

$sqlass = "SELECT ".$prefix."assignment_submissions.id,".$prefix."assignment_submissions.datetime,".$prefix."assignment_submissions.subject, ".$prefix."course.course_number, ".$prefix."user.username From ".$prefix."assignment_submissions LEFT JOIN ".$prefix."course ON ".$prefix."assignment_submissions.course_id = ".$prefix."course.course_id LEFT JOIN ".$prefix."user ON ".$prefix."assignment_submissions.student_id = ".$prefix."user.id";

$resultass = $conn->query($sqlass) or die(mysqli_error($conn)); 



$rownums=$resultass->num_rows;

if($rownums== 0){
		echo "<p>No Assignments Added!</p>";
}else{
	echo"<table id='datable' class='display'>
	<thead>
	<tr>
		<th>Student Name</th>
		<th>Submission Date</th>
		<th>Thematic Area</th>
		<th>Subject</th>
		<th>View</th>
	</tr>
	</thead>
	<tbody>";
	
	while($rowx = $resultass->fetch_array()){
	echo "<tr>
			<td>".$rowx['username']."</td>
			<td>".$rowx['datetime']."</td>
			<td>".$rowx['course_number']."</td>
			<td>".$rowx['subject']."</td>
			<td><a href='assignment-submission.php?a=".$rowx['id']."'><i class='fa fa-eye' aria-hidden='true'></i></a></td>
			</tr>";
	};
	
	echo "</tbody></table>";
}

$conn->close();
?>