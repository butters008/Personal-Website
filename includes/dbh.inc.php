<?php
//database handler = dbh

//localhost connection
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "butterfield";



$conn = mysqli_connect($servername, $username, $password, $databasename);

if(!$conn){
    die("Connection Failed".mysqli_connect_error());
}

