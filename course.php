<?php header('Content-type: text/html; charset=utf-8'); ?>
<?php include 'components/session-check.php' ?>
<?php include 'components/get_course.php' ?>
<?php include 'controllers/tests/gettest.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title><?php if(!$rowcourse['course_title']==""){ echo $rowcourse['course_title']; } ?> - Bethel</title>
	
	<meta name="keywords" content="" />
		<meta name="description" content="" />

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include "controllers/base/head.php" ?>
</head>


<body class="inner">


<div class="pagecont">
	<?php include 'controllers/navigation/first-navigation.php'; ?>
		
	<div class="container12 banner">
		<div class="bannerimg" style="background: url(<?php if(!$rowcourse['course_banner']==""){ echo "manager/assets/uploads/".$rowcourse['course_banner']; }else{ echo "assets/images/img2.jpg";} ?>) no-repeat fixed center; background-size:cover;">
			<article>
				<div class="title">
				<h3><?php if(!$rowcourse['course_number']==""){ echo "Unit ".$rowcourse['course_number']; }; ?> - <?php if(!$rowcourse['course_title']==""){ echo $rowcourse['course_title']; }; ?></h3>
			</div>
			</article>
		</div>
	</div>
	
	<div class="container12 course">
		<article>
			<div class="row justify-content-center">
				<div class="col-md-3 sidebar" >
					<h4>Sections</h4>
					<ul class='sidelist'>
					<?php 
						$coursetext= explode("||", $rowcourse['course_brief']);
						$coursetext= array_filter($coursetext);
						
						$arraycount = count($coursetext);
						$sectext = "";
						foreach($coursetext as $key => $value)
							{
								$coursetextdit= explode("/~",$value);	
								$seclist = '<li><a href="#" class="sidelink" boxshow="secbx'.$key.'" >'. $coursetextdit[1] .'</a></li>';	
								echo $seclist;
							}
					?>
					</ul>
				</div>
				<div class="col-md-7 cont" >
					<?php 
						
						$coursetext= explode("||", $rowcourse['course_brief']);
						$coursetext= array_filter($coursetext);
						$keypage  = 0;
						
						$arraycount = count($coursetext);
						$sectext = "";
						foreach($coursetext as $key => $value)
							{
								$key = (int)$key;
								$keypage = $key +1;
								$coursetextdit= explode("/~",$value);	
								$sectext = "<div class='sectionbox' id='secbx".$key."'>";
								$sectext .= '<h3>'. $coursetextdit[1] .'</h3>';
								$sectext .= $coursetextdit[2];
			
								if($coursetextdit[3]=="Yes"){
									$sectext .= getQuestAns($rowcourse['course_id'],$key,$_SESSION['userid'],$_SESSION['usertype']);
								}
								if(!$coursetextdit[3]=="No"){
									$sectext .= "<p><button type='button' class='nextbtn' id='nextsec' boxshow='secbx". $keypage ."' >Next</button></p>";
								}
								$sectext .= "</div>";
								echo $sectext;
							}
					?>
					
					

				</div>
				<!--<div class="col-md-2 sidebar">
					<div class="darkside">
						<h4>Notes and Reference</h4>
						<?php include 'components/get_links.php'; ?>
					</div>
				</div>-->
			</div>
		</article>
	</div>
	
	<div class="container12"><article><hr /></article></div>
	
	
<?php include 'controllers/base/footer.php'; ?>
</div>
<?php include 'controllers/base/scripts.php'; ?>

</body>
</html>