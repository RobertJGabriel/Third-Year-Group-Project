<?php

include_once("assets/model/members.php");
include_once("assets/model/weight.php");
include_once("assets/model/schedules.php");
include_once("assets/model/database.php");
include_once("assets/model/cardio.php");


class Controller {
    var $student;
    var $schedules;
    var $weight;
    var $cardio;

    var $database;
    //contructor
    public
    function __construct()      {
        $this->student = new members();
        $this->schedules = new schedules();
        $this->weight = new weight();
        $this->cardio = new cardio();
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
                                                else if(isset($_GET['timetable'])){

                                                    include('assets/view/booked.php');
                                                }
                                                else if(isset($_GET['cancelbooking'])){

                                                    $this->schedules->cancelBook();

                                                }
      else if(isset($_GET['cancelschedule'])){

                                                    $this->schedules->cancelSchedule();

                                                }

                                                else if(isset($_GET['deleteuser'])){

                                                    $this->student->deleteUser();
                                                }

                                                else if(isset($_GET['viewBooking'])){

                                                    include('assets/view/viewBookings.php');
                                                }
                                                else if (isset($_GET['setTimeTable'])){

                                                    $this->schedules->setTimeTable();
                                                }
                                                else if (isset($_GET['weight'])){

                                                    $this->student->weight();
                                                }
                                                else if (isset($_GET['singleTrainer'])){

                                                    include('assets/view/singleTrainer.php');
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