<?php
$con = mysqli_connect ("localhost","root","","gym" );

if (mysqli_connect_errno ()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error ();
}

session_start();
$id = $_SESSION["id"];
$result = mysqli_query($con,"Select * FROM cardio where memberId = '$id' group by date");
$count=mysqli_num_rows($result);

if($count!=0){
    while ($row = $result->fetch_assoc()) {
        echo $row['distance']. "/" . $row['duration']. "/" ;
    }

}

mysqli_close($con);
?>