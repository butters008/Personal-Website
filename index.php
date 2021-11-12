<?php
// All Required Files
require_once "helper/header.php";
require_once "includes/dbh.inc.php";
require_once "includes/functions.inc.php";
?>


<section>
  <div id="companyLogo">
    <h2>The Butterfield LLC</h2>
  </div>
  <section class="timeTracker">
    <!-- Taking out div container -->
    <!-- I want to load this in two ways -->
    <!-- 1 - load the exact amount of bars needed for projects, ie Project 1 needs 3, project 2 needs 4 and ect -->
    <!-- 2 - Load values in from DB -->

    <h2>Languages used in Projects</h2>
    <div class="pieRow">
      <div class="col-md-3">
        <div class="skill-name center-block">
          <div class="chart-container">
            <div class="chart" data-percent="92" data-bar-color="#23afe3">
              <span class="percent" data-after="%">92</span>
            </div>
          </div>
          <p>HTML</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="skill-name center-block">
          <div class="chart-container">
            <div class="chart" data-percent="92" data-bar-color="#23afe3">
              <span class="percent" data-after="%">92</span>
            </div>
          </div>
          <p>CSS</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="skill-name center-block">
          <div class="chart-container">
            <div class="chart" data-percent="92" data-bar-color="#23afe3">
              <span class="percent" data-after="%">92</span>
            </div>
          </div>
          <p>JavaScript</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="skill-name center-block">
          <div class="chart-container">
            <div class="chart" data-percent="92" data-bar-color="#23afe3">
              <span class="percent" data-after="%">92</span>
            </div>
          </div>
          <p>PHP</p>
        </div>
      </div>


    </div>    
  </sectrion>
  <div class="project">

  </div>

  <div class="blog">

  </div>
</section>
</main>

<?php
  include "helper/footer.php";
?>
