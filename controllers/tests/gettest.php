<?php


function getQuestAns($thematic,$section,$userid,$usertype){
	
	include 'manager/config/_database/database.php';
	$sql= "SELECT id, question, questiontype, answers FROM ".$prefix."questions WHERE question_part = '$section' AND thematicnum = '$thematic'";
	$result =  $conn->query($sql) or die(mysqli_error($conn));
	$rownums = $result->num_rows;
	
	if(!$rownums==0){

		$sqlsec= "SELECT * FROM ".$prefix."questions WHERE thematicnum = '$thematic' ORDER BY question_part DESC LIMIT 1";
		$resultsec =  $conn->query($sqlsec) or die(mysqli_error($conn));
		$rowsec = $resultsec->fetch_array();
	
	$questan = "<div class='testbx'><form class='contactForm' id='quizform'><input type='hidden' id='themno' name='themeno' value='".$thematic."' /><input type='hidden' id='secno' name='section' value='".$section."' />
	<input type='hidden' id='usertype' name='usertype' value='".$usertype."' /><input type='hidden' id='userid' name='userid' value='".$userid."' />";
	
	if($thematic == $rowsec['thematicnum'] && $section==$rowsec['question_part']){
		$questan .="<input type='hidden' id='lasttest' name='lastest' value='1' />";
	}

	
	
	while($row = $result->fetch_array()){
		$questan .= "<div class='questbox'><b>". $row['question'] . "</b></div>";


		if($row['questiontype']=="radio"){
			
			$answers= explode("~" , $row['answers']);
			$keyid = $row['id'];
		
			foreach ($answers as $value) {
			//$displayQuestions[] = explode("|",$value);
			//$letter = substr(trim($value),0,1);
			$questan .= "<div class='answ'><label><input class='getans' style='float:left' type='radio' name='".$keyid."' value='".$value."'> ".$value."</label></div>";
			}	
		}
		
		if($row['questiontype']=="checkboxes"){
			
			$answers= explode("~", $row['answers']);
			$keyid = $row['id'];

			$questan .="<i style='font-size:12px;'>Select multiple</i> <br />";
		
			foreach ($answers as $value) {
			//$displayQuestions[] = explode("|",$value);
			//$letter = substr(trim($value),0,1);
			
			$questan .= "<br /><div class='answ'><label><input style='float:left' type='checkbox' name='".$keyid."' value='".$value."'> ".$value."</label></div>";
			}	
		}
		
		if($row['questiontype']=="inputtext"){
			
			$keyid = $row['id'];
			$questan .= "<div class='answ'><textarea name='".$keyid."'></textarea></div>";
			
		}
		
		$questan .= "<div class='bx-".$row['id']." answerbx'></div>";
	}

	$questan .= "<br /><button class='submit' type='button' id='shownext'>Submit</button></form></div>";
	$questan .="<br /><div class='score'></div><div class='correctans'></div><div id='nextbox-".$section."' style='margin:3em 0px'></div>";
	return $questan;
	}
	
	if($rownums==0){
		$secnext = $section + 1; 
		$nextbtn = "<p><br /><button type='button' class='nextbtn' id='nextsec' boxshow='secbx". $secnext ."'>Next</button></p>";
		return $nextbtn;
	}
}

function readAnswerKey() {
	
	$usercode = $_SESSION['userid'];
	$answerKey = array();
	
	// If the answer key exists and is readable, read it into an array.
	if (file_exists($filename) && is_readable($filename)) {
		$answerKey = file($filename);
	}
	
	return $answerKey;
}

?>