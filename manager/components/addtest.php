<?php
    if(isset($_REQUEST['addassignment'])){

		include '../config/_database/database.php';
		
		$thematinum = mysqli_real_escape_string($conn,$_POST["thematicarea"]);
		$section = mysqli_real_escape_string($conn,$_POST["section"]);
		$questtype = mysqli_real_escape_string($conn,$_POST["qtype"]);
		$question = mysqli_real_escape_string($conn,$_POST["question"]);
		$answers = mysqli_real_escape_string($conn,$_POST["answers"]);
		$correctans = mysqli_real_escape_string($conn,$_POST["correctans"]);
		$comments = mysqli_real_escape_string($conn,$_POST["comments"]);

		$numques = count($question);
		
		for($i=0;$i<$numques;$i++)
			 {
			  if($questtype[$i]!="" && $question[$i]!="")
			  {
				  $questype = $questtype[$i];
				  $quest = $question[$i];
				  $ans = $answers[$i];
				  $corr = $correctans[$i];  
				  $comm = $comments[$i];  
				  
				$sql = "INSERT INTO ".$prefix."questions (thematicnum,question_part,question,questiontype,answers,correct_ans,comments,status) VALUES ('$thematinum','$section','$quest','$questype','$ans', '$corr','$comm','')";
				
				$conn->query($sql) or die(mysqli_error($conn));
			  }
			 }
		
		header('Location: ../tests.php?status=success');
		
		$conn->close();
		
    }
?>