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

    public
    function __construct()    {

        $this->database = new databases();


    }

    public
    function __destruct()    {

    }


public
function setWeight(){

    $this->database->setWeight();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

    public
    function getWeight(){

       $this->weight= $this->database->getWeight();


    }

    public
    function getReps(){

        $this->reps =   $this->database->getReps();
        return $this->reps;
    }


    public
    function setSets(){

        $this->sets =   $this->database->getSets();
        return $this->sets;
    }



}

?>