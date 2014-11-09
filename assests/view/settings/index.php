
<div class="header" id="profileHeader">
    <div id="nav">


        <ul id="menu">
            <li id="menuButton"></li>
            <li class="menuItem">
                <a href="index.php?profile=true"><img src="<?php  echo 'assests/img/profilePhotos/' . $_SESSION['id'] . '.png' ?>"  width="90" height="90" alt="Profile Picture"></a>
            </li>

            <li class="menuItem">
                <a href="index.php?profile=true">Home</a>
            </li>
            <li class="menuItem">
                <a href="index.php?workout=true">Workout</a>
            </li>
            <li class="menuItem">
                <a href="index.php?booking=true">Book </a>
            </li>

            <?php
            if ($_SESSION["status"] == 3)
            {
                ?>

                <li class="menuItem">
                    <a href="index.php?timetable=true">Time Table</a>
                </li>
                <li class="menuItem">
                    <a href="index.php?admin=true">Admin</a>
                </li>

            <?php
            }


            ?>
            <li class="menuItem">
                <a href="index.php?settings=true">Settings</a>
            </li>
            <li class="menuItem">
                <a href="index.php?logout=true"> Logout</a>
            </li>
        </ul>
    </div>
</div>





<div id="wrapperProfile">
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


            <form name="information" class="forms" action="index.php?color=true" method="post">
                <h1>Favioute colors</h1>
                <input type="color" name="favcolor" value="#ff0000">
                <input type="submit" value="Submit">
            </form>
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



