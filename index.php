<?php header('Content-type: text/html; charset=utf-8'); ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/home_head.php' ?>
<body class="home">
<?php include 'controllers/navigation/first-navigation.php'; ?>
<div class="container12 banner">
	<div class="bannerimg" style="background:url(assets/images/banner1.jpg) no-repeat center;">
		<div class="bannercap">
			<p class="darkp">Bringing back the confidence in us.</p>
			<p class="paddingtop"><a href="#" class="morebtn">Learn More</a></p>
		</div>
	</div>
</div>
<div class="container12 about aligncenter">
	<article>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<p>Bethel Lasting Impression (BLIP) facilitator guide is designed for trained mentors to help adolescents aged 9-14 years to understand body changes that accompany puberty stage and acquire life skills that will help them cope with those changes. It is important for facilitators to follow the order in which the manual is laid out, not to omit any content or activities, and to deliver all the units as they are described in consecutive weekly sessions. Before delivering the BLIP program, facilitators must attend a BLIP Training of Facilitators and be certified as a BLIP facilitator.</p>
				<p><a href="#" class="readmore">Read More</a></p>
			</div>
		</div>
	</article>
</div>

<?php include 'controllers/navigation/thematic_boxes.php'; ?>


<!--<div class="container12 beakx">
	<article>
		<div class="row">
			<div class="col-md-5">
				<div class="pinkbg">
					<h3>Lorem ipsum dolor sit amet,</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis turpis vel neque pharetra luctus. Praesent sit amet tempus tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas vulputate mauris quis vestibulum laoreet. Cras sed enim a orci cursus interdum a sit amet leo. Donec fringilla ac eros a molestie. Donec at maximus lectus, nec varius nulla. Sed pulvinar est quam, id condimentum ex euismod nec. Mauris non nisi nec sem tempus aliquet. Vivamus non volutpat ipsum. Nunc molestie pellentesque lacus, eu feugiat turpis tempus in. Fusce dictum est quis odio mattis mattis.</p>
				</div>
			</div>
			
			<div class="col-md-7">
				<div class="boximg" style="background:url(assets/images/img1.jpg) no-repeat center; background-size:cover"></div>
			</div>
			
		</div>
	</article>
</div>

<div class="container12 readon">
	<article>
		<h3 class="aligncenter">Get your read on</h3>
		<div class="row">
			<div class="col-md-6 mainbox">
				<div class="mainart" style="background:url(assets/images/img1.jpg) no-repeat center;">
					<div class="cont"><h3>COVID-19 Pandemic</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis neque ligula. Maecenas non dui id erat vestibulum maximus eu lacinia ante. Pellentesque laoreet mi ligula, id tincidunt nisl dapibus in. Sed sit amet mattis mauris.</p></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6 boxart">
						<a href="">
							<div class="box" style="background:url(assets/images/img2.jpg) no-repeat center;">
								<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
							</div>
						</a>
					</div>
					<div class="col-md-6 boxart ">
						<a href="">
							<div class="box" style="background:url(assets/images/img3.jpg) no-repeat center;">
								<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
							</div>
						</a>
					</div>
					<div class="col-md-6 boxart">
						<a href="">
							<div class="box orange" style="background:url(assets/images/img4.jpg) no-repeat center;">
								<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
							</div>
						</a>
					</div>
					<div class="col-md-6 boxart">
						<a href="">
							<div class="box green" style="background:url(assets/images/img5.jpg) no-repeat center;">
								<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</article>
</div>
-->


<div class="container12">
	<article>
		<hr />
	</article>
</div>
<?php include 'controllers/base/footer.php'; ?>
<script src="assets/js/jquery.flexslider.js"></script>
<script src="assets/js/menuscript.js"></script>
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
    });
  </script>
</body>
</html>