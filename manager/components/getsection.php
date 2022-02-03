<?php
    if(isset($_REQUEST['themeid'])){
		
		$thematinum = $_REQUEST['themeid'];
		
		include '../config/_database/database.php';
		$sql="SELECT * FROM ".$prefix."course WHERE course_id = '$thematinum'";
		$result =  $conn->query($sql);
		$row = $result->fetch_array();
		
		$coursetext= explode("||", $row['course_brief']);
		$coursetext= array_filter($coursetext);
		
		$arraycount = count($coursetext);
	
		
		$sectext = "";
		foreach($coursetext as $key => $value)
			{
				$coursetextdit= explode("/~",$value);	
					$seclist = "<option value='". $key ."'>". $coursetextdit[1] ."</option>";
					echo $seclist;
			}	
    }
?>