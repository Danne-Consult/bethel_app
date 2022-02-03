<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>

<body class="inner">
<div class="pagecont">
	<?php include 'controllers/navigation/innernav.php' ?>
	<div class="container12 cont-box">
		<article>
			<div class="row">
				<div class="col-md-9">
					<h3>Create Thematic Area</h3>
					<form class="contactForm" action="components/create-course.php" method="post" name="login" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-4 fieldtitle">Thematic Area Number</div><div class="col-md-8"><input type="text" name="coursenumber" placeholder="Enter the course number" /></div>
						</div>
						<div class="row">
							<div class="col-md-4 fieldtitle">Thematic Title</div><div class="col-md-8"><input type="text" name="coursename" placeholder="Enter the course name" /></div>
						</div>
						<div class="row">
							<div class="col-md-4 fieldtitle">Content</div><div class="col-md-8"><textarea class="tinymce"  name="courseconent"></textarea></div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-4 fieldtitle">Reference content</div><div class="col-md-8"><input type="file" name="coursefiles[]"  multiple="multiple" /><br /><div class="filelist"></div></div>
						</div>
						
						<div class="row">
							<div class="col-md-4 fieldtitle">Reference Links</div><div class="col-md-8"><textarea class="tinymce2"  name="courselinks"></textarea><br /><br /></div>
						</div>
						
						
						<div class="row">
							<div class="col-md-4 fieldtitle">Course Video</div><div class="col-md-8"><input type="file" name="coursevideo" /><br /><div class="vidpreview"></div></div>
						</div>
						
						<div class="row">
							<div class="col-md-4 fieldtitle">Course Video - Embedded<br /><i>eg.</i> <code><< iframe width="" height="" src="#" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen><< iframe></code></div><div class="col-md-8"><textarea rows="6" name="course_embedded_video" ></textarea><br /><div class="vidpreview2"></div></div>
						</div>
						
						<div class="row">
							<div class="col-md-4 fieldtitle">Banner Image</div><div class="col-md-8"><input type="file" name="bannerimage" data-style="zoom-in"  /></br /><div class="imgpreview"></div></div>
						</div>
						<div class="row">
							<div class="col-md-4"><button type="submit" class="submit" name="submitcourse">Save Course</button></div>
						</div>
					</form>
				</div>
				<div class="col-md-3">
				<h4>Course List</h4>
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