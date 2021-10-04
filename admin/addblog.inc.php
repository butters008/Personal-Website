<?php
require_once 'dbh.inc.php';

echo "Hello";

// if(isset($_POST["submit"])){
    // $projectID = $_POST["projectID"];
    // $date = $_POST["blogDate"];
    // $blogText = $_POST["blogText"];
    // $blogTitle = $_POST["blogTitle"];
    
    // createBlog($projectID, $date, $blogTitle, $blogText);

    // echo"Hello";

// }
// else{
//     header("location: /projectList_admin.php?=failed");
//     exit();
// }


function createBlog($projectID, $date, $blogTitle, $blogText){
    $sql = "INSERT INTO projects_blog (project_id, blog_title, blog_text, blog_date) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $projectID, $date, $blogTitle, $blogText);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: projectList_admin.php?=success");
    exit();
}


