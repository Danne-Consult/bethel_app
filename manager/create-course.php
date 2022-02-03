<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>

<body class="inner">
<div class="pagecont">
	<?php include 'controllers/navigation/innernav.php' ?>
	<div class="container12 cont-box">
		<article>
			<div class="row">
				<div class="col-md-8">
					<h3>Create Session</h3>
					<form class="contactForm" action="components/create-course1.php" method="post" name="login" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-4 fieldtitle">Session Number</div><div class="col-md-8"><input type="text" name="coursenumber" placeholder="Enter the course number" /></div>
						</div>
						<div class="row">
							<div class="col-md-4 fieldtitle">Session Title</div><div class="col-md-8"><input type="text" name="coursename" placeholder="Enter the course name" /></div>
						</div>
						<br /><hr />
						<div id="secbx">
							<div class="sectionbox">
								<div class="row">
									<div class="col-md-4 fieldtitle">Section title</div><div class="col-md-8"><input type="text" name="sectitle[]" placeholder="Enter the section title" /></div>
								</div>
								<div class="row">
									<div class="col-md-4 fieldtitle">Content</div><div class="col-md-8"><textarea class="tinymce"  name="courseconent[]"></textarea></div>
								</div>
								<br />
								<div class="row">
									<div class="col-md-4 fieldtitle">Has quiz</div><div class="col-md-8"><label style="float:none !important;"><input type="radio" name="hasquiz0" value="Yes" required>Yes</label>&nbsp;&nbsp;&nbsp;<label style="float:none !important;"><input type="radio" name="hasquiz0" value="No" >No</label></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 fieldtitle"></div><div class="col-md-8"><button type="button" class="submit" id="addsec">Add Section</button></div>
						</div>
						<br /><hr />
						
						
						<div class="row">
							<div class="col-md-4 fieldtitle">Reference Links</div><div class="col-md-8"><textarea class="tinymce2"  name="courselinks"></textarea><br /><br /></div>
						</div>
						
						
						<div class="row">
							<div class="col-md-4 fieldtitle">Banner Image</div><div class="col-md-8"><input type="file" name="bannerimage" data-style="zoom-in"  /></br /><div class="imgpreview"></div></div>
						</div>
						<div class="row">
							<div class="col-md-4"><button type="submit" class="submit" name="submitcourse">Save Course</button></div>
						</div>
					</form>
				</div>
				<div class="col-md-4">
				<h4>Session List</h4>
				<?php include 'controllers/lists/courselist.php' ?>
			</div>
			</div>
			
		</article>
	</div>
	<div class="container12"><article><hr /></article></div>
	
	<?php include 'controllers/base/footer.php' ?>
	<?php include 'controllers/base/scripts.php' ?>

</body>
</html>