$(document).ready(function() {

    $( ".c" ).click(function() {
     changeChart(this.id);
    });

    	function changeChart(id)
		{
			if(id == "c1")
				{
					document.getElementById("chartHolder1").style.display = "block";
					document.getElementById("chartHolder2").style.display = "none";
					document.getElementById("chartHolder3").style.display = "none";
				} 
			else if(id == "c2")
				{
					document.getElementById("chartHolder1").style.display = "none";
					document.getElementById("chartHolder2").style.display = "block";
					document.getElementById("chartHolder3").style.display = "none";
				}
			else if(id == "c3")
				{
					document.getElementById("chartHolder1").style.display = "none";
					document.getElementById("chartHolder2").style.display = "none";
					document.getElementById("chartHolder3").style.display = "block";
				}
		}
		  	
});



