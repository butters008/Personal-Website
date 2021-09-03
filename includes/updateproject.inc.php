<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // if(emptyInputSignup($name, $email, $pwd, $pwdRepeat) != false){
    //     header("location: ../signup.php?error=emptyInput");
    //     exit();        
    // }

    // if(invalidEmail($email) != false){
    //     header("location: ../signup.php?error=invalidEmail");
    //     exit();        
    // }

    // if(passwordMatch($pwd, $pwdRepeat) != false){
    //     header("location: ../signup.php?error=passwordDoesntMatch");
    //     exit();        
    // }

    // if(emailExist($conn, $email) != false){
    //     header("location: ../signup.php?error=emailExist");
    //     exit();        
    // }

    // createUser($conn, $name, $email, $pwd);
    updateProject();

}
else{
    //Will have to change this later
    header("location: ../signup.php");
    exit();
}