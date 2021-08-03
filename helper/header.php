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
    <!-- This is for debug, will make this appear and disappear later -->
    <link rel="stylesheet" href="style/debug.css">
</head>
<body>
    <header class="basic">
        <h1 style="text-align: center; padding-top: 50px;">The Butterfield</h1>
    </header>
    <nav>
        <ul class="navbar basic">
            <li class="navItem"><a href="index.php">Home</a></li>
            <li class="navItem"><a href="projectsList.php">Projects</a></li>
            <li class="navItem"><a href="#aboutMe">About Me</a></li>
            <?php 
                if (isset($_SESSION["userID"])){
                    echo '
                    <li class="navItem account"><a href="includes/logout.inc.php">Logout</a></li>                    
                    ';
                }
                else {
                    echo '
                    <li class="navItem account"><a href="login.php">Log In</a></li>
                    <li class="navItem account"><a href="#contact">Contact Me</a></li>
                    ';
                }
                // <li class="navItem account"><a href="#login/sign up">Sign Up</a></li>
            ?>

        </ul>
    </nav>