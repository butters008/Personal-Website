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
      <label>Percentage of Completion: <?php echo "15%";?></label> 
      <br>
      <div class="myProgress">
        <div class="myBar"></div>
      </div>
      <br>
      <br>

      <p><strong>Short Discription</strong>
        <?php echo "Temp seeded data: This is going to contain a small description of the project "; ?>
      </p>
    </div>
    <br><br>

    <!-- Thinking about doing a table in here, to make use to the entire width -->
    <!-- Or make a UL list that can go vertically instead of horizantially -->

    <h2 style="text-align: center; margin-bottom: none;">Recent Project Updates</h2>
    <h5 style="text-align: center;">click here for project page</h5>
    <div class="currentProjectBlog">
      <h3>Blog title</h3>
      <h5>date of blog</h5>
      <p>This will have the entire blog text, not matter how much text there is</p>
    </div>
    <br>
</main>




<?php 
    include "helper/footer.php";
?>

<script>

var iprogress = 0;

function move() {
  if (iprogress == 0) {
    iprogress = 1;
    var elem = document.getElementById("myBar");
    var width = 10;
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


