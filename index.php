<?php 
    include "helper/header.php";
?>

<main class="basic">
  <br>
    <!-- Seeding the data for right now, work on connecting to DB later -->
    <h2 style="text-align: center;"><?php echo "Personal Website"; //project name?></h2>
    <h3><?php echo "Front-end and Back-end (Isn't this Full-Stack?) Development"; //project type ?></h3>
    <p><?php echo "This is where text for the current project will go"; //project descrption ?></p>      

    <!-- We are going to try something here - iterative so this might go -->
    <!-- Left would be project info -->
    <div id="leftBlock"></div>
    <!-- Right would be project graphs -->
    <div id="rightBlock"></div>
    <!-- Below would be recent updates -->
    <div id="bottomBlock"></div>
        <!-- This is where my current project will be, and give a road map (or slice of road map) of said project -->
        
        <!-- <div id="myProgress">
            <div id="myBar">10%</div>
        </div> -->
        
        <!-- Might have a bar graph in here as well -->
        
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


