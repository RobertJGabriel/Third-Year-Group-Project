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


        $("img").each(function () {

            $(this).attr("onerror", "this.src='https://s3.amazonaws.com/uifaces/faces/twitter/brandclay/128.jpg'");

        });









});




