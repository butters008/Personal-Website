<?php 
    include "helper/header.php";
?>

<main class="basic">
  <br>
    <!-- Seeding the data for right now, work on connecting to DB later -->
    <!-- This will be moved to the about me page -->
    <h2 style="text-align: center;"><?php echo "Personal Website"; //project name?></h2>
    <h3><?php echo "Front-end and Back-end (Isn't this Full-Stack?) Development"; //project type ?></h3>
    <p><?php echo "This is where text for the current project will go"; //project descrption ?></p>      

    <div class="currentProjectOutline">
      <!-- Hard coded test values, will be loading this in dynamically -->
      <h3>Project Money Timeline</h3>
      <p>This is going to contain a small description of the project</p>
    </div>
    <br><br>
    <div class="currentProjectBlog">
      <h3>Blog title</h3>
      <h5>date of blog</h5>
      <p>This will have the entire blog text, not matter how much text there is</p>
    </div>

</main>


<!-- 
    This spot is for potential ideas for website
    - https://www.w3schools.com/howto/howto_css_modals.asp - this is for a button for quick summany of projects
    - Adding a graph line or bar as progress tracker
    - Adding a timeline/roadmap for website
        - https://www.w3schools.com/howto/howto_css_timeline.asp
        - https://www.w3schools.com/howto/howto_js_progressbar.asp 

 -->

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


