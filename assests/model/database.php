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
    public function __construct() {
        if (! isset ( $_SESSION )) {
            session_start ();
        }

        $this->con = mysqli_connect ( $this->host, $this->user, $this->password, $this->database );

        if (mysqli_connect_errno ()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error ();
        }
    }
    public function setWeight() {
        $id = $_SESSION ["id"];

        $mydate = getdate ( date ( "U" ) );

        $date = $mydate [year] . $mydate [mon] . $mydate [mday];
        $reps = $_POST ['reps'];
        $weight = $_POST ['weight'];
        $type = $_POST ['type'];

        return mysqli_query ( $this->con, "INSERT INTO workout (memberId, date, exerciseType, reps,weight)
VALUES ('" . $id . "','" . $date . "','" . $type . "','" . $reps . "','" . $weight . "')" );
    }
    public function __destruct() {
        mysqli_close ( $this->con );
    }
    public function addStudent($fName, $lName, $studentId, $email, $password) {
        return mysqli_query ( $this->con, "INSERT INTO members (CustomerName, ContactName, Address, City, PostalCode, Country)
VALUES ('" . $fName . "','" . $lName . "','" . $studentId . "')" );
    }
    public function removeMember($memberId) {
        return mysqli_query ( $this->con, 'DELETE FROM student WHERE memberId = {$memberId};' );
    }
    public function updateMember() {
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
    public function login($email, $password) {
        $results = mysqli_query ( $this->con, "SELECT memberId,fName,lName,address,phone,email,password,height,status FROM members WHERE email='" . $email . "' AND password='" . $password . "'" );
        return $results;
    }
    public function register($fName, $lName, $Id, $address, $phone, $email, $password) {
        $results = mysqli_query ( $this->con, "INSERT INTO members (memberId,fName,lName,address,phone,email,password)
VALUES ('$Id','$fName','$lName','$address','$phone','$email','$password')" );
        return $results;
    }
    public function getTrainers() {
        $results = mysqli_query ( $this->con, "SELECT * FROM members WHERE status = 2 " );
        return $results;
    }
    public function colors() {
        $id = $_SESSION ["id"];

        $color = $_POST ['favcolor'];

        $result = mysqli_query ( $this->con, "SELECT * FROM settings FROM memberId='$id'" );

        echo $count = mysqli_num_rows ( $result );

        if ($count == 1) {

            $result = mysqli_query ( $this->con, "INSERT INTO settings (memberId,color) VALUES ('$id','$color')" );
        } else {

            $result = mysqli_query ( $this->con, " UPDATE settings SET color='$color' WHERE memberId='$id';" );
        }
    }
    public function getdata() {
        $results = mysqli_query ( $this->con, "Select * FROM workout where memberId = 'R00102430'" );

        return $results;
    }
    public function getTraniersSchedule($s, $trainer) {

        $results = mysqli_query ( $this->con, "SELECT *
FROM members as m
left outer  JOIN trainerschedule
ON m.memberId=trainerschedule.trainerId
LEFT OUTER JOIN schedules
ON m.memberId = schedules.trainerId
WHERE EXISTS (SELECT *
              FROM trainerschedule as ts
              WHERE m.status = 2 and ts.trainerId = m.memberId and ts.date = '$s') ORDER BY startTimes ;" );
        return $results;
    }




    public
    function bookTrainer($trainer,$date,$time,$student){

        $results = mysqli_query ( $this->con, "INSERT INTO schedules (date,startTimes,trainerId,studentId)
VALUES ('$date','$time','$trainer','$student')" );
        return $results;

    }
}

?>