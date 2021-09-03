<?php 
    // include "../helper/header.php";
    include_once "../includes/dbh.inc.php";
        include "../helper/admin-header.php";

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
    $resultCheck = mysqli_num_rows($result);
    $sql_moreInfo = "SELECT * FROM projects_more_info;";
    $result2 = mysqli_query($conn, $sql);
    // $resultCheck = mysqli_num_rows($result);

    // mysqli_free_result($result);
    // mysqli_close($conn);
    
    //Testing the query
    if (!$result){
      echo "SQL Statement FAILED";
      // die("Query FAILED" . mysqli_error());
    }
  ?>
</section>

<main class="basic">
    <table class="projectList">
      <thead>
        <tr>
          <th>Project Status:</th>
          <th>Project Name:</th>
          <th>Project Type:</th>
          <!-- <th>Project Start Date:</th> -->
        </tr>
      </thead>
      <tbody>
      <?php
      if ($resultCheck > 0){
        while ($project = mysqli_fetch_assoc($result)){
          echo "<tr>";
          echo '<td><a href="project_edit.php?project_id='.$project["project_id"].'">'.$project["project_status"]."</td>";
          echo '<td><a href="project_edit.php?project_id='.$project["project_id"].'">'.$project["project_name"].'</td>';
          echo "<td>".$project["project_type"]."</td>";
          // echo "<td>".$project["project_start"]."</td>";
          echo "</tr>";
        }
      }
    ?>      
      </tbody>
    </table>


</main>




<?php
  include "../helper/footer.php";
?>

