<?php 
    include "helper/header.php";
    include_once "includes/dbh.inc.php";

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
		function make_links_clickable($text){
			return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
		}
  }
  else{
      echo "Error loading page!";
  }

?>

<main class="basic">
<br>
<?php 
if(isset($_SESSION["member"])){ ?>
  <h2 style="text-align: center;">MEMBER!<button>follow</button></h2> <!-- Change to chechbox so they can follow project -->
<?php } else { ?>
  <h2 style="text-align: center;">Current Project</h2>
<?php } ?>
  <div class="currentProjectOutline">
    <!-- Hard coded test values, will be loading this in dynamically -->
    <img src="Images/webDev.png" alt="Web Development"><!-- TODO: Get images to load dynamically -->
    <h3><strong>Project Name:</strong> <?php echo $project['project_name']; ?></h3>
    <!-- This was taken from tutorial previously mentioned -->
    <!-- Hard coding this in, will probably have to re-work this in the future -->
    <br>
    <label>Percentage of Completion: <?php echo $project["project_percentage"]."%";?></label> 
    <br>
    <div class="myProgress">
      <div class="myBar" style="width: <?php echo $project["project_percentage"]; ?>%;"></div>
    </div>
    <br>
    <br>
    <table>
      <tr>
        <td>Project Type:</td>
        <td><strong><?php echo $project["project_type"]?></strong></td>
      </tr>
      <tr>
        <td>Project Start:</td>
        <td><strong><?php echo $project_moreInfo["project_start"]?></strong></td>
      </tr>
    </table>
    
    <p><strong>Short Discription:</strong><br><br>
      <?php echo $project_moreInfo["project_shortInfo"]; ?>
    </p>
    <br>
  </div>
  <br><br>

  <!-- Thinking about doing a table in here, to make use to the entire width -->
  <!-- Or make a UL list that can go vertically instead of horizantially -->



  <h2 style="text-align: center; margin-bottom: none;">Recent Project Update</h2>
  <div class="currentProjectBlog">

<?php
    if ($project_blog_rows > 0){
        while ($project_blog = mysqli_fetch_assoc($result3)){
           echo '
           <h3 id="blogTitle"'.$project_blog["blog_title"].'</h3>
           <h5>'.$project_blog["blog_date"].'</h5>
           <p>'.$project_blog["blog_text"];'.</p>';
        echo "Working!";        
        }
      }
?>
  </div>
  <br>
</main>

<?php
  //Closing the connection to the DB
  mysqli_close($conn);
  include "helper/footer.php";
?>

