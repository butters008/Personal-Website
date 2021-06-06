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
    $sql = "SELECT * FROM projects WHERE project_id = 1;";
    $result = mysqli_query($conn, $sql);
    $project = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $progressBar = $project["project_percentage"];
    $sql_otherTable = "SELECT * FROM projects_more_info WHERE project_id = 1;";
    $result = mysqli_query($conn, $sql_otherTable);
    $project_moreInfo = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $sql_blog = "SELECT * FROM projects_blog WHERE project_id = 1;";
    $result = mysqli_query($conn, $sql_blog);
    $project_blog = mysqli_fetch_assoc($result);
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
  <br>
    <h2 style="text-align: center;">Current Project</h2>
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
    <h5 style="text-align: center;">click here for project page</h5>
    <div class="currentProjectBlog">
      <h3 id="blogTitle"><?php echo $project_blog["blog_title"]; ?></h3>
      <h5><?php echo $project_blog["blog_date"]; ?></h5>
      <p><?php echo $project_blog["blog_text"]; ?></p>
    </div>
    <br>
</main>




<?php
  include "helper/footer.php";
?>

<script>

var iprogress = 0;

function updateProgress(){
  if (iprogress == 0) {
    iprogress = 1;
    var elem = document.getElementById("myBar");
    var width = <?php echo $progressBar; ?>;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        iprogress = 0;
      } else {
        width++;
        elem.style.width = width + "%";
        elem.innerHTML = width + "%";
      }
    }
  }  
}

</script>


