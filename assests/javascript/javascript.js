$(document).ready(function() {

    $( ".orRegister" ).click(function() {
     switchBetween();
    });
    
     $( ".orSign" ).click(function() {
switchBack();
    });
    

    	function switchBetween()
		{
			$("#logIn").slideUp('slow', function(){
			$("#register").slideDown('slow');});
		}
		function switchBack()
		{
			$("#register").slideUp('slow', function(){
			$("#logIn").slideDown('slow');});
		}





});

$(document).ready(function() {

   $( "#mobileButton" ).click(function(){
   
		menuDisplay();
   
   });
   
});
function menuDisplay(){
	
	var menu = document.getElementById("mobileMenu");
	var button = document.getElementById("mobileButton");
	
	if(menu.style.display == "none"){
	
		menu.style.display = "block";
		button.style.border = "1px solid #B51845";
		
	}else{
	
		menu.style.display = "none";
		button.style.border = "none";
		
	}

}



