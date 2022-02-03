<?php 

$sqlx = "SELECT * FROM ".$prefix."course";
$resultx = $conn->query($sqlx) or die(mysqli_error($conn)); 
$rowx = $resultx->num_rows ;

if($rowx == 0){
		echo "<p>No Courses Added!</p>";
}else{
	
	echo "<div class='col-md-4 coursenum'>
			<div class='rowcount lavendar'>". $rowx . "<br /><span>Sessions</span></div>
		</div>";
};

$sqly= "SELECT * FROM ".$prefix."user";
$resulty = $conn->query($sqly) or die(mysqli_error($conn)); 
$rowy = $resulty->num_rows ;

if($rowy == 0){
		echo "<p>No Users Added!</p>";
}else{
	
	echo "<div class='col-md-4 usernum'>
			<div class='rowcount deepblue'>". $rowy . "<br /><span>Students</span></div>
		</div>";
};

$sqlz= "SELECT * FROM ".$prefix."mentor";
$resultz = $conn->query($sqlz) or die(mysqli_error($conn)); 
$rowz = $resultz->num_rows ;

if($rowz == 0){
		echo "<p>No Users Added!</p>";
}else{
	
	echo "<div class='col-md-4 usernum'>
			<div class='rowcount grey'>". $rowz . "<br /><span>Mentors</span></div>
		</div>";
};
	
?>