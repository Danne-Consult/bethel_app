<form class="contactForm" action="components/assignmentupload.php" method="post" autocomplete="off" enctype="multipart/form-data">
	<div class="row">     
		<div class="col-md-12">
		<input type="hidden" name="assid" value="<?php echo $assignmentx;  ?>" />
			<input type="text" class="" placeholder="Submission Subject" name="assubject" required>
		</div>
	</div>
	<div class="row">     
	 <div class="col-md-12">
		<label>Share a summary of your submission</label><br />
		<textarea name="assbrief" rows="5" maxlength="500"></textarea>
	 </div>
	</div>
	<div class="row">     
	
	<div class="col-md-12">
		<label>Upload your files - <i>You can select multiple files in the dialogue box by pressing CTRL and clicking the files. Allowed files are pdf,doc,img,ppt,xls</i></label><br />
		<input type="file" name="assup[]"  multiple/><br />
	</div>
	</div>
	<div class="row">    
		<div class="col-lg-6">
			<div class="form-group">
				<button class="submit" name="submitassignment" type="submit">Submit Assignment</button>
			</div>
		</div>
	</div>
</form>