<?php 

$sqlx = "SELECT * FROM ".$prefix."user";
$resultx =  $conn->query($sqlx);

if($resultx->num_rows == 0){
		echo "<p>No Users Added!</p>";
}else{
	echo"<table id='datable' class='display'>
	<thead>
	<tr>
		<th>Full Names</th>
		<th>Email</th>
		<th>View record</th>
		<th>Update/Delete</th>
	</tr>
	</thead>
	<tbody>";
	
	while($rowx = $resultx->fetch_array()){
	echo "<tr>
			<td>".$rowx['username']."</td>
			<td>".$rowx['email']."</td>
			<td><a title='View' href='view-user.php?userid=".$rowx['id']."'><i class='fa fa-eye' aria-hidden='true'></i></a></td>
			<td><a title='Update' href='update-user.php?user=".$rowx['id']."'><i class='fa fa-edit' aria-hidden='true'></i></a> &nbsp;&nbsp;&nbsp;&nbsp;<a class='delete' title='Delete' href='components/deleteuser.php?user=".$rowx['id']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
			</tr>";
	};
	
	echo "</tbody></table>";
}
$conn->close();
?>