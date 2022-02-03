
<script src="assets/js/menuscript.js"></script>
<script src="assets/js/jquery.flexslider.js"></script>
<script src="assets/js/slick.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

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
  
  	$(".sidelink").click(function(){	
		var boxdiv = $(this).attr('boxshow');
		$('.sectionbox').hide();
		$("#"+ boxdiv).show();
		event.preventDefault();
	});
	
	$(document).on('click', '#nextsec', function(){
		event.preventDefault();
		var boxdiv = $(this).attr('boxshow');
		$('.sectionbox').hide();
		$("#"+ boxdiv).show();
		$('.correctans').empty();
	
	});
	
	
	$("form .submit").click(function(){
		event.preventDefault();
		$str = $(this).closest("form").serialize();
		console.log($str);

		$.ajax({  
			type: "POST",  
			url: "components/readtest.php",  
			data: $str,  
			dataType: "json",
			success: function(data) {  
					console.log(data);
					var secnext = parseInt(data[0]['secno']) + 1;
					var lasttest = data[0]['lasttest'];
					var divbox= "#nextbox-"+ data[0]['secno'];
					var score = data[0]['score'];
					var correctans = data[0]['wrongans'];
					
					$('.score').empty();
					$('.score').append("<br /><p style='font-size:19px'>Quiz Score: <span style='font-size:21px'>"+ score +" </span>pts</p>");
					
					
					if (correctans!==""){
						$.post('components/getcorrans.php', {ansid:correctans}, 
							function(data){
								$('.correctans').empty();
								$('.correctans').append(data);	
						});
					}
				
					if(lasttest==1){
						$(divbox).empty();
						$(divbox).append("<a class='nextbtn' href='sessions.php?msg=Session Completed'>Next Session</a>");
					}else{
						$(divbox).empty();
						$(divbox).append("<button type='button' class='nextbtn' id='nextsec' boxshow='secbx"+ secnext +"' >Next</button>");
					}
			}
		});
	});	
		$("form .getans").click(function(){
			$ax = $(this).val();
			$idx = $(this).attr('name');
			$str1 = {'qestid':$idx,'questval':$ax};
			$(".bx-"+$idx).empty();
			$(".bx-"+$idx).hide();
			
			//$('input[name='+$idx+']').attr("disabled",true);
			
			$.ajax({  
				type: "POST",  
				url: "components/getans.php",  
				data: $str1,  
				dataType: "json",
				success: function(data) {
					console.log(data);
					var anscont = data[0]['anscont'];
					if(!anscont==""){
					
					$(".bx-"+$idx).append(anscont);
					$(".bx-"+$idx).fadeIn();
					}
				}
			});
		});
   });
    
  </script>