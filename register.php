<?php 
$formtype = $_GET['fmt'];
if(empty($formtype)){
	header("location:registertype.php?fmt=stud");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>Register: Always Keeping Girls in School - Bethel</title>
		
		<meta name="keywords" content="" />
		<meta name="description" content="" />

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<?php include "controllers/base/head.php" ?>
</head>

<body class="register">
<div class="whitebg">
	<div class="logobx">
        <a href="index.php"><img src="assets/images/logo.png" alt="Bethel"></a>
    </div>
	<div class="container12">
		<article>
			<div class="row justify-content-center">
				<div class="col-md-10">
					<h3 class="aligncenter">Registering as a <?php if($formtype=='stud'){echo "Student";} if($formtype=='ment'){echo "Mentor";}?></h3>
					<?php
						if(isset($_GET['error'])){
							echo "<div class='error-red'>". $_GET['error'] ."</div>";
						}
					?>
					
					<p class="aligncenter"><i>Please fill the form below to register:</i></p>
					<?php 
						if($formtype=='stud'){
							include 'controllers/form/studentregform.php';
						}else{
							header('location:login.php');
						}
					?>
					
				</div>
			</div>
		</article>
	</div>
	<div class="clearfix"></div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
      $("#schoolname").on("keyup", function(){
        var school = $(this).val();
        if (school !=="") {
          $.ajax({
            url:"components/get_school.php",
            type:"POST",
            cache:false,
            data:{school:school},
            success:function(data){
              $("#schoollist").html(data);
              $("#schoollist").fadeIn();
            }  
          });
        }else{
          $("#schoollist").html("");  
          $("#schoollist").fadeOut();
        }
      });

      // click one particular city name it's fill in textbox
      $(document).on("click","li", function(){
        $('#schoolname').val($(this).text());
        $('#schoollist').fadeOut("fast");
      });
  });
</script>


</body>
</html>