<?php
/**
 * Created by PhpStorm.
 * User: RobertGabriel
 * Date: 02/10/14
 * Time: 23:45
 */
class student{
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
    var $database;
    var $folder = 'project/';




    public
    function __construct()    {
            $this->database = new databases();
    }

    public
    function __destruct()    {
    }

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

                header("location: " . "http://" . $_SERVER['SERVER_NAME'] .'/' . $this->folder.  'index.php?profile=true');
            } else {
                header("location: " . "http://" . $_SERVER['SERVER_NAME'] .'/' . $this->folder.  'index.php');
            }

        }

    }

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

    public
    function backgroundColor(){
        $this->database->colors();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public
    function updateDetails(){
        $this->database->updateMember();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public
    function getInformation(){
        //THIS WILL BE THE LOGIN AND WILL SPIT THE ROWS BACK INTO THE VARABLES
        //WILL SET THE COOKIES.
    }

    public
    function checkStatus(){
    }

    public
    function updateuser(){

$this->database->updateUser();


        header("Location: {$_SERVER['HTTP_REFERER']}

			");

    }



    public
    function getStudentsAll(){
        $result =    $this->database->getAll();
        $count=mysqli_num_rows($result);

        if($count!=0){
            while ($row = $result->fetch_assoc()) {
                echo '<li class = "fliped">';
                echo ' <div class="back">';
                echo '  <form id="booknow" action="index.php?updateuser=true" type="input" method="post" >';
                echo '    <input  type="text" name="memberId" value="'.  $row['memberId'] . '" >';
                echo '    <input  type="text" name="fName" value="'.  $row['fName'] . '" >';
                echo '    <input  type="text" name="lName" value="'.  $row['lName'] . '" >';
                echo '    <input  type="text" name="address" value="'.  $row['address'] . '" >';
                echo '    <input  type="text" name="phone" value="'.  $row['phone'] . '" >';
                echo '    <input  type="text" name="email" value="'.  $row['email'] . '" >';
                echo '    <input  type="text" name="status" value="'.  $row['status'] . '" >';
                echo '    <input  type="text" name="password" value="'.  $row['password'] . '" >';
                echo '    <input type="submit" value="Update">';
                echo '   </form>';




                echo '   </div>';
                echo '  <div class="front">';
                echo '      <img class="trainerImg" src="assests/img/profilePhotos/' .$row['memberId'] . '.png" width="180" height="300" />';
                echo '  </div>';
                echo '</li>';

            }

        } else {
            echo 'No Trainers :(';
        }


    }



    public
    function setBooking(){
        $result =    $this->database->getTrainers();
        $count=mysqli_num_rows($result);



        echo '  <form id="setTime" action="index.php?setTimeTable=true" method="post" >';
        echo '   <select name="trainerId" required>';
        echo '<option value="" >Select a Trainer</option>';
        if($count!=0){
            while ($row = $result->fetch_assoc()) {

             echo   ' <option value="'. $row['memberId']  .'">' .  $row['fName'] . '' . $row['lName']   .'</option>';

            }
        }else{
            echo 'No Trainers :(';

        }
        echo'</select>';
echo '<input type="number" name="start">';
        echo '<input type="number" name="hours">';
        echo'<input type="submit">';
        echo '   </form>';

    }

    public
    function getTrainers(){
        $result =    $this->database->getTrainers();
        $count=mysqli_num_rows($result);

        if($count!=0){
            while ($row = $result->fetch_assoc()) {
                echo '<li class = "fliped">';
                echo ' <div class="back">';
                echo '    <div class="trainerInfo">' .  $row['fName'] . '' . $row['lName']   .'</div>';
                echo '   <p>' .  $row['email'] . '</p>';
                echo '  <form id="booknow" type="input" method="post" >';
                echo '    <input  type="text" name="scrap" value="'.  $row['memberId'] . '" hidden>';
              //  echo '    <a href="index.php?booking=true">Booking</a>';
                echo '   </form>';
                echo '   </div>';
                echo '  <div class="front">';
                echo '      <img class="trainerImg" src="assests/img/profilePhotos/' .$row['memberId'] . '.png" width="180" height="300" />';
                echo '  </div>';
                echo '</li>';

            }

        } else {
            echo 'No Trainers :(';
        }

    }

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

    public
    function saveSettings(){
    }

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