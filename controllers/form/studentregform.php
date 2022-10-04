<form class="contactForm" action="components/register.php" method="POST" name="login" >
	<input type="hidden" name="formtype" value="<?php echo $formtype; ?>" />
	<div class="row">
		<div class="col-md-12">
			<label for="namex">Your full name</label>
			<input type="text" name="namex" required />
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<label for="username">Username <i>*Create a username that you will use  to access the application</i></label>
			<input type="text" style="width:60%; float:left;" name="username" id="usernamex" placeholder="create your username" required /><div style="float:left;" id="usercheck"></div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6">
			<label for="emailx">Email <i>*Optional</i></label>
			<input type="email" name="emailx"  />
		</div>
		<div class="col-md-6">
			<label for="genderx">Gender</label>
			<select name="genderx">
				<option>...</option>
				<option value="Female">Female</option>
				<option value="Male">Male</option>
				<option value="Other">other</option>
			</select>
		</div>
		<div class="col-md-6">
			<label for="datebirthx">Date of birth</label>
			<input type="date" name="datebirthx"  required />
		</div>
		<div class="col-md-6">
		<label for="countyx">From which County</label>
		<select name="countyx">
			<option>Select County</option>
			<option value="Baringo">Baringo</option>
			<option value="Bomet">Bomet</option>
			<option value="Bungoma">Bungoma</option>
			<option value="Busia">Busia</option>
			<option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
			<option value="Embu">Embu</option>
			<option value="Garissa">Garissa</option>
			<option value="Homa Bay">Homa Bay</option>
			<option value="Isiolo">Isiolo</option>
			<option value="Kajiado">Kajiado</option>
			<option value="Kakamega">Kakamega</option>
			<option value="Kericho">Kericho</option>
			<option value="Kiambu">Kiambu</option>
			<option value="Kilifi">Kilifi</option>
			<option value="Kirinyaga">Kirinyaga</option>
			<option value="Kisii">Kisii</option>
			<option value="Kisumu">Kisumu</option>
			<option value="Kitui">Kitui</option>
			<option value="Kwale">Kwale</option>
			<option value="Laikipia">Laikipia</option>
			<option value="Lamu">Lamu</option>
			<option value="Machakos">Machakos</option>
			<option value="Makueni">Makueni</option>
			<option value="Mandera">Mandera</option>
			<option value="Marsabit">Marsabit</option>
			<option value="Meru">Meru</option>
			<option value="Migori">Migori</option>
			<option value="Mombasa">Mombasa</option>
			<option value="Murang'a">Murang'a</option>
			<option value="Nairobi">Nairobi</option>
			<option value="Nakuru">Nakuru</option>
			<option value="Nandi">Nandi</option>
			<option value="Narok">Narok</option>
			<option value="Nyamira">Nyamira</option>
			<option value="Nyandarua">Nyandarua</option>
			<option value="Nyeri">Nyeri</option>
			<option value="Samburu">Samburu</option>
			<option value="Siaya">Siaya</option>
			<option value="Taita-Taveta">Taita-Taveta</option>
			<option value="Tana River">Tana River</option>
			<option value="Tharaka-Nithi">Tharaka-Nithi</option>
			<option value="Trans Nzoia">Trans Nzoia</option>
			<option value="Turkana">Turkana</option>
			<option value="Uasin Gishu">Uasin Gishu</option>
			<option value="Vihiga">Vihiga</option>
			<option value="Wajir">Wajir</option>
			<option value="West Pokot">West Pokot</option>

		</select>
		</div>
	</div>
	<hr />
	<div class="row ">
		<div class="col-md-12">
			<p><b>Are you in school?</b></p> <label style="float:none;"><input type="radio" value="Yes" name="inschoolx" /> Yes </label>&nbsp;&nbsp;&nbsp;&nbsp;<label style="float:none;"><input type="radio" value="No" name="inschoolx" />No </label>
		</div>
		<br />
		<div class="col-md-12 ">
			<label for="edulevel">If yes, what level are you in?</label>
			<select name="edulevel">
				<option>...</option>
				<option value="Primary School">Primary School</option>
				<option value="High School">High School</option>
				<option value="University/College">University/College</option>
				<option value="Other">Other</option>
			</select>
		</div>
	</div>
	<hr />
	<div class="row ">
		<div class="col-md-12">
			<p><b>Name of the school/institution you are attending?</b></p><input type="text" id="schoolname" name="schoolname" placeholder="School/Institution name" >
			<div id="schoollist"></div>
		</div>
		<div class="col-md-12 ">
			<p><b>Location of the school/institution</b></p><input type="text" name="schoolloc" placeholder="School/Institution location" >
		</div>
	</div>
	<hr />
	<div class="row ">
		<div class="col-md-12">
			<p><b>Have you attended any Menstrual Hygiene Management and life skill program</b></p> 
			<label style="float:none;"><input type="radio" value="Yes" name="progprev" /> Yes </label>&nbsp;&nbsp;&nbsp;&nbsp;<label style="float:none;"><input type="radio" value="No" name="progprev" />No </label>
		</div>
		<div class="col-md-12">
			<label for="progby">If "Yes", by which organization</label><br />
			<select name="progby">
				<option value="">...</option>
				<option value="AKGIS">AKGIS</option>
				<option value="Other">Other</option>
			</select>
		</div>
	</div>
	<div class="row ">
		<div class="col-md-12">
			<label label for="yesprogprev">If other, tell us about the program</label><br /> <textarea name="yesprogprev"></textarea>
		</div>
	</div>
	<hr />
	<div class="row ">
		<div class="col-md-12">
			<label for="howdidyou">How did you get to know about this program?</label><br />
			<select name="howdidyou">
				<option>...</option>
				<option name="Peers/Friends">Peers/Friends</option>
				<option name="Google search">Google search</option>
				<option name="Bing searchs">Bing search</option>
				<option name="Yahoo search">Yahoo search</option>
				<option name="Radio/TV media">Radio/TV media</option>
				<option name="Social Media">Social Media - Facebook/instagram/twitter</option>
				<option name="Collegues">Collegues</option>
			</select>
		</div>
	</div>
	<hr />
	
	<div class="row justify-content-center">
		<div class="col-md-12 ">
			<label for="datebirthx">Enter password</label>
			<input type="password" name="passwordx" id="passx" required /><i class="fa-solid fa-eye" id="togglePassword"></i>
		</div>
		<div class="col-md-12 ">
			<label for="datebirthx">Confirm password</label>
			<input type="password" name="repasswordx" id="repassx" required /><i class="fa-solid fa-eye" id="togglePassword1"></i>
		</div>
		<div class="col-md-12 alignright">
			<p>&nbsp;</p>
			<a href="login.php">Back to login</a> &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="regperson" class="submit">Register</button>
		</div>
	</div>
