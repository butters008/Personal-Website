<?php
// All Required Files
require_once "helper/header.php";
require_once "includes/dbh.inc.php";
require_once "includes/functions.inc.php";
?>


<div id="companyLogo">
  <h2>The Butterfield LLC</h2>
</div>
<section id="aboutMECards">
  <h4 id="knowMoreMeTitleText">Click on the pictures to know more! </h4>
  <div class="aboutMeCardLayout">
    <div class="aboutMeFamily generalCardLayout">
      <h3>Family</h3>
    </div>
    <div class="aboutMeProgramming generalCardLayout">
      <h3>Programming</h3>
    </div>
    <div class="aboutMeYouTube generalCardLayout">
      <h3>YouTube</h3>
    </div>
    <div class="aboutMeWorking generalCardLayout">
      <h3>Working</h3>
    </div>
  </div>
    
</section>
<p id="demo"></p>
</main>

<?php
  include "helper/footer.php";
?>


<script>
var w = window.innerWidth;
var h = window.innerHeight;

var x = document.getElementById("demo");
x.innerHTML = "Browser width: " + w + ", height: " + h + ".";
</script>
