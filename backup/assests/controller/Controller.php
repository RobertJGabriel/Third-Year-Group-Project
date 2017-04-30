<?php

include_once("assets/model/student.php");
include_once("assets/model/weight.php");
include_once("assets/model/schedules.php");
include_once("assets/model/database.php");

class Controller {
    var $student;
    var $schedules;
    var $weight;

    var $database;
    
    public
    function __construct()      {
        $this->student = new student();
        $this->schedules = new schedules();
        $this->weight = new weight();
    }

    public
    function invoke(){

        if(isset($_SESSION['id'])){

            if (isset($_GET['profile'])){
 include('assets/view/profile.php');
            } else
                if (isset($_GET['booking'])){
                    include('assets/view/booking.php');
                } else
                    if (isset($_GET['settings']))        {
                        include('assets/view/settings.php');
                    } else
                        if (isset($_GET['logout']))        {
                            $this->student->logout();
                        } else
                            if (isset($_GET['date']))         {
                                $this->schedules->getTrainertimes($_GET['date'],$_GET['id']);
                            } else
                                if (isset($_GET['booked'])){

                                    $this->schedules->bookTrainer($_GET['booked'],$_GET['time'],$_GET['dates']);
                                } else
                                    if (isset($_GET['photo'])){
                                        $this->student->uploadPhoto();
                                    } else
                                        if (isset($_GET['updateprofile'])){
                                            $this->student->updateDetails();
                                        } else
                                            if (isset($_GET['color'])){
                                                $this->student->backgroundColor();
                                            }
                                            else
                                                if (isset($_GET['workout'])){
                                                    include('assets/view/workout.php');
                                                }
                                                else if(isset($_GET['workoutInput'])){

                                                    $this->weight->setWeight();
                                                }
                                                else if(isset($_GET['cardioInput'])){

                                               $this->cardio->setCardio();
                                                }
                                                else if(isset($_GET['admin'])){

                                                    include('assets/view/admin.php');
                                                }
                                                else if(isset($_GET['updateuser'])){

                                              $this->student->updateuser();
                                                }

                                                else {
                                                include('assets/view/profile.php');
                                                }

        } else {
            include('assets/view/homepage.php');
        }

    }

}

?>