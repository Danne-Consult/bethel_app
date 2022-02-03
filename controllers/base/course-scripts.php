<script>
$(document).ready(function(){

	var getUrlParameter = function getUrlParameter(sParam) {
	var sPageURL = window.location.search.substring(1),
		sURLVariables = sPageURL.split('&'),
		sParameterName,
		i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
			}
		}
	};
		var pagenum  = getUrlParameter('course');
		var url = "components/checktest.php";

		$.post(url,{pageno:pagenum}, function(data){

			if(!data[0]<=pagenum){
				$('.testcheck').html('<h3 class="aligncenter">Pre-Test</h3><p class="aligncenter">Hey newbe, welcome to this thematic area, before you start, we need you to take a simple test.</p><br /><p class="aligncenter"><a href="test.php?tn='+pagenum+'&tt=pre" class="morebtn">Take the test</a></p>');
				
				$('#myModal').modal({
					fadeDuration: 1000,
					fadeDelay: 0.50,
					escapeClose: false,
					clickClose: false,
					showClose: false
				});
			};
			
		}, "json");
		
});
</script>

