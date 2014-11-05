
<div class="header" id="profileHeader">
    <div class="logoProfile"><img src="" width="200" height="60"></div>
    <div class="logout"><a href="index.php?logout=true"> Logout</a></div>
</div>

<div id="wrapperProfile">


    <div id="leftProfile">
        <ul id="profileMenu">
    <li><a href="index.php?profile=true"><img src="<?php  echo 'assests/img/profilePhotos/' . $_SESSION['id'] . '.png' ?>"  width="150" height="150" alt="Profile Picture"></a></li>
            <li><h1><?php echo $_SESSION["fname"] ;  ?></h1></li>
            <li><a href="index.php?settings=true">Settings</a></li>
            <li><a href="index.php?workout=true">Workout</a></li>
            <li><a href="index.php?booking=true">Book </a></li>
        </ul>
    </div>



    <div id="rightProfile">
        <div id="settings">
            <h1>Work out graphs</h1>







            <div id="chart" style=" width: 700px; margin: 0 auto"></div>

            <form name="information" class="Settingforms" action="index.php?workoutInput=true" method="post">
                <h1>Input Weight</h1>

                <input type="number" placeholder="Amount of Reps"  name="reps">

                <input type="number" placeholder="Amount of weight"  name="weight">

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



</div>



