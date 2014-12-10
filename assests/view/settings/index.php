
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
            <li class="profileButton" id="bookingsView"><a href="index.php?viewBooking=true">View Booking</a></li>
            <li class="profileButton"><a href="index.php?settings=true">Settings</a></li>
            <li class="profileButton" id="authorize-button"><a href="">Authorize</a></li>

        </ul>
    </div>




    <div id="rightProfile">
		
		<h1 class="meetStaff" align="center">Update settings</h1>
	
		<div id="settingsContainer">
            <form id="updateForm" name="information" class="Settingforms" action="index.php?updateprofile=true" method="post">
                <h2>Update Information</h2>

                <input type="text" placeholder="first name " value="<?php echo   $_SESSION["fname"] ; ?>" name="fname">
                <input type="text" placeholder="Last Name " value="<?php echo   $_SESSION["lname"] ; ?>" name="lname">
                <textarea type="text" placeholder="Address" value="" name="address"><?php echo   $_SESSION["address"] ; ?></textarea>
                <input type="number" placeholder="Phone "  value="<?php echo   $_SESSION["phone"] ; ?>"name="phone">
                <input type="text" placeholder="Email "  value="<?php echo   $_SESSION["email"] ; ?>"name="email">
                <input type="password" placeholder="password" name="password">

                <input type="submit" value="Submit">
            </form>

            <form id="photoForm" name="information" class="Settingforms" action="index.php?photo=true" method="post" id="uploadProfile" enctype="multipart/form-data">
                <h2>Upload Photo</h2>

                <input type="file" name="file" size="45" accept="image/jpeg, image/png" required>
                <br>

                <input type="submit" value="Submit">
            </form>
			
			<?php
            $this->schedules->cancelBooking();

            ?>
			
		</div>
    </div>
</div>





