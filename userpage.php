
<?php
  include_once 'header.php';
 ?>
 <?php
   if(!isset($_SESSION["useruid"])){
     header("location: index.php");
     exit();
   }
 ?>
 <div id="innercontent">
   <h2>Omat keikat</h2>
   <form action="newevent.php" method="post">
     <button  type="submit" name="submit">Lisää keikka</button>
   </form>

 <?php
 $id = $_SESSION["userid"];
 require_once ('includes/dbh.inc.php');
 $query = "SELECT * FROM concerts WHERE usersId=($id)";
 $results= mysqli_query($conn, $query);
 $row_count= mysqli_num_rows($results);



 while ($row = mysqli_fetch_array($results)) {
   $image = $row['concertsImage'];
   if(is_null($image)){
     $image = "stock.jpg";
   }
   echo "<div class='eventbox'><div class='imgbox' ><img src=images/".$image." alt='image' width='300' height='200'></div><div class='datetime'>".($row['concertsDate'])."</div><div><span>".($row['concertsName'])."</span></div><div class='info'>".($row['concertsInfo'])."</div><div class='place'>".($row['concertsPlace'])."</div></div>";
 }

 ?>
</div>

<?php
  include_once 'footer.php';
?>
