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
    // -- Params :
    // -- Purpose :
    public
    function __destruct()    {
    }


    // -- Function Name : getId
    // -- Params :
    // -- Purpose :
    public
    function getId(){
        return $this->bookingId;
    }



    // -- Function Name : getDistance
    // -- Params :
    // -- Purpose :
    public
    function getDistance(){
        return $this->distance;
    }

    // -- Function Name : getDuration
    // -- Params :
    // -- Purpose :
    public
    function getDuration(){
        return $this->duration;
    }

    // -- Function Name : setDuration
    // -- Params : $duration
    // -- Purpose :
    public
    function setDuration($duration){
        $this->duration = $duration;
    }


    // -- Function Name : setCardio
    // -- Params :
    // -- Purpose :
    public
    function setCardio(){
        $this->database->setCardio();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}

?>