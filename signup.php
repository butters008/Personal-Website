<?php 
    include "helper/header.php";
?>


<main class="basic">
  <br>
    <h2 style="text-align: center;">Sign Up</h2>
    <div class="currentProjectOutline">
        <form action="includes/signup.inc.php" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" required><br>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email" required><br>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required><br>
            <label for="passwordRepeat">Password Repeat</label>
            <input type="password" name="passwordRepeat" placeholder="Password" required><br>
            <button type="submit" name="submit">submit</button><br>
        </form>
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
