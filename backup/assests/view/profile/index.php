
<div class="header" id="profileHeader">
    <div class="logoProfile">     <img src="assets/img/logo.jpg" alt="Cit Logo"></div>
      <div class="logout"><a href="index.php?logout=true"> Logout</a></div>
</div>





<div id="wrapperProfile">


    <div id="leftProfile">
        <ul id="profileMenu">
          <li><a href="index.php?profile=true"><img src="<?php  echo 'assets/img/profilePhotos/' . $_SESSION['id'] . '.png' ?>"  width="150" height="150" alt="Profile Picture"></a></li>
            <li><h1><?php echo $_SESSION["fname"] ;  ?></h1></li>
            <li><a href="index.php?settings=true">Settings</a></li>
            <li><a href="index.php?workout=true">Workout</a></li>
            <li><a href="index.php?booking=true">Book </a></li>
            <?php
            if ($_SESSION["status"] == 3)
            {
                echo' <li><a href="index.php?admin=true">Admin</a></li>';
                echo' <li><a href="index.php?timetable=true">Time Table</a></li>';
            }
            ?>
        </ul>
    </div>



    <div id="rightProfile">

        <ul id="trainers">

            <?php

$this->student->getTrainers();




            ?>



        </ul>

    </div>



</div>
    
    
    
