<?php

session_start();
session_unset();
session_destroy();
header("location: ../index.php?info=logged-out");
exit();