</form>

<script>
	const togglePassword = document.querySelector("#togglePassword");
	const password = document.querySelector("#passx");

	const togglePassword1 = document.querySelector("#togglePassword1");
	const password1 = document.querySelector("#repassx");

	togglePassword.addEventListener("click", function () {

		console.log(password);
		// toggle the type attribute
		const type = password.getAttribute("type") === "password" ? "text" : "password";
		password.setAttribute("type", type);

		// toggle the icon
		this.classList.toggle("fa-eye-slash");
	});

	togglePassword1.addEventListener("click", function () {
		// toggle the type attribute
		const type = password1.getAttribute("type") === "password" ? "text" : "password";
		password1.setAttribute("type", type);

		// toggle the icon
		this.classList.toggle("fa-eye-slash");
	});

	$(document).ready(function(){
		$("#usernamex").keyup(function(){
			var username = $("#usernamex").val();
			var usercheck = $("#usercheck");
			var urlx="components/usernamecheck.php";

			function hasWhiteSpace(s) {
				return /\s/g.test(s);
			}

			if(username==""){
				usercheck.empty();
				$("#usernamex").css({"background-color": "#f2f2f2"});

			}else if(username.length < 5){

				usercheck.html("Should be more than 5 characters");
				$("#usernamex").css({"background-color": "#f5d2d2"});
				usercheck.css({"color":"#de1c1c"})

			}else if(hasWhiteSpace(username)){
				usercheck.html("Username cannot contain spaces!");
				$("#usernamex").css({"background-color": "#f5d2d2"});
				usercheck.css({"color":"#de1c1c"})
						
			}else{
					
				$.get(urlx, {"username":username}, function(data, status){
				if(data==0){
					usercheck.empty();
					usercheck.html("Username is available.");
					$("#usernamex").css({"background-color": "#b3d3ba"});
					usercheck.css({"color":"#4f8061"})
				}else{
					usercheck.empty();
					usercheck.html("Username has been taken!");
					$("#usernamex").css({"background-color": "#f5d2d2"});
					usercheck.css({"color":"#de1c1c"})
				}
					
				});
			
			}
		});
		
	});
	
</script>