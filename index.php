<?php
// All Required Files
require_once "helper/header.php";
require_once "includes/dbh.inc.php";
require_once "includes/functions.inc.php";
$sql = "SELECT * FROM projects WHERE project_featured = 1;";
$result = mysqli_query($conn, $sql);
$project = mysqli_fetch_assoc($result);
mysqli_free_result($result);

//Testing the query
if (!$result){
  echo "SQL Statement FAILED";
  die("Query FAILED" . mysqli_error());
}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Program', 'Languages used in:'],
      ['HTML',     5.5],
      ['CSS',      3.5],
      ['JavaScript',  1],
      ['PHP', 2.5],
      ['MySQL',    1]
    ]);

    var options = {
      title: 'Hours of Programming languages used',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>

<div id="companyLogo">
  <h2>The Butterfield LLC</h2>
</div>
<section id="project">  

  <div class="pieTracker">
  <h2><strong>CURRENT PROJECT: <?php echo $project['project_name']; ?></strong></h2>  
    <div id="donutchart"></div>
  </div><!-- End of projectTracker -->
</section><!-- END OF project  -->

<div class="blog">
<?php 
  $sqlBlog = "SELECT * FROM projects_blog WHERE project_id = 1 ORDER BY blog_id DESC;";
  $resultBlog = mysqli_query($conn, $sqlBlog);
  $projectBlog = mysqli_fetch_assoc($resultBlog);
  mysqli_free_result($resultBlog);

  //Testing the query
if (!$result){
  echo "BLOG SQL Statement FAILED";
  die("BLOG Query FAILED" . mysqli_error());
}
?>

  <div class="blogLayout">
    <h2>Most Recent Update (<?php echo $projectBlog["blog_date"]; ?>)</h2>
    <p class="blogTitle"><?php echo $projectBlog["blog_title"]; ?></p>
    <table>
      <tr>
        <td colspan="3" rowspan="3"><img class="blogPicture" src="Images/<?php echo $projectBlog['blog_image'];?>" alt="<?php echo $projectBlog['blog_image'];?>"></td>
        <td colspan=".5" rowspan=".5"><p class="blogText"><?php echo $projectBlog["blog_text"]; ?></p><br></td>
      </tr>
      <tr>
        <td></td></tr>
    </table>

  </div>
</div>
</main>

<?php
  include "helper/footer.php";
?>
