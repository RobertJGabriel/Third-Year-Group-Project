$(document).ready(function() {

    $( ".orRegister" ).click(function() {
        switchBetween();
    });

    $( ".orSign" ).click(function() {
        switchBack();
    });

    $( "#pass2" ).keyup(function() {
        checkPass(); return false;
    });

    $( ".front" ).click(function() {
        frontFlip(this.id);
    });

    $( ".back" ).click(function() {
        backFlip(this.id);
    });


	
	$( "#studentNumberForm" ).keyup(function() {
checkStudentNumber(); return false;
    });
	


        $("img").each(function () {

            $(this).attr("onerror", "this.src='https://s3.amazonaws.com/uifaces/faces/twitter/brandclay/128.jpg'");

        });


    function frontFlip(id)
    {
        var idNum = id.slice(5);
        var frontid = "front" + idNum;
        var backid = "back" + idNum;
        document.getElementById(backid).style.display="block";
        document.getElementById(frontid).style.display="none";
    }
    function backFlip(id)
    {
        var idNum = id.slice(4);
        var frontid = "front" + idNum;
        var backid = "back" + idNum;
        document.getElementById(backid).style.display="none";
        document.getElementById(frontid).style.display="block";
    }

    function switchBetween()
    {
        $("#logIn").slideUp('slow', function(){
            $("#register").slideDown('slow');});
        document.getElementById('left').style.marginTop = "-15px";
    }
    function switchBack()
    {
        $("#register").slideUp('slow', function(){
            $("#logIn").slideDown('slow');});
        document.getElementById('left').style.marginTop = "0px";
    }
		function checkStudentNumber()
		{
			var studentNumberDiv = document.getElementById('studentNumberForm');
			var studentNumber = document.getElementById('studentNumberForm').value;
		    var firstLetter = studentNumber.charAt(0);
			var numberLength = studentNumber.length;
		   
			if(studentNumber == "")
			{
				studentNumberDiv.style.backgroundColor = "#ffffff";
				document.getElementById("studentNumberLabel").innerHTML = "";
				confirmButton.style.display = "none";
				notWorkingButton.style.display = "block";
				return false;
			}
			else if(firstLetter == "R" && numberLength == 9)
			{
				studentNumberDiv.style.backgroundColor = "#ffffff";
				document.getElementById("studentNumberLabel").innerHTML = "";
				displayButton();
				return true;
			}
			else
			{
				studentNumberDiv.style.backgroundColor = "#ff6666";
				document.getElementById("studentNumberLabel").innerHTML = "Please enter valid student number";
				confirmButton.style.display = "none";
				notWorkingButton.style.display = "block";
				return false;
			}
			
		} 
    function checkPass()
    {
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');

        if(pass2.value == "")
        {
            pass2.style.backgroundColor = "#ffffff";
            confirmButton.style.display = "none";
            notWorkingButton.style.display = "block";
        }
        else if(pass1.value == pass2.value)
        {
            pass2.style.backgroundColor = "#ffffff";
            confirmButton.style.display = "block";
            notWorkingButton.style.display = "none";
        }
        else
        {
            pass2.style.backgroundColor = "#ff6666";
            confirmButton.style.display = "none";
            notWorkingButton.style.display = "block";
        }
    }






});

//Mobile menu button

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



