<?php

$serverName = "local";
$dBUserName = "azure";
$dBPassword = "6#vWHD_$";
$dBName = "project";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if (!$conn){
  die("Connection failed: " . mysqli_connect_error());
}
