<?php 
session_start();
require '../manager/config/_database/database.php';

if(isset($_SESSION['username'])){
	
	$sql2="SELECT ".$prefix."chatbooth.chat_username, ".$prefix."chatbooth.chat_message, ".$prefix."chatbooth.chat_time, ".$prefix."user.usercode FROM ".$prefix."chatbooth LEFT JOIN ".$prefix."user ON ".$prefix."user.username = ".$prefix."chatbooth.chat_username  ORDER BY chat_time ASC";

	$resultchat = $conn->query($sql2) or die(mysqli_error($conn));
	while($rowx = $resultchat->fetch_array()){
	//$chatarray= array("user" => $rowx["chat_username"],"msg" => $rowx["chat_message"],"time" => $rowx["chat_time"]);
	
	if($rowx["chat_username"]==$_SESSION['username']){
		$chatarray = '<div class="msgx mymsg">
						<div class="username"><a href="profile.php?u='.$rowx["usercode"].'">'.$rowx["chat_username"].'</a></div>
						<div class="msg">'.$rowx["chat_message"].'</div>
						<div class="timex">'.$rowx["chat_time"].'</div>
					</div>';
	
	}else{
		$chatarray = '<div class="msgx othermsg">
						<div class="username"><a href="profile.php?u='.$rowx["usercode"].'">'.$rowx["chat_username"].'</a></div>
						<div class="msg">'.$rowx["chat_message"].'</div>
						<div class="timex">'.$rowx["chat_time"].'</div>
					</div>';
	}
	
	echo $chatarray;
	
	}

	$conn->close();
}
?>