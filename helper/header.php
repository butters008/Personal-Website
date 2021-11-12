<?php 
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Butterfield</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/loginSection.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main>
  <input type="checkbox" id="check">
  <label for="check">
    <i class="fas fa-bars" id="menuBtn"></i>
    <i class="fas fa-times" id="menuCancel"></i>
  </label>
  <nav>
    <header>The Butterfield</header>
    <ul>
      <li><a href="index.php"><i class="fas fa-qrcode"></i>Dashboard</a></li>
      <li><a href="projectsList.php"><i class="fas fa-code"></i>Projects</a></li>
      <li><a href="gameDev.php"><i class="fas fa-gamepad"></i>Game Dev</a></li>
      <li><a href="aboutMe.php"><i class="fas fas fa-grin-beam"></i>About Me</a></li>
      <li><a href="login.php"><i class="fas fa-id-badge"></i>Login</a></li>
    </ul>
  </nav>

