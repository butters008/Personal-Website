<?php

function emptyInputSignup($name, $email, $pwd, $pwdRepeat){
    $result = false;
    if(empty($name || $email || $pwd || $pwdRepeat)){
        $result == true;
    }
    else{
        $result == false;
    }
    return $result;
}

function invalidEmail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        // $result = true;
        $result = false;
    }
    else{
        $result = true;
        // $result = false;
    }

    return $result;
}

function passwordMatch($pwd, $pwdRepeat){
    if($pwd !== $pwdRepeat){
        $resultPassword = true;
    }
    else{
        $resultPassword = false;
    }
    return $resultPassword;
}

function emailExist($conn, $email){
    $sql = "SELECT * FROM user WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
        mysqli_stmt_close($stmt);
    }
    else{
        $result = false;
        return $result;
    }
}


function createUser($conn, $name, $email, $pwd){
    $sql = "INSERT INTO user (username, email, pwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    //Hashing the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();

}

function emptyInputLogin($email, $pwd){
    $resultInput = false;
    if(empty($email || $pwd)){
        $resultInput == true;
    }
    else{
        $resultInput == false;
    }
    return $resultInput;
}

function loginUser($conn, $email, $pwd){
    $emailExist = emailExist($conn, $email);

    if($emailExist == false){
        header("location: ../login.php?error=wrongEmail");
        exit();
    }

    $hashedPwd = $emailExist["pwd"];
    $checkPwd = password_verify($pwd, $hashedPwd);

    if($checkPwd === false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userID"] = $emailExist["user_id"];
        // $_SESSION["username"] = $emailExist["username"];
        header("location: ../index.php?info=successful-login");
    }

}
