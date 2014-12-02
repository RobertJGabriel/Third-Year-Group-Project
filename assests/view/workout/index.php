



<div class="header" id="profileHeader">
    	<div id="mobileButton">
	</div>
    <div id="socialPicks">
        <ul>
            <li id="twitter"><a href="https://twitter.com/CIT_Gym" target="_blank"></a></li>
            <li id="facebook"><a href="https://www.facebook.com/CITGym" target="_blank"></a></li>
        </ul>
    </div>

    <div id="topLogo">
        <div id="logo">
            <img src="assests/img/logo.jpg" alt="Cit Logo">
        </div>
    </div>

    <div id="logOutBox">
        <div class="logOutButton"><a class="logOutLink" href="index.php?logout=true"> Logout</a></div>
    </div>
</div>





<div id="wrapperProfile">


    <div id="leftProfile">
        <ul id="profileMenu">
            <li id="profilePic"><a href="index.php?profile=true"><img src="<?php  echo 'assests/img/profilePhotos/' . $_SESSION['id'] . '.png' ?>"  width="150" height="150" alt="Profile Picture"></a></li>
            <li id="usersName"><h1><?php echo $_SESSION["fname"] ;  ?></h1></li>

            <li class="profileButton"><a href="index.php?workout=true">Workout</a></li>

            <?php
            if ($_SESSION["status"] == 3)
            {
                ?>

                <li class="profileButton"><a href="index.php?admin=true">Admin </a></li>
                <li class="profileButton"><a href="index.php?timetable=true">Schedule</a></li>

            <?php
            }


            ?>
            <li class="profileButton"><a href="index.php?booking=true">Book </a></li>
            <li class="profileButton"><a href="index.php?viewBooking=true">View Booking</a></li>
            <li class="profileButton"><a href="index.php?settings=true">Settings</a></li>
            <li class="profileButton" id="authorize-button"><a href="">Authorize</a></li>

        </ul>
    </div>



    
    
    
    
    
    
    
    <div id="rightProfile">
	
		<h1 class="meetStaff" align="center">Progress graphs</h1>
        <div id="chartWrapper">

			<div id="choices">
				<div class="c" id="c1"><img src="assests/img/icons/small_icons/person41.png" width="50" height="50"></div>
				<div class="c" id="c2"><img src="assests/img/icons/small_icons/slim.png" width="50" height="50"></div>
                <div class="c" id="c3"><img src="assests/img/icons/small_icons/exercising.png" width="50" height="50"></div>
			</div>
			
			<div id="chartHolder">
				<div id="chartHolder1">
					<div class="charts" id="chart_cardio"></div>
					<div class="formHolder">
					
					<form name="cardioDetails" class="workoutForms" action="index.php?cardioInput=true" method="post"></br>
						<label>Distance Run</label>
						<input type="number" placeholder="Distance Ran" min="1" max=999 name="miles">
						<input type="number" placeholder="Time Ran in mins"    min="1" max="9999"  name="run">
						<input type="submit" value="Submit">
					</form>
					</div>
				</div>
				
				<div id="chartHolder2">
					<div class="charts" id="chart_weights"></div>
					<div class="formHolder">
					<form name="information" class="workoutForms" action="index.php?weight=true" method="post"></br>
						<label> Weight</label>
						<input type="number" placeholder="This weeks Weight in kg" min="1" max="9999" name="weight" required>
						<input type="submit" value="Submit">
					</form>
					</div>
				</div>
        
        
        
        
        <div id="chartHolder3">
            


        <div id="container"  class="charts">        </div>
	<div class="formHolder">
     <form name="information" class="forms" action="index.php?workoutInput=true" method="post">

                <h1>Input Weight</h1>
                   <input type="number" placeholder="Amount of sets"  min="1" max="3"name="setId">
                <input type="number" placeholder="Amount of Reps"  min="1" max="100"name="reps">
                <input type="number" placeholder="Amount of weight in kg"  min="1" max="999"name="weight">
                <select name="type" >
                    <option value="Back Dumbbell">Back Dumbbell </option>
                    <option value="Bicep Dumbbell">Bicep Dumbbell</option>
                    <option value="Shoulders Dumbbell">Shoulders Dumbbell</option>
                    <option value="Chest Dumbbell">Chest Dumbbell</option>
                </select>
                <input type="submit" value="Submit">
            </form>
           </div>
  
        

				
				
				
				
			</div>
    
</div></div>

</div>
</div>



