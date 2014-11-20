<?php

include_once("assests/model/student.php");
include_once("assests/model/weight.php");
include_once("assests/model/schedules.php");
include_once("assests/model/database.php");
include_once("assests/model/cardio.php");


class Controller {
    var $student;
    var $schedules;
    var $weight;
    var $cardio;

    var $database;
    
    public
    function __construct()      {
        $this->student = new student();
        $this->schedules = new schedules();
        $this->weight = new weight();
        $this->cardio = new cardio();
    }

    public
    function invoke(){

        if(isset($_SESSION['id'])){

            if (isset($_GET['profile'])){
 include('assests/view/profile.php');
            } else
                if (isset($_GET['booking'])){
                    include('assests/view/booking.php');
                } else
                    if (isset($_GET['settings']))        {
                        include('assests/view/settings.php');
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
                                                    include('assests/view/workout.php');
                                                }
                                                else if(isset($_GET['workoutInput'])){

                                                    $this->weight->setWeight();
                                                }
                                                else if(isset($_GET['cardioInput'])){

                                               $this->cardio->setCardio();
                                                }
                                                else if(isset($_GET['admin'])){

                                                    include('assests/view/admin.php');
                                                }
                                                else if(isset($_GET['updateuser'])){

                                              $this->student->updateuser();
                                                }
                                                else if(isset($_GET['timetable'])){

                                                    include('assests/view/booked.php');
                                                }
                                                else if(isset($_GET['cancelbooking'])){

                                                    $this->schedules->cancelBook();

                                                }


                                                else if(isset($_GET['deleteuser'])){

                                                    $this->student->deleteUser();
                                                }

                                                else if(isset($_GET['viewBooking'])){

                                                    include('assests/view/viewBookings.php');
                                                }
                                                else if (isset($_GET['setTimeTable'])){

                                                    $this->schedules->setTimeTable();
                                                }
                                                else if (isset($_GET['weight'])){

                                                    $this->student->weight();
                                                }
                                                else if (isset($_GET['singleTrainer'])){

                                                    include('assests/view/singleTrainer.php');
                                                }



                                                else {
                                                include('assests/view/profile.php');
                                                }

        } else {
            include('assests/view/homepage.php');
        }

    }

}

?>