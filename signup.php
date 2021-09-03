<?php 
    include "helper/header.php";
?>


<main class="basic">
  <br>
    <h2 style="text-align: center;">Sign Up</h2>
    <div class="currentProjectOutline">
      <div class="signupSection">
        <form action="includes/signup.inc.php" method="post">
          <!-- <h3>Basic Information</h3> -->
          <label for="name" class="signupSection-only">Name</label>
          <input type="text" name="name" placeholder="Name" required><br><br>
          <label for="email" class="signupSection-only">Email</label>
          <input type="text" name="email" placeholder="Email" required><br><br>
          <label for="password" class="signupSection-only">Password</label>
          <input type="password" name="password" placeholder="Password" required><br><br>
          <label for="passwordRepeat" class="signupSection-only">Password Repeat</label>
          <input type="password" name="passwordRepeat" placeholder="Password" required><br><br>
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
    else if($_GET["error"] == "invalidEmail"){
      echo "<p>Invalid Email</p>";
    }
    else if($_GET["error"] == "passwordDoesntMatch"){
      echo "<p>Passwords do not matched</p>";
    }
    else if($_GET["error"] == "emailExist"){
      echo "<p>Email already taken</p>";
    }
    else if($_GET["error"] == "none"){
      echo "<p>You have signed up!</p>";
    }

  }
?>


<?php
  include "helper/footer.php";
?>
