<?php 
require_once "helper/header.php";
require_once "includes/dbh.inc.php";
require_once "includes/functions.inc.php";
$sql = "SELECT * FROM projects;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
?>

<div id="companyLogo">
  <h2>The Butterfield LLC</h2>
</div>
<section id="project">  

<main class="basic">
    <table class="projectList">
      <thead>
        <tr>
          <th colspan="2">Project Icon:</th>
          <th colspan="2">Project Status:</th>
          <th colspan="2">Project Name:</th>
          <th colspan="2">Project Type:</th>
          <!-- <th>Project Start Date:</th> -->
        </tr>
      </thead>
      <tbody>
      <?php
      if ($resultCheck > 0){
        while ($project = mysqli_fetch_assoc($result)){
          echo '<tr class="projectRow">';
          echo '<td colspan="2" class="projectDataPic"><img class="blogPicture" src="Images/'.$project['project_type_pic'].'"></td>';
          echo '<td colspan="2" class="projectData"><a href="project_info.php?project_id='.$project["project_id"].'">'.$project["project_status"]."</td>";
          echo '<td colspan="2" class="projectData"><a href="project_info.php?project_id='.$project["project_id"].'">'.$project["project_name"].'</td>';
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
  include "helper/footer.php";
?>

