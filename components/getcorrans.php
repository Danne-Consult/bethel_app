<?php 

include '../manager/config/_database/database.php';
$ansid= $_POST['ansid'];

$sql= "SELECT id, question, questiontype, correct_ans FROM ".$prefix."questions WHERE id = '$ansid'";
$result =  $conn->query($sql) or die(mysqli_error($conn));
$row = $result->fetch_array();

$boxcont = '<div class="quest" style="color: #cc1717;"><b>Correct answers to failed questions</b><br /><br /><b><i>'.$row['question'].'</i></b><br /><i><b>Answer:&nbsp;</b>'.$row['correct_ans'].' </i><br /></div>';

echo $boxcont;

$conn->close();

?>