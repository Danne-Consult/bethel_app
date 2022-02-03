<?php 

include '../manager/config/_database/database.php';
$questid= $_POST['qestid'];
$questval= $_POST['questval'];

$sql= "SELECT correct_ans, comments FROM ".$prefix."questions WHERE id = '$questid'";
$result =  $conn->query($sql) or die(mysqli_error($conn));
$row = $result->fetch_array();



if(trim($questval) !== $row['correct_ans']){
	
	$boxcont = "<i><b>Correct answer:</b> ". $row['correct_ans'] ." </i><br />";
}
if($row['comments'] !==""){
	$boxcont .="<p><i>". $row['comments'] ."</i></p>";
}

$return_arr[] = array('questid'=>$questid,'anscont'=>$boxcont,'answer'=>trim($questval),'corrans'=>$row['correct_ans'],'status'=>'success');

header("Content-Type: application/json");
echo json_encode($return_arr);

$conn->close();



?>