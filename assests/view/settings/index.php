
<div class="header" id="profileHeader">
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

	<div id="mobileHeader">
		<img id="mobileLogo" src="assests/img/gplogo2.png" width="150" height="50">
		<div id="mobileButton">
			<div id="mobileMenu">
				<ul>
					<li><a href="index.php?profile=true"><img src="<?php  echo 'assests/img/profilePhotos/' . $_SESSION['id'] . '.png' ?>"  width="60" height="60" alt="Profile Picture"></a></li>
					<li><?php echo $_SESSION["fname"] ;  ?></li>
					<li><a href="index.php?settings=true">Settings</a></li>
					<li><a href="index.php?workout=true">Workout</a></li>
					<li><a href="index.php?booking=true">Book </a></li>
					<li><a href="index.php?logout=true"> Logout</a></li>
				</ul>
			</div>
		</div>
	</div>


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

    <ul class="settings">

<li>
            <form name="information" class="forms" action="index.php?updateprofile=true" method="post">
                <h1>Update Information</h1>

                <input type="text" placeholder="first name " value="<?php echo   $_SESSION["fname"] ; ?>" name="fname"required>
                <input type="text" placeholder="Last Name " value="<?php echo   $_SESSION["lname"] ; ?>" name="lname" required>
                <textarea type="text" placeholder="Address" value="" name="address"><?php echo   $_SESSION["address"] ; ?></textarea>
                <input type="number" placeholder="Phone "  value="<?php echo   $_SESSION["phone"] ; ?>"name="phone"required>
                <input type="text" placeholder="Email "  value="<?php echo   $_SESSION["email"] ; ?>"name="email"required>
                <input type="password" placeholder="password" name="password" required>

                <input type="submit" value="Submit">
            </form>
</li>






        <li>

            <?php
            $this->schedules->cancelBooking();

            ?>

        </li>










        <li>

            <form name="information" class="forms" action="index.php?photo=true" method="post" id="uploadProfile" enctype="multipart/form-data">
                <h1>Upload Photo</h1>

                <input type="file" name="file" size="45" accept="image/jpeg, image/png" required>
                <br>

                <input type="submit" value="Submit">
            </form>

</li>












        </ul>


    </div>
</div>





