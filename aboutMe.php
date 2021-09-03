<?php

include "helper/header.php";
include_once "includes/dbh.inc.php";

?>

<main class="basic">
  <br>
    <h2 style="text-align: center;">About Me</h2>
    <div class="currentProjectOutline">
      <h3><strong>Project Name:</strong></h3>
      <br>
      <label>Percentage of Completion: </label> 
      <br>
      
    </div>
    <br><br>

    <h2 style="text-align: center; margin-bottom: none;">Recent Project Update</h2>
    <div class="currentProjectBlog">
      <h3 id="blogTitle"><?php echo $project_blog["blog_title"]; ?></h3>
      <h5>Pitter</h5>
      <p>Patter</p>
    </div>
    <br>
</main>




<?php
  include "helper/footer.php";
?>