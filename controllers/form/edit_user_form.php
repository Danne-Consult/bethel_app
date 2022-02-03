<form action="components/update-user.php" method="post" class="contactForm useredit" enctype="multipart/form-data" id="UploadForm">
    <div class="row">
		<div class="col-md-5 aligncenter">
			<div class="profilepic" style="background:url(userfiles/avatars/<?php echo $row['avatar']; ?>)no-repeat center; background-size:cover;"></div>

			<div class="row">
				<div class="col-md-4 offset-md-4">
					<input type="file" name="ImageFile" data-style="zoom-in" />
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<h4>About Me</h4>
			<label for="mybio">A brief about me</label><br />
			<textarea rows="5" maxlength="300" name="mybio" id="mybio"><?php echo $row['aboutme']; ?></textarea><br />

			<h4>Change password</h4>
			<input type="password" name="pass1" id="password1" placeholder="Enter new password" /><br />
			<input type="password" name="pass2" id="password2" placeholder="re-enter password" /><br />
			<br /><br />
			<button type="submit" name="submit_stud" class="submit" >Update Profile</button>
		</div>		
	</div>
</form>

<script>
	$(document).ready(function(){
		$(".submit").click(function(){
        $(".error").hide();
        var hasError = false;
        var passwordVal = $("#password1").val();
        var checkVal = $("#password2").val();
        if (!passwordVal == '' && !checkVal =='') {
            $("#password1").after('<span class="error">Please enter a password.</span>');
            hasError = true;
        } else if (checkVal == '') {
            $("#password2").after('<span class="error">Please re-enter your password.</span>');
            hasError = true;
        } else if (passwordVal != checkVal ) {
            $("#password2").after('<span class="error">Passwords do not match.</span>');
            hasError = true;
        }
        if(hasError == true) {return false;}
    });
	});
</script>



