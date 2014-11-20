<?php
/**
 * Created by PhpStorm.
 * User: RobertGabriel
 * Date: 02/10/14
 * Time: 23:55
 */





class cardio{

    var $bookingId;
    var $distance;
    var $duration;
    var $database;


    public
    function __construct()    {

        $this->database = new databases();
     //   $this->bookingId = $_SESSION["id"];

    }

    public
    function __destruct()    {

    }
	/**
	* Setters and getters.
	*
	*/
	public
	function getId(){
		return $this->bookingId;
	}
	public
	function getDistance(){
		return $this->distance;
	}

	public
	function getDuration(){
		return $this->duration;
	}
	public
	function setDuration($duration){
		$this->duration = $duration;
	}
	


    public
    function setCardio(){

$this->database->setCardio();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}

?>