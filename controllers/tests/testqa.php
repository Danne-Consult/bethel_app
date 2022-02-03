<?php

$quest = "controllers/tests/questions". $testnum .".txt";
$answ = "controllers/tests/an". $testnum .".txt";
$usercode = $_SESSION['userid'];

// Read answerkey.txt file for the answers to each of the questions.
function readAnswerKey($filename) {
	$answerKey = array();
	
	// If the answer key exists and is readable, read it into an array.
	if (file_exists($filename) && is_readable($filename)) {
		$answerKey = file($filename);
	}
	
	return $answerKey;
}


// Read the questions file and return an array of arrays (questions and choices)
// Each element of $displayQuestions is an array where first element is the question 
// and second element is the choices.

function readQuestions($filename) {
	$displayQuestions = array();
	
	if (file_exists($filename) && is_readable($filename)) {
		$questions = file($filename);
	
		// Loop through each line and explode it into question and choices
		foreach ($questions as $key => $value) {
			$displayQuestions[] = explode("|",$value);
		}				
	}
	else { echo "Error finding or reading questions file."; }
	
	return $displayQuestions;
}


// Take our array of exploded questions and choices, show the question and loop through the choices.
function displayTheQuestions($questions) {
	if (count($questions) > 0) {
		foreach ($questions as $key => $value) {
			echo "<b>$value[0]</b><br/><br/>";
			
			// Break the choices appart into a choice array
			$choices = explode(",",$value[1]);
			
			// For each choice, create a radio button as part of that questions radio button group
			// Each radio will be the same group name (in this case the question number) and have
			// a value that is the first letter of the choice.
			
			foreach($choices as $value) {
				$letter = substr(trim($value),0,1);
				echo "<input type=\"radio\" name=\"$key\" value=\"$letter\">$value<br/>";
			}
			
			echo "<br/>";
		}
	}
	else { echo "No questions to display."; }
}


// Translates a precentage grade into a letter grade based on our customized scale.
function translateToGrade($percentage) {

	if ($percentage >= 90.0) { return "A"; }
	else if ($percentage >= 80.0) { return "B"; }
	else if ($percentage >= 70.0) { return "C"; }
	else if ($percentage >= 60.0) { return "D"; }
	else { return "F"; }
}

?>

<h2><?php echo ucfirst($testtype); ?>-Test</h2>
<h4>Please complete the following questions as accurately as possible.</h4>

<form method="POST" class="contactForm" action="<?php echo $_SERVER["PHP_SELF"]."?tn=".$testnum."&tt=".$testtype; ?>">

<?php
	// Load the questions from the questions file
	$loadedQuestions = readQuestions($quest);
	
	// Display the questions
	displayTheQuestions($loadedQuestions);
?>

<input type="submit" class="submit" name="submitquiz" value="Submit Test"/>


<?php

// This grades the quiz once they have clicked the submit button
if (isset($_POST['submitquiz'])) {

	// Read in the answers from the answer key and get the count of all answers.
	$answerKey = readAnswerKey($answ);
	$answerCount = count($answerKey);
	$correctCount = 0;
	$usercode = $_SESSION['userid'];

	// For each answer in the answer key, see if the user has a matching question submitted
	foreach ($answerKey as $key => $keyanswer) {
		if (isset($_POST[$key])) {
			// If the answerkey and the user submitted answer are the same, increment the 
			// correct answer counter for the user
			if (strtoupper(rtrim($keyanswer)) == strtoupper($_POST[$key])) {
				$correctCount++;
			}
		}
	}


	// Now we know the total number of questions and the number they got right. So lets spit out the totals.
	echo "<br/><br/>Total Questions: $answerCount<br/>";
	echo "Number Correct: $correctCount<br/><br/>";
	
	$sqlcourse="SELECT course_id FROM ".$prefix."course WHERE course_number = '$testnum'";
	$resultcourse = $conn->query($sqlcourse);
	$rowcourse = $resultcourse->fetch_array();
	$course = $rowcourse["course_id"];
		
	$sqlstudent="SELECT id FROM ".$prefix."user WHERE usercode = '$usercode'";
	$resultstudent = $conn->query($sqlstudent);
	$rowstudent = $resultstudent->fetch_array();
	$student = $rowstudent["id"];
	
	$sqltest= "SELECT * FROM ".$prefix."tests WHERE student_id='$student'";
	$resulttests = $conn->query($sqltest);
	$rowtest = $resulttests->num_rows;

	if ($answerCount > 0) {

		// If we had answers in the answer key, translate their score to percentage
		// then pass that percentage to our translateGrade function to return a letter grade.
		$percentage = round((($correctCount / $answerCount) * 100),1);
		//echo "Total Score: $percentage% (Grade: " . translateToGrade($percentage) . ")<br/>";
		
		if($testtype=='post'){
	
			if($rowtest==1){
				$sqltest1="UPDATE ".$prefix."tests SET posttotal= '$percentage' WHERE student_id = '$student'";
				$resultstudent = $conn->query($sqltest1);
				header("location: index.php?status=complete");
			}
		}else{
			$sqltest="INSERT INTO ".$prefix."tests (test_number,student_id,course_id,pretotal) VALUES('$testnum','$student','$course','$percentage')";
			$resultstudent = $conn->query($sqltest);
			header("location: course.php?course=".$testnum."&status=success");
		}

		
	}
	else {
		if(!$testtype=='post'){
			if($rowtest==1){
				$sqltest1="UPDATE ".$prefix."tests SET posttotal= '$percentage' WHERE student_id = '$student'";
				$conn->query($sqltest1);
				
				$sqltest2="UPDATE ".$prefix."user SET levelon = '$testnum'";
				$conn->query($sqltest2);

				header("location: index.php?status=complete");
			}
		}else{
			$sqltest="INSERT INTO ".$prefix."tests (test_number,student_id,course_id,pretotal) VALUES('$testnum','$student','$course','$percentage')";
			$resultstudent = $conn->query($sqltest);
			header("location: course.php?course=".$testnum."&status=success");
		}

		}
	
	}
	

?>

</form>