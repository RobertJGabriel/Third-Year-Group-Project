
<div class="header" id="profileHeader">
    <div class="logoProfile"><img src="http://www.cit.ie/images/layout/logo.png" width="" height=""></div>
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

        <form name="input" action="demo_form_action.asp" method="get">
          Trainer Id <input type="text" name="user" value="<?php echo $_GET['id']; ?>">



            <select>



                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option>




            </select>






            Username: <input type="text" name="user">
            <input type="submit" value="Submit">
        </form>

    </div>



</div>
    
    
    
