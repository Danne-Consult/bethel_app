
	$(document).ready(function(){
		updateChat();
		scrollToBottom();
				
		$("#chaticon").click(function(){
			$(".messagebox").slideToggle("slow");
			$("#chaticon").hide("slow");
		})
		$("#closelink").click(function(){
			$(".messagebox").slideToggle("slow");
			$("#chaticon").show("slow");
		})
		
		$(".txtbtn").click(function(){	
			
			var usermsg = $(".txtbx").val();
			var urlx = "components/chatpost.php";
			
			if(!usermsg==""){ 
				$.post(urlx,{chatmsg:usermsg},function(data){
					 $(".message").html(data);
					 scrollToBottom();
				});				
				$(".txtbx").val("");
				return false;
			}
		})
		
		
		 setTimeout(function(){updateChat();},5000);

		  function updateChat() {
				$.get("components/readchatpost.php",function(data) {
				  $(".message").html(data);
				  scrollToBottom();
					
				}); 
				
			}
			function scrollToBottom() {
				 var objDiv = $(".message");
				 var h = objDiv.get(0).scrollHeight;
				 objDiv.animate({scrollTop: h});
			}
				
	})
