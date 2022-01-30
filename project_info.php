<?php 
require_once "helper/header.php";
require_once "includes/dbh.inc.php";
require_once "includes/functions.inc.php";

//Setting up the information to showcase the project on the webpage
if(isset($_GET['project_id'])){
  $id = mysqli_real_escape_string($conn, $_GET['project_id']);
  
  $sql = "SELECT * FROM projects WHERE project_id = $id;";
  $result = mysqli_query($conn, $sql);
  $project = mysqli_fetch_assoc($result);
  mysqli_free_result($result);

  $sql_otherTable = "SELECT * FROM projects_more_info WHERE project_id = $id;";
  $result = mysqli_query($conn, $sql_otherTable);
  $project_moreInfo = mysqli_fetch_assoc($result);
  mysqli_free_result($result);

  $sql_blog = "SELECT * FROM projects_blog WHERE project_id = $id ORDER BY blog_id DESC;";
  $result3 = mysqli_query($conn, $sql_blog);
  $project_blog_rows = mysqli_num_rows($result3);

  //Trying to get piechart read from a DB
  $sql_construction = "SELECT * FROM projects_construction WHERE project_id = $id;";
  $result_cons = mysqli_query($conn, $sql_construction);
  $project_moreInfo = mysqli_fetch_assoc($result_cons);
  // mysqli_free_result($result);

  // $sql_projInfo = "SELECT * FROM projects_Info WHERE project_id = $id ORDER BY infoID DESC;";
  // $result3 = mysqli_query($conn, $sql_blog);
  // $project_blog_rows = mysqli_num_rows($result3);
  // mysqli_free_result($result);

  //Checking to see if the user is logged in or not
  if (isset($_SESSION["userID"])){
    header("location: /Personal-Website/project_edit.php?project_id=$id");
  }
    
  function make_links_clickable($text){
    return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
  }
}else{
  echo "Error loading page!";
}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Program', 'Technologies used:'],
      ['HTML',     9],
      ['CSS',      8],
      ['JavaScript',  1],
      ['PHP', 5.5],
      ['MySQL',    2]
    ]);

    var options = {
      title: 'Hours of all tehcnologies used',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>

<div id="companyLogo">
  <h2>The Butterfield LLC</h2>
</div>

<main class="basic">
<br>
<!-- Make the if(isset($_SESSION["member"])) into if(isset($_SESSION["admin"])),
 so that I do not have to change multiple pages (I hope).
Also, having a subscribe button will be something that everyone can see but diabled if I am logged in as admin-->
<div class="projectHeader">
  <img class="blogPictureProject" src="Images/<?php echo $project['project_type_pic']; ?>" alt="Web Development">
  <h3 class="projectTypeText">&emsp;<?php echo $project['project_type']; ?></h3>
</div>

<section id="project">  

  <div class="pieTracker">
  <h2><strong>PROJECT NAME: <?php echo $project['project_name']; ?></strong></h2>  
    <div id="donutchart"></div>
  </div><!-- End of projectTracker -->
</section><!-- END OF project  -->

<div class="blogLayoutUpdateText">
  <h2>Project Summary</h2>
</div>
<div class="projectSummary">
  <?php echo $project_moreInfo['project_longInfo'];?>
</div>

<br>
<div class="blogLayoutUpdateText">
    <h2>All Project Updates </h2>  
</div>
<?php
if ($project_blog_rows > 0){
    while ($project_blog = mysqli_fetch_assoc($result3)){ 
      // echo "hello";
?>
<div class="blogLayout">

<p class="blogTitle"><?php echo $project_blog["blog_title"]; echo "&emsp;".$project_blog["blog_date"]; ?></p>
<table>
  <tr>
    <td colspan="3" rowspan="3"><img class="blogPicture" src="Images/<?php echo $project_blog['blog_image'];?>" alt="<?php echo $project_blog['blog_image'];?>"></td>
    <td colspan=".5" rowspan=".5"><p class="blogText"><?php echo $project_blog["blog_text"]; ?></p><br></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
</div>  
<?php        
  }
}
?>
  </div>
  <br>
</main>

<?php
  include "helper/footer.php";
?>

