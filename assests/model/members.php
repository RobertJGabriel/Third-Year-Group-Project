<?php
/**
 * Created by PhpStorm.
 * User: RobertGabriel
 * Date: 02/10/14
 * Time: 23:45
 */

class members{
    
    var $memberId;
    var $fName;
    var $lName;
    var $address;
    var $phone;
    var $email;
    var $password;
    var $status;
    var $height;
    var $weight;
    var $color;
    var $database;



    // -- Function Name : __construct
    // -- Params :
    // -- Purpose : Starts the connection to the database.
    public
    function __construct()    {
        $this->database = new databases();
    }


    // -- Function Name : __destruct
    // -- Params :  None
    // -- Purpose : None
    public
    function __destruct()    {
    }




    // -- Function Name : login
    // -- Params :  None
    // -- Purpose : Allows the user to login into the system
    public
    function login(){

        if (isset($_POST['email']) && isset($_POST['password'])  ){
            $email =$_POST['email'];
            // username and password sent from form
            $password= $_POST['password'];
            $email = stripslashes($email );
            // To protect MySQL injection (more detail about MySQL injection)
            $password = stripslashes($password);
            //	$email = mysql_real_escape_string($email);
            //	$password = mysql_real_escape_string($password);
            $result =  $this->database->login($email,$password);
            $count=mysqli_num_rows($result);

            if($count==1){
                // If result matched $myusername and $mypassword, table row must be 1 row
                while ($row = $result->fetch_assoc()) {
                    $this->memberId     = $row['memberId'];
                    $this->fName = $row['fName'];
                    $this->lName = $row['lName'];
                    $this->address = $row['address'];
                    $this->phone = $row['phone'];
                    $this->email = $row['email'];
                    $this->status = $row['status'];
                    $this->height = $row['height'];
                    $this->sessionCookies();
                }

                header("location: " . "http://" . $_SERVER['SERVER_NAME'] .'/p/' .'index.php?profile=true');
            } else {
                header("location: " . "http://" . $_SERVER['SERVER_NAME'] .'/p/' .'index.php');
            }

        }

    }


    // -- Function Name : logout
    // -- Params :
    // -- Purpose : Logs the user out and clears all the sessions and cookies.
    public
    function logout(){
        $_SESSION = array();
        // Unset all of the session variables.

        if (ini_get("session.use_cookies")) {
            // If it's desired to kill the session, also delete the session cookie.
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,                $params["path"], $params["domain"],                $params["secure"], $params["httponly"]            );
        }

