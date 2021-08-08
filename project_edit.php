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
        $project_blog_rows = mysqli_num_rows($result3);
  
  
        //Closing the connection to the DB
        mysqli_close($conn);
   
          function make_links_clickable($text){
              return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
          }
    }
    else{
        echo "Error loading page!";
    }
  
?>

<nav class="projectMenu">
    <ul class="menubar-nav">

        <li class="nav-item">
            <img src="Images/editProject.jpg" alt="Image for Project Edit" 
            style="max-height: 32px;
                max-width: 32px;">
            <a href="#update-project.php" class="item-link"> Project Details</a>
        </li>
        <li class="nav-item">
            <a href="#add-blog.php" class="item-link">Add Blog Post</a>
        </li>
        <li class="nav-item">
            <a href="#updateProject" class="item-link">Update Percentage</a>
        </li>
        <li class="nav-item">
            <a href="#deletePorject" class="item-link">Delete Project</a>
        </li>
    </ul>        
</nav>
<main class="basic">
<br>

<!-- Going to make the side navigation here! -->
    


    <h2 style="text-align: center;">Current Project</h2>
    <div class="currentProjectOutline">

<?php
    //Checking to see if the user is logged in or not
    if (isset($_SESSION["userID"])){
    ?>
    <!-- TODO: Get images to load dynamically - Will have to look this up! -->
    <img src="Images/webDev.png" alt="Web Development">
    <h3><input type="text" name="name" placeholder="Name" required> </h3>
    <!-- This was taken from tutorial previously mentioned -->
    <!-- Hard coding this in, will probably have to re-work this in the future -->
    <br>
    <label>Percentage of Completion: <?php echo $project["project_percentage"]."%";?></label> 
    <br>
    <div class="myProgress">
    <div class="myBar" style="width: <?php echo $project["project_percentage"]; ?>%;"></div>
    </div><br><br>

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
    </div><br><br>
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
    }else{
        echo 'ERROR LOADING PAGE!';
        echo 'Please log in to load the information';
    }
?>


<?php
  include "helper/footer.php";
?>

