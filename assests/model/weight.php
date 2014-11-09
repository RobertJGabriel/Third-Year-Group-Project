<?php
/**
 * Created by PhpStorm.
 * User: RobertGabriel
 * Date: 02/10/14
 * Time: 23:56
 */
class weight{


    var $id;
    var $weight;
    var $reps;
    var $sets;
    var $database;


    // -- Function Name : __construct
    // -- Params :
    // -- Purpose : Starts Database Connection
    public
    function __construct()    {
        $this->database = new databases();
    }


    // -- Function Name : __destruct
    // -- Params :  None
    // -- Purpose : None
    public
    function __destruct()    {
    }


    // -- Function Name : setWeight
    // -- Params :
    // -- Purpose : Sets the Weight for the chart
    public
    function setWeight(){
        $this->database->setWeight();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


    // -- Function Name : getWeight
    // -- Params :
    // -- Purpose : Gets the weight for the gym reps
    public
    function getWeight(){
        $this->weight= $this->database->getWeight();
    }



    // -- Function Name : getReps
    // -- Params :
    // -- Purpose : Gets the amount of the reps
    public
    function getReps(){
        $this->reps =   $this->database->getReps();
        return $this->reps;
    }


    // -- Function Name : setSets
    // -- Params :
    // -- Purpose :     Sets the amoutn of sets in the gym
    public
    function setSets(){
        $this->sets =   $this->database->getSets();
        return $this->sets;
    }

}

?>