        session_destroy();
        // Finally, destroy the session.
        header("location: " . "http://" . $_SERVER['SERVER_NAME'] .'/' . $this->folder.  'index.php');
    }



    // -- Function Name : registration
    // -- Params :
    // -- Purpose : Registrators the user to the database and strips them to unuse the sql injects.
    public
    function registration(){

        if (isset($_POST['fName']) && isset($_POST['password'])  ){
            $fName =$_POST['fName'];
            $lName= $_POST['lName'];
            $studentId = $_POST['studentId'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loop = array($fName, $lName, $studentId, $address,$phone,$email,$password);
            $arrlength=count($loop);
            for($x=0;$x<$arrlength-1;$x++) {
                echo$loop[$x] = stripslashes($loop[$x]);
                $loop[$x] = mysql_real_escape_string($loop[$x]);
            }

            $result =  $this->database->register($loop[0],$loop[1],$loop[2], $loop[3], $loop[4],$loop[5],$loop[6]);
            header("location: " . "http://" . $_SERVER['SERVER_NAME'] .'/' . $this->folder.  'index.php?profile=true');
        }

    }





    // -- Function Name : updateDetails
    // -- Params :  None
    // -- Purpose : Update the users details.
    public
    function updateDetails(){
        $this->database->updateMember();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }




    // -- Function Name : updateuser
    // -- Params :
    // -- Purpose : Allows the admin to update the database.
    public
    function updateuser(){
        $this->database->updateUser();
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }



    // -- Function Name : getStudentsAll
    // -- Params :
    // -- Purpose : Gets all users from the database.
    public
    function getStudentsAll(){
        $result =    $this->database->getAll();
        $count=mysqli_num_rows($result);
$idMaker = 0;
        if($count!=0){
            while ($row = $result->fetch_assoc()) {
        
                
                
                
                
                
                
                
                
                
                        				echo '<li class = "fliped">';
                echo ' <div class="back" id="back'. $idMaker . '">';
                echo '    <div class="trainerInfo">' .  $row['fName'] . ' ' . $row['lName'];
                            echo '  <form id="booknow" action="index.php?updateuser=true" type="input" method="post" >';
                     echo '    <input  type="text" name="memberId" value="'.  $row['memberId'] . '" >';
                echo '    <input  type="text" name="fName" value="'.  $row['fName'] . '" >';
                echo '    <input  type="text" name="lName" value="'.  $row['lName'] . '" >';
                echo '    <input  type="text" name="address" value="'.  $row['address'] . '" >';
                echo '    <input  type="text" name="phone" value="'.  $row['phone'] . '" >';
                echo '    <input  type="text" name="email" value="'.  $row['email'] . '" >';
                 echo '<select name="status" >';
                    echo'  <option value="1">Member</option>';
                    echo'  <option value="2">Trainer</option>';
                    echo'  <option value="3">Super Admin</option>';

                echo '</select>';

                echo '    <input  type="text" name="password" value="'.  $row['password'] . '" >';
                echo '    <input type="submit" value="Update">';
                echo ' <input type="submit" formaction="index.php?deleteuser=true" value="Delete">';
                echo '   </form>';
                  echo '   </div>'; 
                echo '   </div>';
                echo '  <div class="front" id="front'. $idMaker . '">';
                echo '      <img class="trainerImg" src="assests/img/profilePhotos/' .$row['memberId'] . '.png" width="180" height="300" />';
                echo '  </div>';
                echo '</li>';
				$idMaker++;
                
                
            }

        } else {
            echo 'No Trainers :(';
        }
        
        
        
        
        
        

    }



    // -- Function Name : deleteUser
    // -- Params :
    // -- Purpose : Delete users information from the database.
    public
    function deleteUser(){
        $result =    $this->database->deleteUser();
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }


 // -- Function Name : setBooking
// -- Params :
// -- Purpose : Sets the booking form . so superAdmin can set the time table.
    public
    function setBooking(){
        $result =    $this->database->getTrainers();
        $count=mysqli_num_rows($result);
        echo '  <form id="setTime" class="forms" action="index.php?setTimeTable=true" method="post" >';
        echo '     <input type="text" placeholder="Date" name="date" id="dateBox" required>';
         echo '   <select id="trainerId" name="trainerId" required disabled>';
        echo '<option value="" >Select a Trainer</option>';

        if($count!=0){
            while ($row = $result->fetch_assoc()) {
                echo   ' <option value="'. $row['memberId']  .'">' .  $row['fName'] . '' . $row['lName']   .'</option>';
            }

        } else {
            echo 'No Trainers :(';
        }

        echo'</select>';
        echo '<input id="startTime" type="number" name="start" placeholder="Start Times" required disabled>';
       	echo '<input id="numberOfHours" type="number" name="hours" placeholder="Amount of Hours" required disabled>';
        echo'<input type="submit">';
        echo '   </form>';
    }

    // -- Function Name : getTrainers
// -- Params :
// -- Purpose : Gets all trainers from the database.
    public
    function getTrainers(){
         $result =    $this->database->getTrainers();
        $count=mysqli_num_rows($result);
		$idMaker = 0;

        if($count!=0){
            while ($row = $result->fetch_assoc()) {
				echo '<li class = "fliped">';
                echo ' <div class="back" id="back'. $idMaker . '">';
                echo '    <div class="trainerInfo">' .  $row['fName'] . ' ' . $row['lName'];
                echo '   <p>' .  $row['email'] . '</p>';
				echo '  <form id="booknow" type="input" method="post" >';
				echo '	<a href="index.php?singleTrainer=true&id='.  $row['memberId'] . '">';
				echo '  Book Now	';
				echo '		</a>';
                echo '   </form>'.'</div>';
                echo '   </div>';
                echo '  <div class="front" id="front'. $idMaker . '">';
                echo '      <img class="trainerImg" src="assests/img/profilePhotos/' .$row['memberId'] . '.png" width="180" height="300" />';
                echo '  </div>';
                echo '</li>';
				$idMaker++;
            }

        } else {
            echo 'No Trainers :(';
        }
    }




    public
    function getSingleTrainers($trainer){
         $result =    $this->database->getSingleTrainers( $trainer  );
      $count=mysqli_num_rows($result);
      
	  echo'<div><img id="trainerBookingImg" src="assests/img/profilePhotos/' . $trainer.  '.png" /></div>';
	  
      if($count!=0){
        $j=null;
        // loops through all returned rows
        while ($row = $result->fetch_assoc()) {
          //$count counter breaks the loop if it is not the last results' row and
          //carries over the value of $i into next row of results as a starting value in for loop
          //that allows for continuation of displaying next results.
          $count--;
          
          $startTime = $row['startTime'];
          $finishTime = $startTime + $row['noOfHours'];
          if($j == null){
            //initialize $i only for first row of results
            $i = $startTime;
          }
		  
          //loop through each results' row, if time is booked and not last row: break and jump to next rsults' row
          // otherwise time is ready for booking
          for($i; $i < $finishTime; $i++){
            if($i == $row['startTimes']){
              echo '<li class = "slot">';
              echo '<h3> Start Time '. $i .'</h3>';
              echo '<h3> Date '. $row['date'] . '</h3>';
              echo '<a class="bookNowButton" href="index.php?booked='. $row['memberId']  .'&time=' .  $i    .'&dates='.$row['date'].'"  >Booked </a>';
              echo '</li>';
              if($count!=0){
                $j = ++$i;
                break;
              }
            } else {
              echo '<li class = "slot">';
              echo '<h3> Start Time '. $i .'</h3>';
              echo '<h3> Date '. $row['date'] . '</h3>';
              echo '   <a class="bookNowButton" href="index.php?booked='. $row['memberId']  .'&time=' .$i    .'&dates='.$row['date'].'" >Book now </a>';
              echo '</li>';
                }
              }
            }
        }
    }







// -- Function Name : uploadPhoto
// -- Params :
// -- Purpose : Allows the user to update the database.
    public
    function uploadPhoto(){
        $allowed =  array('png' ,'jpg');
        $filename = $_FILES['video_file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if( $_FILES['file']['name'] != "" ){
            copy ( $_FILES['file']['tmp_name'], 'assests/img/profilePhotos/' .    $_SESSION["id"] .".png")   or die( "Could not copy file" );
            header("Location: {$_SERVER['HTTP_REFERER']}

	
			");
        } else {
            die( "No file specified" );
        }

    }


// -- Function Name : getAlert
// -- Params :
// -- Purpose : Gets any upcoming training.
    public
    function getAlert(){
        $result =    $this->database->getUserS();
        $count=mysqli_num_rows($result);

        if($count!=0){
            while ($row = $result->fetch_assoc()) {
                echo('<h2>Upcoming Training ' . $row['dates']  .'  at '  .  $row['startTimes']  . ':00</h2>');
            }

        } else {
            echo('<h2>No Upcoming classes</h2>');
        }

    }






// -- Function Name : weight
// -- Params :
// -- Purpose : Sets the user weight , to track over time.
    public
    function weight(){
        $this->database->setWeights();
        header("Location: {$_SERVER['HTTP_REFERER']}

");
    }



// -- Function Name : sessionCookies
// -- Params :
// -- Purpose : Sets the session cookies.
    public
    function sessionCookies(){
        $_SESSION["id"] = $this->memberId;
        $_SESSION["fname"] = $this->fName;
        $_SESSION["lname"] = $this->lName;
        $_SESSION["address"] = $this->address;
        $_SESSION["email"] = $this->email;
        $_SESSION["phone"] = $this->phone;
        $_SESSION["height"] = $this->height;
        $_SESSION["status"] = $this->status;
    }

}

?>
