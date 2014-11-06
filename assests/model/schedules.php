<?php
/**
 * Created by PhpStorm.
 * User: RobertGabriel
 * Date: 02/10/14
 * Time: 23:57
 */
class schedules {
    var $bookingId;
    var $date;
    var $startTime;
    var $endTime;
    var $trainerId;
    var $database;
    public function __construct() {
        $this->database = new databases ();
    }
    public function __destruct() {
    }

    public function getDate() {
        return $this->date;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function getStartTime() {
        return $this->startTime;
    }
    public function setStertTime($startTime) {
        $this->startTime = $startTime;
    }
    public function getEndTime() {
        return $this->endTime;
    }
    public function setEndTime($endTime) {
        $this->endTime = $endTime;
    }
    public function getTrainertimes($date, $trainer) {
        //stores results set from DB
        $result = $this->database->getTraniersSchedule ( $date, $trainer );

        //counter for number of returned rows
       echo $count = mysqli_num_rows ( $result );

        // stores all returned rows as array elements
        $hourlySchedule = array ();
        while ( $row = $result->fetch_assoc () ) {
            array_push ( $hourlySchedule, $row );
        }
        
        // stores trainers ids including duplicates
        $trainersIds = array ();

        foreach ( $hourlySchedule as &$value ) {
            array_push ( $trainersIds, $value ['memberId'] );
        }

        // count number of each trainer records returned.
        $noOfRowsForEachTrainer = array_count_values ( $trainersIds );

        // removes duplicates in trainer ids
        $trainersIds = array_unique ( $trainersIds );

        // stores unique trainers ids(with restored indexes)
        $uniqueTrainers = array ();
        $j = 0;

        foreach ( $trainersIds as $key => $valuex ) {
            if (! is_null ( $key )) {
                $uniqueTrainers [$j] = $valuex;
                $j ++;
            }
        }

        echo ' <table width="600">';

        echo '<tr>';
        echo '<th bgcolor="silver">' . 'Time' . '</th> ';
        for($x = 1; $x <= count ( $trainersIds ); $x ++) {
            echo '<th bgcolor="silver">Gym Trainer' . $x . '</th> ';
        }
        echo ' <tr>';

        $arr = array (9, 10, 11, 12, 13, 14, 15, 16, 17, 18);
        //starts every row of the table
        foreach ( $arr as &$value ) {

            echo '<tr>';
            echo '<td bgcolor="silver">' . $value . '</td> ';

            //starts column for every trainer
            foreach ( $uniqueTrainers as $trId ) {
                $countUniqueId = 0;
                //checks for trainer's status at specific time
                for($c = 0; $c < $count; $c ++) {

                    //checks if result row is for specified trainer
                    if ($hourlySchedule [$c] ['memberId'] == $trId) {
                        $countUniqueId ++;

                        //checks if trainer is working at specified time
                        if (($hourlySchedule [$c] ['startTime'] <= $value) && ($value < $hourlySchedule [$c] ['startTime'] + $hourlySchedule [$c] ['noOfHours'])) {

                            //checks if trainer time slot is booked/free
                            if ($hourlySchedule [$c] ['startTimes'] == $value) {
                                echo '<td bgcolor="silver">' . 'Booked' . '</td> ';
                                break; // for loop
                            } else if ($hourlySchedule [$c] ['startTimes'] >= $value) {
                              echo '<td bgcolor="silver"><a href="index.php?booked='.$trId  .'&time=' .  $value    .'&dates='.$date.'">'  . '<img class="bookingPhoto" width="150" height="200" src="assests/img/profilePhotos/'. $trId .'.png" ></a></td> ';
                                break;
                            } else if ($countUniqueId == $noOfRowsForEachTrainer [$trId]) {
                                echo '<td bgcolor="silver"><a href="index.php?booked='.$trId  .'&time=' .  $value    .'&dates='.$date.'">'  . '<img class="bookingPhoto" width="100" height="150" src="assests/img/profilePhotos/'. $trId .'.png" ></a></td> ';
                                break;
                            }
                        } else {
                            echo '<td>Not Working</td>';
                            break; // for loop
                        }
                    }
                }
            }
            echo '</tr>';
        }
        echo ' </table>';
    }





    public
    function bookTrainer($trainer,$time,$date){

        $student =  $_SESSION["id"];

$this->database->bookTrainer($trainer,$date,$time,$student);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }




}
?>