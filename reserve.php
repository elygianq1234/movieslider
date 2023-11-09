<?php

include('./config.php');

$img =  $_GET['reserve'];
$Fullname = $_GET['Fullname'];

$MobileNumber = $_GET['MobileNumber'];


echo $img;

"<br>";

echo $Fullname;

"<br>";

echo $MobileNumber;

echo $result = $mysqli->query("UPDATE `movies` SET Available = Available -1 WHERE imdbID = '$img' ");


header("location : index.php");
