<?php 

session_start();
require '../manager/config/_database/database.php';

$usercode = $_SESSION['userid'];
$courseid=  mysqli_real_escape_string($conn,$_REQUEST['courseid']);
$answer = $_POST["answ"];


$sql = "SELECT answer FROM ".$prefix."testsquestions WHERE course_id='$courseid'";
$result = $conn->query($sql) or die(mysqli_error($conn));
$rowcount = $result->num_rows;
$row = $result->fetch_array();

$vals = array();
$arrayw = '';
$correctCount = 0;


	foreach ($answerKey as $key => $keyanswer) {
        if (isset($answer) {
            // If the answerkey and the user submitted answer are the same, increment the 
            // correct answer counter for the user
            if (strtoupper(rtrim($keyanswer)) == strtoupper($_POST[$key])) {
                $correctCount++;
            }
        }
    }


$correctCount++;
		/* $arrayw = [$row["answer"]];
		$arrayx = [$answer[$x]]; */


?>