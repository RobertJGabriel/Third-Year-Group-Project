
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


        <ul class="workout">

          <li> <div id="chart" class="chart"></div></li>

           <li><form name="information" class="forms" action="index.php?workoutInput=true" method="post">
                <h1>Input Weight</h1>
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
           </li>
        </ul>


        <ul class="workout">

            <li> <div id="chart_cardio" class="chart"></div></li>

            <li>

            <form name="cardioDetails" class="forms" action="index.php?cardioInput=true" method="post">
        <h1>Distance Run</h1>

        <input type="number" placeholder="Distance Ran" min="1" max=999 name="miles">

        <input type="number" placeholder="Time Ran in mins"    min="1" max="9999"  name="run">



        <input type="submit" value="Submit">
            </form>
            </li>
        </ul>



    <ul class="workout">

        <li> <div id="chart_weights" class="chart"></div></li>

        <li><form name="information" class="forms" action="index.php?weight=true" method="post">
                <h1> Weight</h1>
                <input type="number" placeholder="This weeks Weight in kg" min="1" max="9999" name="weight" required>

                <input type="submit" value="Submit">
            </form>
        </li>
    </ul>





    </div>



</div>



