<div class="header" id="profileHeader">
    <div class="logoProfile">     <img src="assets/img/logo.jpg" alt="Cit Logo"></div>
    <div class="logout"><a href="index.php?logout=true"> Logout</a></div>

</div>

<div id="wrapperProfile">


    <div  id="leftProfile">

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
            }
            ?>

            <li id="system">


                <div id="date">

                    <input type="text" name="date" id="dateBox" hidden>
                    <input type="text" name="id" id="idtrainer" hidden>
                </div></li>




        </ul>
    </div>



    <div id="rightProfile" class="overflow">




        <div id="rightBlock">

            <div id="calendar_wrapper">
                <h2 id="day"></h2>
                <ul id="day_calendar">


                </ul>
            </div>
            <script src="assets/javascript/jqueryui/external/jquery/jquery.js"></script>
            <script src="assets/javascript/jqueryui/jquery-ui.min.js"></script>
            <script src="assets/javascript/calendarScript.js"></script>


        </div>








    </div>



</div>
