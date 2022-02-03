<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php 
$assignmentid = $_GET['a'];
$sqlass = "SELECT ".$prefix."assignment_submissions.id,".$prefix."assignment_submissions.datetime,".$prefix."assignment_submissions.subject, ".$prefix."assignment_submissions.assignment_brief, ".$prefix."course.course_number, ".$prefix."user.username From ".$prefix."assignment_submissions LEFT JOIN ".$prefix."course ON ".$prefix."assignment_submissions.course_id = ".$prefix."course.course_id LEFT JOIN ".$prefix."user ON ".$prefix."assignment_submissions.student_id = ".$prefix."user.id WHERE ".$prefix."assignment_submissions.id='$assignmentid'";

$resultass = $conn->query($sqlass) or die(mysqli_error($conn)); 
$rowa = $resultass->fetch_array()
?>
<body class="inner">
<div class="pagecont">
	<?php include 'controllers/navigation/innernav.php' ?>
	<div class="container12 cont-box">
		<article>
			<div class="row">
				<div class="col-md-7">
					<h3>Assigment Submission</h3>
					
					<p>Submitted By: <b><? echo $rowa["username"] ?></b><br />
					Thematic area: <b><? echo $rowa["course_number"] ?></b><br />
					On: <b><? echo $rowa["datetime"] ?></b></p>
					<h5>Subject: <b><? echo $rowa["subject"] ?></b></h5>
					<h5>Brief</h5>
					<p><? echo $rowa["assignment_brief"] ?></p>
				</div>
				<div class="col-md-4">
					<h4>Attachments</h4>
					<ul>
					<?php 
						$sqlup="select * FROM ".$prefix."assignment_uploads WHERE assignment_sub_id = '$assignmentid'";
						$resultup = $conn->query($sqlup) or die(mysqli_error($conn));
						while($rowup = $resultup->fetch_array()){
							echo "<li><a target='_new' href='../userfiles/assignments/".$rowup['file_address']."'>".$rowup['file_address']."</a></li>";
						}
					?>
					</ul>
				</div>
			</div>
		</article>
	</div>
	<div class="container12"><article><hr /></article></div>
	
	<?php include 'controllers/base/footer.php' ?>
	<?php include 'controllers/base/scripts.php' ?>

</body>
</html>