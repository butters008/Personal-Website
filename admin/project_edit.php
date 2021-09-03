<?php
// Admin project edit so I 
    include "../helper/admin-header.php";
    include_once "../includes/dbh.inc.php";


    //Setting up the information to showcase the project on the webpage
    if(isset($_GET['project_id'])){
  		$id = mysqli_real_escape_string($conn, $_GET['project_id']);
      $sql = "SELECT * FROM projects WHERE project_id = $id;";
      $result = mysqli_query($conn, $sql);
      $project = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      $progressBar = $project["project_percentage"];
      $sql_otherTable = "SELECT * FROM projects_more_info WHERE project_id = $id;";
      $result = mysqli_query($conn, $sql_otherTable);
      $project_moreInfo = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      $sql_blog = "SELECT * FROM projects_blog WHERE project_id = $id ORDER BY blog_id DESC;";
      $result3 = mysqli_query($conn, $sql_blog);
      // $project_blog = mysqli_fetch_assoc($result);
      $project_blog_rows = mysqli_num_rows($result3);




      //Checking to see if the user is logged in or not
      if (isset($_SESSION["userID"])){
        header("location: /Personal-Website/project_edit.php?project_id=$id");
      }
  }
  else{
      echo "Error loading page!";
  }

?>

<main class="basicLayout">
<br>
    
    <div id="admin-projectOutline">

 
    <!-- Going to have to break this up so that I can figure this out one by one -->

    <form action="../includes/updateProject.php" method="post">
    <h2 style="text-align: center;">Project Details &emsp;<input type="submit" value="Submit"></h2>
      
      <table>
        <tbody>
          <tr>
            <th class="infoDisplayed">Project Information</th>
            <th class="infoDisplayed">Project Data (Displayed)</th>

<!-- 
*****************
TODO - I will break this table into multiple forms so I can chess my out of this,
        by making basic project info have one inc, more info table have a different inc and ect ect

*****************
 -->


          </tr>
          <!-- STATUS -->
          <!-- TODO - going to nest these together, it makes since atm this is for future implementation -->
          <tr>
            <td class="infoDisplayed">Project Status</td>
            <td class="infoDisplayed"><input type="text" name="project_status" id="projectStatus" value="<?php echo $project['project_status']; ?>"></td>
          </tr>
          <!-- PERCENTAGE COMPLETED -->
          <tr>
            <td class="infoDisplayed">COMPLETION RATE</td>
            <td class="infoDisplayed"><input type="text" name="project_percentage" id="projectPercentage" value="<?php echo $project["project_percentage"]."%";?>"></td>
          </tr>
          <!-- NAME -->
          <tr>
            <td class="infoDisplayed">Project Name</td>
            <td class="infoDisplayed"><input type="text" name="project_name" id="projectName" value="<?php echo $project['project_name']; ?>"></td>
          </tr>
          <!-- TYPE -->
          <tr>
            <td class="infoDisplayed">Project Type</td>
            <td class="infoDisplayed"><input type="text" name="project_type" id="projectType" value="<?php echo $project['project_type']; ?>"></td>
          </tr>
          <!-- START DATE -->
          <tr>
            <td class="infoDisplayed">START DATE</td>
            <td class="infoDisplayed"><input type="text" name="project_start" id="projectStart" value="<?php echo $project_moreInfo["project_start"];?>"></td>
          </tr>
          <!-- END DATE  -->
          <!-- TODO: Going to have to check to see if there is an end date (used placeholder and start date for now)-->
          <tr>
            <td class="infoDisplayed">END DATE</td>
            <td class="infoDisplayed"><input type="text" name="project_start" id="projectStart" placeholder="<?php echo $project_moreInfo["project_start"];?>"></td>
          </tr>
        </tbody>
      </table>
      <div class="admin-projectDescription">
        <h3>Short Discription:</h3>
        <textarea name="project_short" id="projectShort" cols="50" rows="5" ><?php echo $project_moreInfo["project_shortInfo"];?></textarea>
        <h3>Long Discription:</h3>
        <textarea name="project_long" id="projectLong" cols="50" rows="10" ><?php echo $project_moreInfo["project_longInfo"];?></textarea>
      </div>
      <p><strong></strong><br><br>      


    </form>




    <!-- <h2 style="text-align: center; margin-bottom: none;">Recent Project Update</h2> -->
    <div class="currentProjectBlog">
<?php
    // if ($project_blog_rows > 0){
    //     while ($project_blog = mysqli_fetch_assoc($result3)){
    //        echo '
    //        <h3 id="blogTitle"'.$project_blog["blog_title"].'</h3>
    //        <h5>'.$project_blog["blog_date"].'</h5>
    //        <p>'.$project_blog["blog_text"];'.</p>';
    //     echo "Working!";        
    //     }
    //   }
?>
    </div>
    <br>
</main>

<?php
//Closing the connection to the DB
mysqli_close($conn);
include "../helper/footer.php";
?>