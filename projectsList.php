<?php 
    include "helper/header.php";

    //This is for connecting to the local DB
    //Make the connection seperate later on
    $conn = mysqli_connect("localhost", "root", "", "butterfield");

?>

<!-- This is for any debug message to appear on one area of the screen and trying to make this easier...I hope -->
<section id="debug">
  <?php 
    //Testing the connection
    if ($conn){
      echo "connected";
    }else{
      echo "not connected";
    }
    
    //Grabbing Data
    $sql = "SELECT * FROM projects;";
    $result = mysqli_query($conn, $sql);
    $project = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
    
    //Testing the query
    if (!$result){
      echo "SQL Statement FAILED";
      // die("Query FAILED" . mysqli_error());
    }
  ?>
</section>

<main class="basic">


</main>




<?php
  include "helper/footer.php";
?>

