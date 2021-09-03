<?php 
    include "helper/header.php";
?>

<main class="basic">
  <br>
    <h2 style="text-align: center;">Login</h2>
    <div class="currentProjectOutline">
      <div class="loginSection">
        <form action="includes/login.inc.php" method="post">
              <label for="email" class="loginSection-only">Email</label>
              <input type="text" name="email" placeholder="Email" required><br><br>
              <label for="password" class="loginSection-only">Password</label>
              <input type="password" name="password" placeholder="Password" required><br><br><br>
              <button type="submit" name="submit">submit</button><br>
          </form>

      </div>
    </div>
</main>

<?php
  if(isset($_GET["error"])){
    if($_GET["error"] == "emptyInput"){
      echo "<p>Fill in all fields</p>";
    }
    else if($_GET["error"] == "wrongLogin"){
      echo "<p>Incorrect Login Information</p>";
    }
  }
?>

<?php
  include "helper/footer.php";
?>
