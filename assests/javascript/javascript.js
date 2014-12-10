$(document).ready(function() {

    $( ".orRegister" ).click(function() {
        switchBetween();
    });

    $( ".orSign" ).click(function() {
        switchBack();
    });

    $( "#pass1" ).keyup(function() {
checkPass(); return false;
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
	
	$( "#homeForm1" ).keyup(function() {
	displayButton(); return false;
    });
	
	$( "#homeForm2" ).keyup(function() {
	displayButton(); return false;
    });
	
	$( "#homeForm3" ).keyup(function() {
	displayButton(); return false;
    });
	
	$( "#homeForm4" ).keyup(function() {
	displayButton(); return false;
    });
	
	$( "#homeForm5" ).keyup(function() {
	displayButton(); return false;
    });
	
    $( "#numberOfHours" ).keyup(function() {
	hoursEntered(); return false;
    });


        $("img").each(function () {

            $(this).attr("onerror", "this.src='https://s3.amazonaws.com/uifaces/faces/twitter/cbillins/128.jpg'");

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
		function checkPass()
		{
			var pass1 = document.getElementById('pass1');
			var pass2 = document.getElementById('pass2');
		   
			if(pass2.value == "")
			{
				pass2.style.backgroundColor = "#ffffff";
				confirmButton.style.display = "none";
				notWorkingButton.style.display = "block";
				return false;
			}
			else if(pass1.value == pass2.value)
			{
				pass2.style.backgroundColor = "#ffffff";
				displayButton();
				return true;
			}
			else
			{
				pass2.style.backgroundColor = "#ff6666";
				confirmButton.style.display = "none";
				notWorkingButton.style.display = "block";
				return false;
			}
		}  	
		
		function checkStudentNumber()
		{
			var studentNumberDiv = document.getElementById('studentNumberForm');
			var studentNumber = document.getElementById('studentNumberForm').value;
		    var firstLetter = studentNumber.charAt(0);
			var numberLength = studentNumber.length;
			var areTheyAllNumbers = studentNumber.substr(1, 8);
			var testAreTheyAllNumbers = isNaN(areTheyAllNumbers)
		   
			if(studentNumber == "")
			{
				studentNumberDiv.style.backgroundColor = "#ffffff";
				document.getElementById("studentNumberLabel").innerHTML = "";
				confirmButton.style.display = "none";
				notWorkingButton.style.display = "block";
				return false;
			}
			else if(firstLetter == "R" && numberLength == 9 && testAreTheyAllNumbers == false)
			{
				studentNumberDiv.style.backgroundColor = "#ffffff";
				document.getElementById("studentNumberLabel").innerHTML = "";
				displayButton();
				return true;
			}
			else
			{
				studentNumberDiv.style.backgroundColor = "#ff6666";
				document.getElementById("studentNumberLabel").innerHTML = "Please enter valid student number e.g R00000001";
				confirmButton.style.display = "none";
				notWorkingButton.style.display = "block";
				return false;
			}
			
		}  	
		
		function displayButton()
		{
			var pass1 = document.getElementById('pass1');
			var pass2 = document.getElementById('pass2');
			var studentNumber = document.getElementById('studentNumberForm').value;
		    var firstLetter = studentNumber.charAt(0);
			var numberLength = studentNumber.length;
			var areTheyAllNumbers = studentNumber.substr(1, 8);
			var testAreTheyAllNumbers = isNaN(areTheyAllNumbers);
			var h1 = document.getElementById('homeForm1').value;
			var h2 = document.getElementById('homeForm2').value;
			var h3 = document.getElementById('homeForm3').value;
			var h4 = document.getElementById('homeForm4').value;
			var h5 = document.getElementById('homeForm5').value;
			var testArePhoneAllNumbers = isNaN(h5);
			
			if(pass1.value != "" && pass1.value == pass2.value && firstLetter == "R" && testAreTheyAllNumbers == false && numberLength == 9 
			&& h1 != "" && h2 != "" && h3 != "" && h4 != "" && h5 != "" && testArePhoneAllNumbers == false)
			{
				confirmButton.style.display = "block";
				notWorkingButton.style.display = "none";
				phoneNumberLabel.innerHTML = "";
				homeForm5.style.backgroundColor = "#ffffff";
			}
			else if(testArePhoneAllNumbers == true)
			{
				phoneNumberLabel.innerHTML = "Please enter valid phone number"
				confirmButton.style.display = "none";
				notWorkingButton.style.display = "block";
				homeForm5.style.backgroundColor = "#ff6666";
			}
			else
			{
				confirmButton.style.display = "none";
				notWorkingButton.style.display = "block";
				homeForm5.style.backgroundColor = "#ffffff";
				phoneNumberLabel.innerHTML = "";
			}
		}



});


//Mobile menu button


$(document).ready(function() {

   $( "#mobileButton" ).click(function(){
   
		menuDisplay();
   
   });
   
   var menu = document.getElementById("leftProfile");
   var width = $(document).width();
   
   if(width <= 640){
   
		menu.style.display = "none";
		
   }
   
});

$(window).resize(function() {
    //do something

    var width = $(document).width();
 	var menu = document.getElementById("leftProfile");
    if (width >= 639) {
       
                menu.style.display = "block";
    } else { 
        	menu.style.display = "none";
        
    }
});
function menuDisplay(){
							//MobileChanges---Changed to leftProfile
	var menu = document.getElementById("leftProfile");
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
//times from db
    var arrStartTimes = [];
    var  arrOfHours = [];
//calculated hours from db,
    var scheduledHours = [];

var timeFromUser = -1;
var hoursFromUser = -1;

function initializeListeners(){

    var dateValue;
    var trainerIdValue;
    var date = document.getElementById('date');
    date.addEventListener('click', dateEntered, false);
    
    var trainer = document.getElementById('trainerId');
    trainer.addEventListener('change', trainerEntered, false);
    
    var startTime = document.getElementById('startTime');
    startTime.addEventListener('change', timeEntered, false);
    startTime.addEventListener('keyup', timeEntered, false);
       
    var numberOfHours = document.getElementById('numberOfHours');
    numberOfHours.addEventListener('change', hoursEntered, false);
    numberOfHours.addEventListener('keyup', hoursEntered, false);
    

//inner functions for event handling
    
function dateEntered(){
     var rem = document.getElementById('h3Id');
                if(rem){
                    rem.remove();                    
                }
//date selected -> activate trainer selection
    document.getElementById('trainerId').disabled = false;
    dateValue = date.value;
   // alert(dateValue);
    document.getElementById('trainerId').value = "";
    
   // alert(dateValue);
}

function trainerEntered(){
//trainer selected -> activate start time selection
//and read trainer's schedule details from DB
   
    //trainerIdValue = trainer.value;
    //pass the date and trainer ID and read schedule details for
    //that trainer and date.
       arrStartTimes.length = 0;
    arrOfHours.length = 0;
    getTrainerDetails(date.value, trainer.value);
//if(arrStartTimes[0] == ""){alert("is empty str");}
    
    //    for(var r=0; r<arrStartTimes.length; r++){
//          alert("type of   " + r + "  " + typeof arrStartTimes[r] + arrStartTimes[r]);
//    }
    
  
    //provide array of scheduled already hours
    generateScheduledHours();
    
    
    
    
    
    
if( arrStartTimes[0] != ""){
    
    var rem = document.getElementById('h3Id');
                if(rem){
                    rem.remove();                    
                }
                document.getElementById('startTime').value = "";
                document.getElementById('numberOfHours').value = "";
                //document.getElementById('numberOfHours').disabled = true;
                var h3element = document.createElement('h5');
                var h3id = document.createAttribute('id');
                h3id.value = "h3Id";
                h3element.setAttributeNode(h3id);
                scheduledHours.sort();
    var id = document.getElementById('trainerId').value;
    var dateVal = document.getElementById('dateBox').value;
                h3element.innerHTML =  "You are scheduled for this day <form method='post' action='index.php?cancelschedule=true&id="+ id +"&deldate=" + dateVal + "'><input id='delBtn' type='submit' value='Delete schedule' ></form>";
                //get element to insert before
                var insBefore = document.getElementById('startTime');
                var  parentElement = document.getElementById('setTime');
                parentElement.insertBefore(h3element, insBefore);
    
//    var deleteButton = document.createElement('button');
//    deleteButton.setAttributeNode(document.createAttribute('id', 'delBtn'));
//    deleteButton.innerHTML = "Delete schedule";
//    parentElement.insertBefore(deleteButton, h3element);
    
    
    
    document.getElementById('startTime').disabled = true;
    document.getElementById('numberOfHours').disabled = true;
    //alert("you are w " + arrStartTimes.length);
    arrStartTimes.length = 0;
    arrOfHours.length = 0;
    document.getElementById('trainerId').value = "";
     //document.getElementById('numberOfHours').disabled = true;
    document.getElementById('numberOfHours').value = null;
    //document.getElementById('startTime').disabled = true;
    
     
 //   alert(arrOfHours[0]);
}else{
    
    document.getElementById('startTime').disabled = false;
}
}

function timeEntered(){
  
    //after start time or number of hours is entered
    //it will be matched with existing schedule
    //if match is found error will display - time already set

       document.getElementById('numberOfHours').disabled = false;
    var hourNo = document.getElementById('numberOfHours').value;
    if(hourNo){
        hoursEntered();
    }
    
    //test for valid numbers
    
}

function hoursEntered(){
    var times = document.getElementById('startTime').value;
    var hours = document.getElementById('numberOfHours').value;
    var listOfHours = [];
    var loopBreak = false;
    
    //check for out of range working hours limit - up to 19:00 
if((parseInt(times) + parseInt(hours)) <= 19){
    document.getElementById('invalidHours').innerHTML = "";
     //document.getElementById('scheduleSubmit').removeAttribute('disabled');
    document.getElementById('confirmButton').style.display='block';//.setAttribute('disabled', true);
    document.getElementById('notWorkingButton2').style.display='none';
    
    
    
    //generate array of hours from user
    for(var k=0; k<hours; k++){
        listOfHours[k] = k + parseInt(times);     
    }
    //test for valid numbers/comparing values from db and from user
    for(var p=0; p<scheduledHours.length; p++){
        for(var r=0; r<listOfHours.length; r++){
            if(scheduledHours[p] == listOfHours[r]){

                loopBreak = true;
                break;
            }
        }
        if(loopBreak){break;}
    }
}else{
    document.getElementById('invalidHours').innerHTML = "Working hours out of range.";
    document.getElementById('confirmButton').style.display='none';
    document.getElementById('notWorkingButton2').style.display='block';
   }
}
    
}

function getTrainerDetails(dateValue, trainerIdValue){
 
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
      
    }else{
        alert("Your browser is not supported");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            //here manipulate results
            var res = xmlhttp.responseText;
            var arrOfRes = res.split("/");

            var temp = [];
      
            for(var i=0; i< arrOfRes.length; i++){
                
                temp = arrOfRes[i].split(",");
                //alert(temp);
               arrStartTimes[i] =temp[0];
               
               arrOfHours[i] = temp[1];
            }
        }
    }
 
    dateValue = dateValue.replace(/\//g, "-");
     var newarr = dateValue.split("-");
    dateValue = newarr[2].concat("-", newarr[0], "-", newarr[1]);

    var d = "ajax.php?date="+dateValue+"&trainerId="+trainerIdValue;
   // alert(d);
    xmlhttp.open("GET","assests/controller/ajax.php?date="+dateValue+"&trainerId="+trainerIdValue, false);
    
    xmlhttp.send();
}

function generateScheduledHours(){
    //generate list of hours in schedule from DB
    for(var k=0; k<arrStartTimes.length; k++){
        for(var m=0; m<arrOfHours[k]; m++){
            scheduledHours[scheduledHours.length] = m + parseInt(arrStartTimes[k]);
        }
    }
}
