
<div class="header" id="profileHeader">
    <div class="logoProfile"><img src="" width="" height=""></div>
      <div class="logout"><a href="index.php?logout=true"> Logout</a></div>
</div>





<div id="wrapperProfile">
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

        <ul id="trainers">

            <?php

$this->student->getTrainers();




            ?>



        </ul>

    </div>



</div>
    
    
    
