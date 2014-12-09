<?php
/**
 * Created by PhpStorm.
 * User: RobertGabriel
 * Date: 02/10/14
 * Time: 23:38
 */
class databases {


    var $user = "root";
    var $password = "";
    var $host = "127.0.0.1";
    var $database = "gym";
    var $con;



    // -- Function Name : __construct
    // -- Params :
    // -- Purpose : Doonects to the database
    public
    function __construct() {

        if (! isset ( $_SESSION )) {
            session_start ();
        }

        $this->con = mysqli_connect ( $this->host, $this->user, $this->password, $this->database );

        if (mysqli_connect_errno ()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error ();
        }

    }

    // -- Function Name : __destruct
    // -- Params :
    // -- Purpose : Disconnect to the database.
    public
    function __destruct() {
        mysqli_close ( $this->con );
    }



    // -- Function Name : setCardio
    // -- Params :
    // -- Purpose : Sets the cardio information .
    public
    function setCardio() {
        $id = $_SESSION ["id"];
        $mydate = getdate ( date ( "U" ) );
        $date = $mydate [year] . $mydate [mon] . $mydate [mday];
        $miles = $_POST ['miles'];
        $run = $_POST ['run'];
        return mysqli_query ( $this->con, "INSERT INTO cardio (memberId, date, distance,duration)
VALUES ('" . $id . "','" . $date . "','" . $miles . "','" . $run  . "')" );
    }



    // -- Function Name : updateUser
    // -- Params :
    // -- Purpose : Updates the user information.
    public
    function updateUser() {
        $id =  $_POST ['memberId'];
        $fName = $_POST ['fName'];
        $lName = $_POST ['lName'];
        $address = $_POST ['address'];
        $phone = $_POST ['phone'];
        $email = $_POST ['email'];
        $status = $_POST ['status'];
        $password = $_POST ['password'];
         mysqli_query ( $this->con, " UPDATE members
SET fName='$fName', lName='$lName',address='$address',phone='$phone',email='$email',status = '$status',password='$password'
WHERE memberId='$id';" );
    }




    // -- Function Name : setWeight
    // -- Params :
    // -- Purpose : Sets the amount of weight the user lifted.
    public
    function setWeight() {
        $id = $_SESSION ["id"];
        $mydate = getdate ( date ( "U" ) );
        $date = $mydate [year] .'-' . $mydate [mon] .'-'. $mydate [mday];
        $setId = $_POST ['setId'];
        $reps = $_POST ['reps'];
        $weight = $_POST ['weight'];
        $type = $_POST ['type'];
        return mysqli_query ( $this->con, "INSERT INTO workout (memberId, date, setId, exerciseType, reps,weight)
                                           VALUES ('" . $id . "','" . $date . "','" . $setId  ."','" . $type . "','" . $reps . "','" . $weight . "')" );
    }





    // -- Function Name : updatemembers
    // -- Params :
    // -- Purpose : Updates the user information.
    public
    function updateMember() {
        $id = $_SESSION ["id"];
        $fName = $_POST ['fname'];
        $lName = $_POST ['lname'];
        $address = $_POST ['address'];
        $phone = $_POST ['phone'];
        $email = $_POST ['email'];
        $password = $_POST ['password'];
        $results = mysqli_query ( $this->con, " UPDATE members
                                                SET fName='$fName', lName='$lName',address='$address',phone='$phone',email='$email',password='$password'
                                                WHERE memberId='$id';" );
        return $results;
    }



    // -- Function Name : login
    // -- Params : $email, $password
    // -- Purpose : Logins int he user to check if there in the database.
    public
    function login($email, $password) {
        $results = mysqli_query ( $this->con, "SELECT memberId,fName,lName,address,phone,email,password,height,status FROM members WHERE email='" . $email . "' AND password='" . $password . "'" );
        return $results;
    }





    // -- Function Name : register
    // -- Params : $fName, $lName, $Id, $address, $phone, $email, $password
    // -- Purpose : Register the user to the database.
    public
    function register($fName, $lName, $Id, $address, $phone, $email, $password) {
        $results = mysqli_query ( $this->con, "INSERT INTO members (memberId,fName,lName,address,phone,email,password)
                                              VALUES ('$Id','$fName','$lName','$address','$phone','$email','$password')" );
        return $results;
    }



    // -- Function Name : getTrainers
    // -- Params :
    // -- Purpose : Gets all the trainers from the database.
    public
    function getTrainers() {
        $results = mysqli_query ( $this->con, "SELECT * FROM members WHERE status = 2 " );
        return $results;
    }




    // -- Function Name : getAll
    // -- Params :
    // -- Purpose : Gets all memebers form the database.
    public
    function getAll() {
        $results = mysqli_query ( $this->con, "SELECT * FROM members " );
        return $results;
    }
    // -- Function Name : getTraniersSchedule
    // -- Params : $s, $trainer
    // -- Purpose : Gets the trainers scheudle.
    public
    function getTraniersSchedule($s, $trainer) {

        $results = mysqli_query ( $this->con, "SELECT memberId, startTime, noOfHours, startTimes, fName, lName, date 
FROM members as m
left outer  JOIN trainerschedule
ON m.memberId=trainerschedule.trainerId
LEFT OUTER JOIN schedules
ON m.memberId = schedules.trainerId
WHERE EXISTS (SELECT *
              FROM trainerschedule as ts
              WHERE m.status = 2 and ts.trainerId = m.memberId and trainerschedule.date = '$s') ORDER BY memberId, startTimes ;" );
        return $results;
    }




    // -- Function Name : deleteUser
    // -- Params :
    // -- Purpose : Deletes user from the databse super admin only.
    public
    function deleteUser(){
        $id = $_POST ['memberId'];
        $results = mysqli_query ( $this->con, "DELETE FROM members
                                              WHERE memberId= '$id' " );
        return $results;
    }



    // -- Function Name : getUserS
    // -- Params :
    // -- Purpose : Gets the user schedule for the alert on the home page.
    public
    function getUserS(){
        $id = $_SESSION ["id"];
        $results = mysqli_query ( $this->con, "Select * FROM schedules where studentId= '$id' ORDER BY dates and startTimes ASC limit 1" );
        return $results;
    }




    // -- Function Name : setTimeTable
    // -- Params :
    // -- Purpose : Sets the timtable for the trainer and when there working.
    public
    function setTimeTable(){
        $start = $_POST ['start'];
        $hours = $_POST ['hours'];
        $trainerId = $_POST ['trainerId'];
        $dates = $_POST ['date'];
        $results = mysqli_query ( $this->con, "INSERT INTO trainerSchedule (trainerId,date,startTime,noOfHours)
                                              VALUES ('$trainerId','$dates','$start','$hours')" );
    }



    // -- Function Name : setWeights
    // -- Params :
    // -- Purpose : Sets the users weight , to track over time.
    public
    function setWeights(){
        $id = $_SESSION ["id"];
        $weight = $_POST ['weight'];
        $mydate = getdate ( date ( "U" ) );
        $date = $mydate [year] . '-'.  $mydate [mon] .'-' . $mydate [mday];
         mysqli_query ( $this->con, "INSERT INTO bmi (memberId,date,weight)
                                              VALUES ('$id','$date','$weight')" );
    }


    // -- Function Name : cancelBook
    // -- Params : $startTime, $dates,$id
    // -- Purpose : Deletes the information from the table in the scheudle.

    public
    function cancelBook($startTime, $dates,$id){
  $sql = "DELETE FROM schedules WHERE dates= '". $dates . "' AND startTimes='" .$startTime."' AND studentId='".$id . "'";

        $results = mysqli_query ( $this->con, $sql );
        return $results;

    }


    // -- Function Name : bookTrainer
    // -- Params : $trainer,$date,$time,$student
    // -- Purpose : Books the trainer.

    public
    function bookTrainer($trainer,$date,$time,$student){
        $results = mysqli_query ( $this->con, "INSERT INTO schedules (dates,startTimes,trainerId,studentId)
                                              VALUES ('$date','$time','$trainer','$student')" );
        return $results;
    }




    // -- Function Name : bcancelBooking
    // -- Params :
    // -- Purpose : Gets all the booking from the schuidle for the select form in the setting so they can cancel.
    public
    function cancelBooking(){
        $id = $_SESSION ["id"];
        $results = mysqli_query ( $this->con, "Select * FROM schedules where studentId= '$id'  " );
        return $results;

    }




    public
    function getSingleTrainers($trainer){
///Needs to be fixed
//echo $trainer;
        $results = mysqli_query ( $this->con, "

SELECT *
FROM members as m
left outer  JOIN trainerschedule
ON m.memberId=trainerschedule.trainerId
LEFT OUTER JOIN schedules
ON m.memberId = schedules.trainerId
WHERE EXISTS (SELECT *
              FROM trainerschedule as ts
              WHERE m.status = 2  and trainerschedule.trainerId = '$trainer' ) ORDER BY startTimes ;" );
        return $results;


    }
     public
    function getTrainerDaySchedule($trainerId, $date){

      
        $results = mysqli_query($this->con, "SELECT startTime, noOfHours FROM trainerSchedule WHERE trainerId = '".$trainerId."' AND date = '".$date."' ;" );
        return $results;
    }
    
    
    
    
    
       public function deleteSchedule($id, $date){
        echo "deleting sched.....";
        $sql = "DELETE FROM trainerschedule WHERE trainerId = '".$id."' AND date = '".$date."';";
        echo $sql;
        $results = mysqli_query($this->con, $sql);    
echo $results;
    }


}

?>
