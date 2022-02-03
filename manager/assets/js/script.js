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


	$errorcode = getUrlParameter('error');
	if($errorcode == undefined){
		$(".errorbox").hide();
	}else{
		$(".errorbox").show();
	$(".errorbox").html("<p class='error'>"+$errorcode+"</p>");
	}


	$('.useredit').validate({
        rules : {
            pass1 : {
                minlength : 5
            },
            pass2 : {
                minlength : 5,
                equalTo : {  equalTo: "#password2"  }
            }
        }
		
		 $(form).submit();
	});