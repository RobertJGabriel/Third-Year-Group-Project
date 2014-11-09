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


    // -- Function Name : setWeight
    // -- Params :
    // -- Purpose :
    public
    function setWeight(){
        $this->database->setWeight();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


    // -- Function Name : getWeight
    // -- Params :
    // -- Purpose :
    public
    function getWeight(){
        $this->weight= $this->database->getWeight();
    }



    // -- Function Name : getReps
    // -- Params :
    // -- Purpose :
    public
    function getReps(){
        $this->reps =   $this->database->getReps();
        return $this->reps;
    }


    // -- Function Name : setSets
    // -- Params :
    // -- Purpose :
    public
    function setSets(){
        $this->sets =   $this->database->getSets();
        return $this->sets;
    }

}

?>