<?php 
$formtype = $_GET['fmt'];
if(empty($formtype)){
	header("location:registertype.php");
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
	
		<meta property ="og:site_name" content="" />
		<meta property="og:url" content="" />
		<meta property="og:image" content="" />
		<meta property="og:type" content="website" />
		<meta property="og:description" content="" />
	
		<meta property ="twitter:title" content="" />
		<meta property ="twitter:description" content="" />
		<meta property ="twitter:url" content="" />
		<meta property ="twitter:image" content="" />

		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
		<link rel="icon" type="image/ico" href="assets/images/icon.png"/>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
		<link rel="stylesheet" href="assets/css/flexslider.css">
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css">
		<link rel="stylesheet" href="assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="assets/css/menuscript.css">
		<link rel="stylesheet" href="assets/css/style.css">
	
		<script src="assets/js/jquery.min.js"></script>
</head>

<body class="inner nobanner">
<?php include 'controllers/navigation/reg-navigation.php'; ?>
<div class="container12">
	<article>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<h3 class="aligncenter">Registering as a <?php if($formtype=='stud'){echo "Student";} if($formtype=='ment'){echo "Mentor";}?></h3>
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

<div class="container12">
	<article>
		<hr />
	</article>
</div>
<footer>
	<article>
		<div class="">
			<div class="row">
				<div class="col-md-4">
					<img class="footlogo" src="assets/images/logo.png" />
				</div>
				<div class="col-md-8 alignleft">
					<div class="container12 alignright">
						<ul class="social">
							<li><a href="#" target="_new"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
							<li><a href="#" target="_new"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" target="_new"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<div class="container12 alignright">
						<ul class="footmenu policy">
							<li><a href="">Privacy Policy</a></li>
							<li>|</li>
							<li><a href="">Terms & Conditions</a></li>
						</ul>
					</div>
					<div class="container12 alignright copy">
						&copy;2020 Bethel Network 
					</div>
				</div>
			</div>
		</div>
	</article>
</footer>
<script src="assets/js/jquery.flexslider.js"></script>
<script src="assets/js/menuscript.js"></script>
<script src="assets/js/smoothscroll.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('.clients').flexslider({
    animation: "slide",
	slideshowSpeed: 10000
  });
   $('.banner').flexslider({
    animation: "fade",
	rtl: true
  });
  
   $('#datepick').datetimepicker({
	   weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0 ,
		format: "yyyy-mm-dd"
   });
		
	$("a").on('click', function(event) {

    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        window.location.hash = hash;
      });
    } 
  });	
    });
  </script>
  
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