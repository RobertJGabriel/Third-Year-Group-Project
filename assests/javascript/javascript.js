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




