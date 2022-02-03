<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php 
	$user= mysqli_real_escape_string($conn,$_REQUEST['user']);

	$sqly = "SELECT * FROM ".$prefix."user WHERE id='$user'";
	$resulty = $conn->query($sqly); 
?>
<body class="inner">
<div class="pagecont">
	<?php include 'controllers/navigation/innernav.php' ?>
	<div class="container12 cont-box">
		<article>
			<div class="row">
				<div class="col-md-7">
					<h3>Update User</h3>
					<?php
							if($resulty->num_rows == 0){
									echo "<p>No course found!</p>";
							}else{
							
								$rowy = $resulty->fetch_assoc();
								
					?>
					<form class="contactForm" action="components/update_user.php" method="post" name="updateform">
						<input type="hidden" name="user" value="<?php echo $user ?>" />
						<p>User name: <b><?php echo $rowy['username']?></b><br>
						Email: <b><?php echo $rowy['email']?></b><br>
						</p>
						<br />
						<div class="row">
							<div class="col-md-6"><input type="text" name="userfullname" value="<?php echo $rowy['username']?>" placeholder="User Full Name" /></div>
							<div class="col-md-6"><input type="email" name="emailadd" value="<?php echo $rowy['email']?>" placeholder="Email" /></div>
						
							<div class="col-md-6"><input type="password" name="userpassword" placeholder="password" /></div>
						</div>
						<div class="row">
							<div class="col-md-6"><button type="submit" name="updateuser" class="submit">Update User</button>&nbsp;&nbsp; <a class="delete" style="text-decoration:underline;" href="components/deleteuser.php?user=<?php echo $user ?>">delete Record</a></div>
						</div>
					</form>
							<?php } ?>
				</div>
				<div class="col-md-5">
					<h4>Users List</h4>
					<?php include 'controllers/lists/userlist.php' ?>
				</div>
			</div>
		</article>
	</div>
	<div class="container12"><article><hr /></article></div>
	
	<?php include 'controllers/base/footer.php' ?>
	<?php include 'controllers/base/scripts.php' ?>

</body>
</html>