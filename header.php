<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="fi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <?php
    $page = $_SERVER['PHP_SELF'];
    if($page=="/projekti/index.php"){
      echo "<a href='index.php' class='active'>Etusivu</a>";
      if(isset($_SESSION["useruid"])){
        echo "<a href='userpage.php'>Omat</a>";
        echo "<a href='includes/logout.inc.php'>Kirjaudu ulos</a>";
      }else{
        echo "<a href='signup.php'>Rekisteröidy</a>";
        echo "<a href='login.php'>Kirjaudu</a>";
      }

    }elseif($page=="/projekti/signup.php"){
      echo "<a href='index.php'>Etusivu</a>";
      if(isset($_SESSION["useruid"])){
        echo "<a href='userpage.php'>Omat</a>";
        echo "<a href='includes/logout.inc.php'>Kirjaudu ulos</a>";
      }else{
        echo "<a href='signup.php' class='active'>Rekisteröidy</a>";
        echo "<a href='login.php'>Kirjaudu</a>";
      }

    }elseif($page=="/projekti/login.php"){
      echo "<a href='index.php'>Etusivu</a>";
      if(isset($_SESSION["useruid"])){
        echo "<a href='userpage.php'>Omat</a>";
        echo "<a href='includes/logout.inc.php'>Kirjaudu ulos</a>";
      }else{
        echo "<a href='signup.php'>Rekisteröidy</a>";
        echo "<a href='login.php' class='active'>Kirjaudu</a>";
      }
    }elseif($page=="/projekti/userpage.php"){
      echo "<a href='index.php'>Etusivu</a>";
      if(isset($_SESSION["useruid"])){
        echo "<a href='userpage.php' class='active'>Omat</a>";
        echo "<a href='includes/logout.inc.php'>Kirjaudu ulos</a>";
      }else{
        echo "<a href='signup.php'>Rekisteröidy</a>";
        echo "<a href='login.php'>Kirjaudu</a>";
      }
    }elseif($page=="/projekti/newevent.php"){
      echo "<a href='index.php'>Etusivu</a>";
      if(isset($_SESSION["useruid"])){
        echo "<a href='userpage.php' class='active'>Omat</a>";
        echo "<a href='includes/logout.inc.php'>Kirjaudu ulos</a>";
      }else{
        echo "<a href='signup.php'>Rekisteröidy</a>";
        echo "<a href='login.php'>Kirjaudu</a>";
      }
    }

   ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<div id="content">
