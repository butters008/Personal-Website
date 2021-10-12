<?php
require_once '../includes/dbh.inc.php';
include "../helper/admin-header.php";


if(isset($_POST["submit"])){
    $projectID = $_POST["projectID"];
    $date = $_POST["blogDate"];
    $blogText = $_POST["blogText"];
    $blogTitle = $_POST["blogTitle"];

    echo $projectID."<br>";
    echo $date."<br>";
    echo $blogText."<br>";
    echo $blogTitle."<br><br>";


    $sql = "INSERT INTO projects_blog (project_id, blog_title, blog_text) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=addBlog.inc.Failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $projectID, $title, $blogTitle);
    mysqli_stmt_execute($stmt);

    echo $stmt."<br>";
    mysqli_stmt_close($stmt);
    // header("location: projectList_admin.php?=success");

    // $sql = "INSERT INTO projects_blog (project_id, blog_title, blog_text, blog_date) VALUES (?, ?, ?, ?);";
    // $stmt = mysqli_stmt_init($conn);
    // mysqli_stmt_bind_param($stmt, "ssss", $projectID, $date, $blogTitle, $blogText);
    // mysqli_stmt_execute($stmt);
    // mysqli_stmt_close($stmt);
    // header("location: projectList_admin.php?=success");

    // if(!mysqli_stmt_prepare($stmt, $sql)){
    //     header("location: ../index.php?error=stmtFailed");
    //     exit();
    // }


    exit();



}
else{
    header("location: /projectList_admin.php?=failed");
    exit();
}





