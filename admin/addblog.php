<?php
include "../helper/admin-header.php";
include_once "../includes/dbh.inc.php";

//Setting up the information to showcase the project on the webpage
if(isset($_GET['project_id'])){
    $id = mysqli_real_escape_string($conn, $_GET['project_id']);
    $sql = "SELECT * FROM projects WHERE project_id = $id;";
    $result = mysqli_query($conn, $sql);
    $project = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
  
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
<!-- BASIC INFO -->
  <form action="addblog.inc.php" method="post">
  <h2 class="projectFormTitle" style="text-align: center;">Basic Project Information</h2>      
  <table>
    <tbody>
    <!-- NAME -->
    <tr>
        <!-- Hacky way to do this, but I think it works -->
        <td class="hiddenInfo"><strong>Project ID*</strong></td>
        <td class="hiddenInfo"><input name="projectID" type="text" value="<?php echo $project['project_id']; ?>" readonly></td>
      </tr>
      <tr>
        <td class="infoDisplayed"><strong>Project Name</strong></td>
        <td class="infoDisplayed"><?php echo $project['project_name']; ?></td>
      </tr>
    </tbody>
  </table>
  <div class="admin-projectDescription">
    <h3>Blog Date</h3>
        <input name="blogDate" id="blogDate" type="date" required>
    <h3>Blog Title:</h3>
        <input name="blogTitle" id="blogTitle" type="text" required>
    <h3>Blog Message:</h3>
      <textarea name="blogText" id="blogText" cols="50" rows="5" required><?php echo $project_moreInfo["project_shortInfo"];?></textarea>
  </div>
  <br><br>
  <button class="adminSubmitButton" name="submit" type="submit">Submit Blog</button>     
  </form>
</div><!-- END - admin-projectOutline -->

<div id="optionsForAdmin">
  <ul>
    <li class="admin-list-header">Project Options</li>
    <ul>
      <li class="admin-list-button"><?php echo'<a href="addblog.php?project_id='.$project["project_id"].'">';?>Add Blog</a></li>
      <li class="admin-list-button"><?php echo'<a href="#addPictures.php?project_id='.$project["project_id"].'">';?>Add Pictures</a></li>
      <li class="admin-list-button"><?php echo'<a href="bloglist.php?project_id='.$project["project_id"].'">';?>Blog List</a></li>
    </ul>
    <br>
    <li class="admin-list-header">General Options</li>
    <ul>
      <li class="admin-list-button"><a href="admin_addproject.php">Add Project</a></li>
      <li class="admin-list-button"><a href="#RemoveProject">Remove Project</a></li>
    </ul>

  </ul>
</div><!-- END - optionsForAdmin -->
</div>
</main>

<?php
    //Closing the connection to the DB
    mysqli_close($conn);
    include "../helper/footer.php";
?>