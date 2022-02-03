
<?php 
		
	$sqllinks = "SELECT course_reference_links FROM ".$prefix."course WHERE course_number='$pageid'";
	
	$resultlinks = $conn->query($sqllinks);
	$rowlinks = $resultlinks->fetch_array();
	
	if(isset($rowlinks)){
		
		if(!empty($rowlinks['course_reference_links'])){
			echo $rowlinks['course_reference_links']."<br /></br />";
		}
		
	}
?>