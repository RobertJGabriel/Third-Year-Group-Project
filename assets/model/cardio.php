<?php


class cardio{


    var $bookingId;
    var $distance;
    var $duration;
    var $database;

    // -- Function Name : __construct
    // -- Params :
    // -- Purpose :
    public
    function __construct()    {
        $this->database = new databases();
    }


    // -- Function Name : __destruct
    // -- Params :         None
    // -- Purpose : None for the moment
    public
    function __destruct()    {
    }


    // -- Function Name : getId
    // -- Params :  None;
    // -- Purpose : Gets booking Id
    public
    function getId(){
        return $this->bookingId;
    }



    // -- Function Name : getDistance
    // -- Params :  None
    // -- Purpose : Gets Distance
    public
    function getDistance(){
        return $this->distance;
    }

    // -- Function Name : getDuration
    // -- Params : None
    // -- Purpose : Gets Duration
    public
    function getDuration(){
        return $this->duration;
    }

    // -- Function Name : setDuration
    // -- Params : $duration
    // -- Purpose : Set Duration of the run

    public
    function setDuration($duration){
        $this->duration = $duration;
    }


    // -- Function Name : setCardio
    // -- Params :  None
    // -- Purpose : Save the cardio Session to the database.
    public
    function setCardio(){
        $this->database->setCardio(); //Save it to the database.
        header('Location: ' . $_SERVER['HTTP_REFERER']);// Brings them Back
    }

}

?>