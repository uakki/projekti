<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
  $result;
  if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}

function emptyInputEvent($name, $date, $time, $description, $address){
  $result;
  if(empty($name) || empty($date) || empty($time) || empty($description) || empty($address)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}


function invalidUid($username){
  $result;
  if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}

function invalidEmail($email){
  $result;
  if(!filter_var(($email), FILTER_VALIDATE_EMAIL)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}

function pwdMatch($pwd, $pwdRepeat){
  $result;
  if($pwd !== $pwdRepeat){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}

function uidExists($conn, $username, $email){
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData)){
    return $row;
  }else{
    $result = false;
    return $result;
  }

  mysql_stmt_close($stmt);

}
function createUser($conn, $name, $email, $username, $pwd){
  $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../signup.php?error=none");
}

function createEvent($conn, $name, $date, $time, $description, $address, $id, $imageNewName){
  $sql = "INSERT INTO concerts (usersId, concertsName, concertsDate, concertsTime, concertsInfo, concertsPlace, concertsImage) VALUES (?, ?, ?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../newevent.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sssssss", $id, $name, $date, $time, $description, $address, $imageNewName);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../newevent.php?error=none");
}

function emptyInputLogin($username, $pwd){
  $result;
  if(empty($username) || empty($pwd)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}

function loginUser($conn, $username, $pwd){
  $uidExists = uidExists($conn, $username, $username);
  if($uidExists === false ){
    header("location: ../login.php?error=loginfail");
    exit();
  }

  $pwdHash = $uidExists["usersPwd"];
  $checkPwd = password_verify($pwd, $pwdHash);

  if($checkPwd === false){
    header("location: ../login.php?error=loginfail");
    exit();
  }else if($checkPwd === true){
    session_start();
    $_SESSION["userid"] =  $uidExists["usersId"];
    $_SESSION["useruid"] =  $uidExists["usersUid"];
    header("location: ../index.php");
    exit();
  }


}
