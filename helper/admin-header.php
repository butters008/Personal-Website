<?php 
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Butterfield (admin)</title>
    <link rel="stylesheet" href="../style/admin.css">
</head>
<body>
    <header class="basicLayout">
        <h1>The Butterfield</h1>
    </header>
    <nav>
        <ul class="navbar basic">
            <?php 
                if (isset($_SESSION["admin"])){
                    echo '
                    <li class="navItem account" style="float: left;"><a href="projectList_admin.php">Projects</a></li>
                    <li class="navItem account"><a href="../includes/logout.inc.php">Logout</a></li>
                    <li class="navItem account"><a href="includes/logout.inc.php">ADMIN</a></li>                                        
                    ';
                }
            ?>

        </ul>
    </nav>