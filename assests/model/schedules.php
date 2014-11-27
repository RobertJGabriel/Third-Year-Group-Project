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


    // -- Function Name : __construct
    // -- Params : None
    // -- Purpose : Starts Database Connection
    public
    function __construct() {
        $this->database = new databases ();
    }


    // -- Function Name : __destruct
    // -- Params : None
    // -- Purpose : Nothing
    public
    function __destruct() {
    }

    // -- Function Name : getDate
    // -- Params :  None
    // -- Purpose : Gets Date
    public
    function getDate() {
        return $this->date;
    }


    // -- Function Name : setDate
    // -- Params : $date
    // -- Purpose : Sets the Date
    public
    function setDate($date) {
        $this->date = $date;
    }


    // -- Function Name : getStartTime
    // -- Params : None
    // -- Purpose : Gets the Start Time
    public
    function getStartTime() {
        return $this->startTime;
    }



    // -- Function Name : setStertTime
    // -- Params : $startTime
    // -- Purpose : Sets the Start Times
    public
    function setStertTime($startTime) {
        $this->startTime = $startTime;
    }


    // -- Function Name : getEndTime
    // -- Params : None
    // -- Purpose : Gets End time
    public
    function getEndTime() {
        return $this->endTime;
    }


    // -- Function Name : getEndTime
    // -- Params : $endTime
    // -- Purpose : Gets End time
    public
    function setEndTime($endTime) {
        $this->endTime = $endTime;
    }


    // -- Function Name : getTrainertimes
    // -- Params : $date, $trainer
    // -- Purpose : The use here is to search the database by on a date and display all trainers and there avaibalty
                  //slots in a table to allow uses to book a trainer.

    public function getTrainertimes($date, $trainer) {
        //stores results set from DB
        $result = $this->database->getTraniersSchedule ( $date, $trainer );

        //counter for number of returned rows
       $count = mysqli_num_rows ( $result );

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

        echo ' <table >';

        echo '<tr>';
        echo '<th bgcolor="silver">' . 'Time' . '</th> ';
        for($x = 1; $x <= count ( $trainersIds ); $x ++) {
            //display trainer image on the top of table
            echo '<th bgcolor="silver"><img class="bookingPhoto" width="150" height="200" src="assests/img/profilePhotos/'.  $uniqueTrainers[$x-1]  .'.png" ></th> ';
        }
        echo ' <tr>';

        $arr = array (9, 10, 11, 12, 13, 14, 15, 16, 17, 18);
       // echo "<pre>";
    //    print_r($hourlySchedule);
      //  echo "<pre>";
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
//echo "start time " + $hourlySchedule [$c] ['startTime'] ;
                        //checks if trainer is working at specified time
                        if (($hourlySchedule [$c] ['startTime'] <= $value) && ($value < $hourlySchedule [$c] ['startTime'] + $hourlySchedule [$c] ['noOfHours'])) {

                            //checks if trainer time slot is booked/free
                            if ($hourlySchedule [$c] ['startTimes'] == $value) {
                                echo '<td bgcolor="silver">' . 'Booked' . '</td> ';
                                break; // for loop
                            } else if ($hourlySchedule [$c] ['startTimes'] >= $value) {
                                echo '<td bgcolor="silver"><a href="index.php?booked='.$trId  .'&time=' .  $value    .'&dates='.$date.'">Book</a></td> ';
                                break;
                            } else if ($countUniqueId == $noOfRowsForEachTrainer [$trId]) {
                                echo '<td bgcolor="silver"><a href="index.php?booked='.$trId  .'&time=' .  $value    .'&dates='.$date.'">Book</a></td> ';
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



    // -- Function Name : setTimeTable
    // -- Params : None
    // -- Purpose :     Sets the time table for a trainer and the hours there working.
    public
    function setTimeTable(){
        $this->database->setTimeTable();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


    // -- Function Name : CancelBooking
    // -- Params : None
    // -- Purpose : Creates a form for the user to cancel a booking for the seetings page.
    public
    function cancelBooking(){

        $result =$this->database->cancelBooking();
        $count=mysqli_num_rows($result);

        $status =  $_SESSION["status"];


        if ($status == '1'){


            echo '  <form id="cancelbooking" class="forms" action="index.php?cancelbooking=true" method="post" >';
            echo '<h1>Cancell a booking</h1>';
            echo '   <select name="booking" required>';
            echo '<option value="" >Select</option>';

            if($count!=0){

                while ($row = $result->fetch_assoc()) {
                    echo   ' <option value="'. $row['startTimes']  .  ',' . $row['dates']    .'">' .  $row[' dates'] . '' . $row['startTimes']   .'</option>';
                }

            } else {
                echo 'No Bookings';
            }

            echo'</select>';
            echo'<input type="submit">';
            echo '   </form>';


        } else if($status == '2'){


        }else{


        }






    }

    // -- Function Name : CancelBooking
    // -- Params :
    // -- Purpose : This alows a user to cancel a booking
    public
    function cancelBook(){

        $bookingkey  = $_POST ['booking'];

        $myArray = explode(',', $bookingkey );

        $id = $_SESSION ["id"];
        $startTime=  $myArray[0];
        $date = $myArray  [1];

      $this->database->cancelBook($startTime,$date,$id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }

    // -- Function Name : bookTrainer
    // -- Params : $trainer,$time,$date
    // -- Purpose : This alows a user to book a trainer.
    public
    function bookTrainer($trainer,$time,$date){
        $student =  $_SESSION["id"];
        $this->database->bookTrainer($trainer,$date,$time,$student);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    
    
    public function cancelSchedule(){
        $id = $_GET["id"];
         
        $deldate = $_GET['deldate'];
        $this->database->deleteSchedule($id, $deldate);
         // header('Location: ' . $_SERVER['HTTP_REFERER']);
    
    
    }

}

?>