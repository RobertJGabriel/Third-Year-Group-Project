<?php
/**
 * Created by PhpStorm.
 * User: RobertGabriel
 * Date: 02/10/14
 * Time: 23:51
 */



class staffAvailability{

    var $staffId;
    var $date;
    var $startTime;
    var $endTime;

    public
    function __construct()    {

        $this->database = new databases();

    }

    public
    function __destruct()    {

    }

    public
    function setAvailabilTime(){

    }

    public function unsetAvailabilTime(){

    }

}

?>