<?php
  include_once 'header.php';
 ?>
 <?php
   if(!isset($_SESSION["useruid"])){
     header("location: index.php");
     exit();
   }
 ?>

 <div id="content">
   <h2>Uusi keikka</h2>
   <form action="includes/newevent.inc.php" method="post" enctype="multipart/form-data">
     <label for="header">Tapahtuman nimi</label><br><br>
     <input type="text" id="header" name="header"><br><br>
     <label for="date">Päivämäärä</label><br><br>
     <input type="date" id="date" name="date"><br><br>
     <label for="time">Aika</label><br><br>
     <input type="time" id="time" name="time"> <br><br>
     <label for="description">Tapahtuman kuvaus</label><br><br>
     <textarea rows="4" cols="50" name="description">Tapahtuman kuvaus...</textarea><br><br>
     <label for="address">Paikka</label><br><br>
     <input type="text" id="address" name="address"><br><br>
     <label>Select Image File:</label><br><br>
     <input type="file" name="image"><br><br>
     <button  type="submit" name="submit">Lisää keikka</button>
   </form>
   <?php
     if(isset($_GET["error"])){
       if($_GET["error"] == "emptyinput"){
         echo "<p>Täytä puuttuvat tiedot!</P>";
       }else if ($_GET["error"] == "stmtfailed") {
         echo "<p>Jokin meni vikaan</P>";
       }else if ($_GET["error"] == "none") {
         echo "<p>Keikan lisääminen onnistui!</P>";
       }else if ($_GET["error"] == "wrongfile") {
         echo "<p>Tiedosto ei kelpaa</P>";
       }else if ($_GET["error"] == "wrongsize") {
         echo "<p>Tiedosto on liian suuri</P>";
       }
     }
   ?>
 </div>



<?php
  include_once 'footer.php';
?>
