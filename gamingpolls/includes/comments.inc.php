<?php
include 'dbh.inc.php';
include 'functions.inc.php';

if (isset($_POST["submit"])){
    $post_id = $_POST["post_id"];
    $users_id = $_POST["users_id"];
    $content = $_POST["content"];
    $date_posted = $_POST["date_posted"];
    $mysqltime = date ('Y-m-d H:i:s');

    
    $sql = "INSERT INTO comment (post_id, users_id, content, date_posted) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)){
     header("location: ../home.php?error=stmtfailed");
     exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $post_id, $users_id, $content, $mysqltime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../home.php?error=none");
     exit();
    
}