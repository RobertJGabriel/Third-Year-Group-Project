<?php
include_once("../model/database.php");

//echo $_GET['date'];

    $database = new databases();
//get date and trainer id from GET

    $dateValue = $_GET['date'];
    //$dateValue = $dateValue.rtrim("0");

    $trainerIdValue = $_GET['trainerId'];
//read trainer details for the specified day
////echo $trainerIdValue;
//echo $dateValue;
    $result = $database->getTrainerDaySchedule($trainerIdValue, $dateValue);
    $count=mysqli_num_rows($result);

$arrOfRes=array();
$str="";
while ($row = $result->fetch_assoc()) {
    $res =  implode(",", $row);
    $str .= $res . "/";
}

  echo rtrim($str, "/");
?>