<?php include 'components/session-check.php' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>Home : Bethel</title>
		
		<meta name="keywords" content="" />
		<meta name="description" content="" />

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<?php include "controllers/base/head.php" ?>
</head>
<body class="home">
<?php include 'controllers/navigation/first-navigation.php'; ?>
<div class="container12 banner">
	<div class="bannerimg" style="background:url(assets/images/banner1.jpg) no-repeat 0 -11em;">
		<div class="bannercap">
			<p class="darkp">Bringing back the confidence in us.</p>
		</div>
	</div>
</div>
<div class="container12 about aligncenter">
	<article>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<p>Bethel Lasting Impression (BLIP) facilitator guide is designed for trained mentors to help adolescents aged 9-14 years to understand body changes that accompany puberty stage and acquire life skills that will help them cope with those changes. It is important for facilitators to follow the order in which the manual is laid out, not to omit any content or activities, and to deliver all the units as they are described in consecutive weekly sessions. Before delivering the BLIP program, facilitators must attend a BLIP Training of Facilitators and be certified as a BLIP facilitator.</p>
			</div>
		</div>
	</article>
</div>

<?php include 'controllers/navigation/thematic_boxes.php'; ?>

<div class="container12">
	<article>
		<hr />
	</article>
</div>
<?php include 'controllers/base/footer.php'; ?>
<script src="assets/js/jquery.flexslider.js"></script>
<script src="assets/js/menuscript.js"></script>
<script src="assets/js/slick.js"></script>
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


		$('.slidex').slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
			{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
			}
		]
		});
    });
  </script>
</body>
</html>