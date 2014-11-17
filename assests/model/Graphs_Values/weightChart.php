<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
    die('Could not connect: ' . mysql_error());
}

session_start();
$id = $_SESSION["id"];
mysql_select_db("gym", $con);

$query = mysql_query("Select * FROM workout where memberId = '$id' group by setId");
$category = array();
$category['name'] = 'Month';

$series1 = array();
$series1['name'] = 'Set One';

$series2 = array();
$series2['name'] = 'Set Two';

$series3 = array();
$series3['name'] = 'Set Three';

while($r = mysql_fetch_array($query)) {

    $category['data'][] = $r['date'];
    if ($r['setId']== 1){
        $series1['data'][] = $r['weight'];


    }else  if ($r['setId']== 2){
        $series2['data'][] = $r['weight'];


    } else  if ($r['setId']== 3){
        $series3['data'][] = $r['weight'];
    }

    $category['data'][] = $r['date'];
  //  $series1['data'][] = $r['reps'];
   // $series2['data'][] = $r['reps'];
//    $series3['data'][] = $r['weight'];
}

$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);
array_push($result,$series3);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>