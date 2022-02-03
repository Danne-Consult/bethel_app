<?php 
session_start();
require '../manager/config/_database/database.php';
date_default_timezone_set("Africa/Nairobi");
$currdatetime = date("y-m-d h:i:s");

if(isset($_SESSION['username'])){

	$chatmsg= mysqli_real_escape_string($conn,$_REQUEST['chatmsg']);
	$username = $_SESSION['username'];
	
	$sql="INSERT INTO ".$prefix."chatbooth (chat_username, chat_message,chat_time) VALUES ('$username','$chatmsg','$currdatetime')";
	$conn->query($sql) or die(mysqli_error($conn));
	
	$sql2="SELECT ".$prefix."chatbooth.chat_username, ".$prefix."chatbooth.chat_message, ".$prefix."chatbooth.chat_time, ".$prefix."user.usercode FROM ".$prefix."chatbooth LEFT JOIN ".$prefix."user ON ".$prefix."user.username = ".$prefix."chatbooth.chat_username  ORDER BY chat_time ASC";

	$resultchat = $conn->query($sql2) or die(mysqli_error($conn));
	while($rowx = $resultchat->fetch_array()){
	
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