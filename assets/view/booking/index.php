
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
            <img src="assets/img/logo.jpg" alt="Cit Logo">
        </div>
    </div>

    <div id="logOutBox">
        <div class="logOutButton"><a class="logOutLink" href="index.php?logout=true"> Logout</a></div>
    </div>
</div>





<div id="wrapperProfile">



    <div id="leftProfile">
        <ul id="profileMenu">
            <li id="profilePic"><a href="index.php?profile=true"><img src="<?php  echo 'assets/img/profilePhotos/' . $_SESSION['id'] . '.png' ?>"  width="150" height="150" alt="Profile Picture"></a></li>
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
            <li class="profileButton" id="bookingsView"><a href="index.php?viewBooking=true">View Booking</a></li>
            <li class="profileButton"><a href="index.php?settings=true">Settings</a></li>
            <li class="profileButton" id="authorize-button"><a href="">Authorize</a></li>

        </ul>
    </div>




    <div id="rightProfile">
	<div id="calendarCentre">
        <h1 class="meetStaff" align="center">Make a Booking </h1>
    <div id="booking" class="trainerTable">

        
        <div id="date">
            <input type="text" name="date" id="dateBox" hidden>
            <input type="text" name="id" id="idtrainer" hidden>
        </div>
        
        <div id="calendar_wrapper" >
            <h2 id="day"></h2>
        </div>
	</div>
	</div>
        <div id="day_calendar">
        </div>
    
    </div>

</div>



<script src="assets/javascript/jqueryui/external/jquery/jquery.js"></script>
            <script src="assets/javascript/jqueryui/jquery-ui.min.js"></script>
            <script src="assets/javascript/calendarScript.js"></script>