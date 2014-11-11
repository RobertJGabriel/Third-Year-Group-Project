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





