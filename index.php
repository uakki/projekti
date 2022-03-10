<?php
  include_once 'header.php';
  require_once ('includes/dbh.inc.php');
 ?>

<div id="innercontent">
   <h1>Keikat</h1>
   <?php


   $query = "SELECT * FROM concerts";
   $results= mysqli_query($conn, $query);
   $row_count= mysqli_num_rows($results);



   while ($row = mysqli_fetch_array($results)) {
     $image = $row['concertsImage'];
     if(is_null($image)){
       $image = "stock.jpg";
     }
     echo "<div><h2>".($row['concertsName'])."</h2></div><div class='eventbox'><div class='imgbox' ><img src=images/".$image." alt='image' width='300' height='200'></div><div class='datetime'>".($row['concertsDate'])." klo ".($row['concertsTime'])."<div class='place'>".($row['concertsPlace'])."</div></div><br><div class='info'>".($row['concertsInfo'])."</div></div>";
   }

   ?>
<br>
</div>

<?php
  include_once 'footer.php';
?>
