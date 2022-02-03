<?php include 'components/session-check.php' ?>

<?php include 'controllers/base/head.php' ?>

<body class="inner">
<div class="pagecont">
	<?php include 'controllers/navigation/innernav.php' ?>

	<div class="container12 minheightbox">
		<article>
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<?php include 'controllers/lists/course_list_home.php' ?>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</article>
	</div>
	<div class="container12"><article><hr /></article></div>
	
	<?php include 'controllers/base/footer.php' ?>
	<?php include 'controllers/base/scripts.php' ?>

</body>
</html>