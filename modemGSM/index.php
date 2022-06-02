<?php

$num='0695979933';   // <<-- changer le numero de téléphone

$latitude=$_GET['latitude'];
$longitude=$_GET['longitude'];
$time=$_GET['time'];
$altitude=$_GET['altitude'];
$date=date('H:i:s',$time);

$url="https://www.google.fr/maps/place/$latitude,$longitude";

//$smsDate = "gammu-smsd-inject TEXT 0770451466 -text \"$date"";
$sms = "gammu-smsd-inject TEXT $num -text \"
Heure : $date
Altitude : $altitude m
Latitude : $latitude 
Longitude : $longitude
$url\"";
shell_exec($sms);
?>


