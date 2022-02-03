<form class="contactForm" action="components/register.php" method="post" name="login" >
	<input type="hidden" name="formtype" value="<?php echo $formtype; ?>" />
	<div class="row">
		<div class="col-md-6">
			<label for="namex">Name</label>
			<input type="text" name="namex" placeholder="name" required />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="emailx">Email</label>
			<input type="email" name="emailx" placeholder="Email" required />
		</div>
		<div class="col-md-6">
			<label for="telx">Telephone</label>
			<input type="text" name="telx" placeholder="Telephone" required />
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<label for="genderx">Gender</label>
			<select name="genderx">
				<option>...</option>
				<option value="Female">Female</option>
				<option value="Male">Male</option>
				<option value="Other">other</option>
			</select>
		</div>
		<div class="col-md-4">
			<label for="datebirthx">Date of birth</label>
			<input type="text" id="datepick" name="datebirthx" placeholder="Date of birth: YYYY-MM-DD" required />
		</div>
		<div class="col-md-4">
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
		<div class="col-md-12 ">
			<p>Institution/Schools Representing - Use a comma ( , ) to split the names of the institutions/Schools<br /> <textarea name="schoolnames" required></textarea>
		</div>
		
	</div>
	<hr />
	<div class="row ">
		<div class="col-md-12">
			<p>Have you attended any Menstrual Hygiene Management and life skill  program</p> <label style="float:none;"><input type="radio" value="Yes" name="progprev" /> Yes </label>&nbsp;&nbsp;&nbsp;&nbsp;<label style="float:none;"><input type="radio" value="No" name="progprev" />No </label>
		</div>
		
		<div class="col-md-6">
			if yes, by which organization: <br />
			<select name="progby">
				<option>...</option>
				<option name="Peers/Friends">AKGIS</option>
				<option name="Google search">Other</option>
			</select>
		</div>
	</div>
	<div class="row ">
		<div class="col-md-12">
			<p>If other, tell us about the program<br /> <textarea name="yesprogprev"></textarea>
		</div>
	</div>
	<hr />
	<div class="row ">
		<div class="col-md-12">
			<p>How did you get to know about this program</p>
		</div>
	</div>
	<div class="row ">
		<div class="col-md-6">
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
		<div class="col-md-6 aligncenter">
			<label for="datebirthx">Password</label>
			<input type="password" name="passwordx" placeholder="Enter Password" required />
		</div>
		<div class="col-md-6 aligncenter">
			<label for="datebirthx">Confirm Password</label>
			<input type="password" name="repasswordx" placeholder="Re-enter Password" required />
		</div>
	</div>
	
	<div class="row justify-content-center">
		<div class="col-md-6 aligncenter">
			<p>&nbsp;</p>
			<button type="submit" name="regperson" class="submit">Register</button>
		</div>
	</div>
</form>