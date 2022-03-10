<?php
  include_once 'header.php';
 ?>

 <section class="signup-form">
   <h2>Kirjaudu sisään</h2>
   <form action="includes/login.inc.php" method="post">
     <input type="text" name="uid" placeholder="Käyttäjätunnus..."><br></br>
     <input type="password" name="pwd" placeholder="Salasana..."><br></br>
     <button type="submit" name="submit">Kirjaudu</button>
   </form>
 </section>
 <?php
   if(isset($_GET["error"])){
     if($_GET["error"] == "emptyinput"){
       echo "<p>Täytä puuttuvat tiedot!</P>";

     }else if ($_GET["error"] == "loginfail") {
       echo "<p>Virheellinen kirjautuminen</P>";

     }
   }
 ?>
<?php
  include_once 'footer.php';
?>
