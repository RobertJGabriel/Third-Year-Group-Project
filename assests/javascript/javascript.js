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


window.addEventListener('load', initializeListeners, false);
     
function initializeListeners(){

    var dateValue;
    var trainerIdValue;
    var date = document.getElementById('date');
    date.addEventListener('click', dateEntered, false);
    
    var trainer = document.getElementById('trainerId');
    trainer.addEventListener('change', trainerEntered, false);
    
    var startTime = document.getElementById('startTime');
    startTime.addEventListener('change', timeEntered, false);
    
    var numberOfHours = document.getElementById('numberOfHours');
    numberOfHours.addEventListener('change', hoursEntered, false);
    

//inner functions for event handling
    
function dateEntered(){
//date selected -> activate trainer selection
    document.getElementById('trainerId').disabled = false;
    dateValue = date.value;
   // alert(dateValue);
}

function trainerEntered(){
//trainer selected -> activate start time selection
//and read trainer's schedule details from DB
    document.getElementById('startTime').disabled = false;
    //trainerIdValue = trainer.value;
   // alert(trainerIdValue);
    //pass the date and trainer ID and read schedule details for
    //that trainer and date.
    getTrainerDetails(date.value, trainer.value);
     alert(arrStartTimes);
    alert(arrOfHours);
        
}

function timeEntered(){
    document.getElementById('numberOfHours').disabled = false;
    
}

function hoursEntered(){
    alert("fff");
}
    
}
           var arrStartTimes = new Array();
    var  arrOfHours = new Array();
function getTrainerDetails(dateValue, trainerIdValue){
 
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
      
    }else{
        alert("Your browser is not supported");
    }
    xmlhttp.onreadystatechange = function(){
          //alert(xmlhttp.status);
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            //here manipulate results
            var res = xmlhttp.responseText;
            var arrOfRes = res.split("/");
            //alert(arrOfRes[0]);

             var temp;
           // alert(arrOfRes[2]);
            for(var i=0; i< 3; i++){
                temp = arrOfRes[i].split(",");
               arrStartTimes[i] =temp[0];
               // alert(arrStartTimes[i]);
               arrOfHours[i] = temp[1];
                
            }
            
         
             //alert(arrStartTimes);
            
        }
        
 
    }
// alert(arrStartTimes + ' lll');
    
 
    dateValue = dateValue.replace(/\//g, "-");
     var newarr = dateValue.split("-");
    dateValue = newarr[2].concat("-", newarr[1], "-", newarr[0]);
      // alert(dateValue);
    var d = "ajax.php?date="+dateValue+"&trainerId="+trainerIdValue;
    //alert(d);
    xmlhttp.open("GET","assests/controller/ajax.php?date="+dateValue+"&trainerId="+trainerIdValue, false);
    xmlhttp.send();
}

