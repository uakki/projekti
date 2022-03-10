<?php
  include_once 'header.php';
 ?>

<section class="signup-form">
  <h2>Rekisteröidy</h2>
  <form action="includes/signup.inc.php" method="post">
    <input type="text" name="name" placeholder="Full name...">
    <input type="text" name="email" placeholder="Email...">
    <input type="text" name="uid" placeholder="User name...">
    <input type="password" name="pwd" placeholder="Password...">
    <input type="password" name="pwdrepeat" placeholder="Repeat password...">
    <button type="submit" name="submit">Sign Up</button>
  </form>
</section>

<?php
  if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
      echo "<p>Täytä puuttuvat tiedot!</P>";

    }else if ($_GET["error"] == "invaliduid") {
      echo "<p>Virheellinen käyttäjätunnus</P>";

    }else if ($_GET["error"] == "invalidemail") {
      echo "<p>Virheellinen sähköposti</P>";

    }else if ($_GET["error"] == "passwordsmatch") {
      echo "<p>Salasanat eivät täsmää</P>";

    }else if ($_GET["error"] == "usernametaken") {
      echo "<p>Käyttäjätunnus varattu</P>";

    }else if ($_GET["error"] == "stmtfailed") {
      echo "<p>Jokin meni vikaan</P>";

    }else if ($_GET["error"] == "none") {
      echo "<p>Käyttäjätunnuksen luominen onnistui!</P>";
    }

  }
?>

<?php
  include_once 'footer.php';
?>
