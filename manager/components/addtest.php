<?php
    if(isset($_REQUEST['addassignment'])){

		include '../config/_database/database.php';
		
		$thematinum = $_POST["thematicarea"];
		$section = $_POST["section"];
		$questtype = $_POST["qtype"];
		$question = $_POST["question"];
		$answers = $_POST["answers"];
		$correctans = $_POST["correctans"];
		$comments = $_POST["comments"];

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