<?php

$serverName = "127.0.0.1:50690";
$dBUserName = "azure";
$dBPassword = "6#vWHD_$";
$dBName = "project";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if (!$conn){
  die("Connection failed: " . mysqli_connect_error());
}
