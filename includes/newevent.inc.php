<?php
session_start();
if (isset($_POST["submit"])){
  $name = $_POST["header"];
  $date = $_POST["date"];
  $time = $_POST["time"];
  $description = $_POST["description"];
  $address = $_POST["address"];
  $id = $_SESSION["userid"];
  $image = $_FILES["image"];
  $fileType = $image["type"];
  $fileError = $image["error"];
  $fileSize = $image["size"];
  $fileName = $image["name"];
  $fileExt = explode(".", $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array("jpg", "jpeg", "png");
  $fileTempName = $image["tmp_name"];
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputEvent($name, $date, $time, $description, $address) !== false){
    header("location: ../newevent.php?error=emptyinput");
    exit();
  } elseif(!in_array($fileActualExt, $allowed)){
    header("location: ../newevent.php?error=wrongfile");
    exit();
  } elseif($fileSize > 2000000){
    header("location: ../newevent.php?error=wrongsize");
    exit();
  }

  $imageNewName = uniqid("", true) . "." . $fileActualExt;
  $imageDestination = "../images/" . $imageNewName;
  move_uploaded_file($fileTempName, $imageDestination);
  createEvent($conn, $name, $date, $time, $description, $address, $id, $imageNewName);


}else {
  header("location: ../signup.php");
  exit();
}
