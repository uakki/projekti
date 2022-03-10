<?php

$serverName = "127.0.0.1";
$dBUserName = "azure";
$dBPassword = "6#vWHD_$";
$dBName = "project";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName, 50690);

if (!$conn){
  die("Connection failed: " . mysqli_connect_error());
}
