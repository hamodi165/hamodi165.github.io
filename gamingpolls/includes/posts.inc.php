<?php

if (isset($_POST["submitPost"])){
    $title = $_POST["title"];
    $users_id = $_POST["users_id"];
    $content = $_POST["content"];
    $date_created = $_POST["date_created"];
    $mysqltime = date ('Y-m-d H:i:s');

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputTitle($title) !== false){
        header("location: ../makeapost.php?error=emptytitleinput");
        exit();
    }

    if(emptyInputContent($content) !== false){
        header("location: ../makeapost.php?error=emptycontentinput");
        exit();
    }


    createPost($conn, $content, $title, $users_id, $date_created);
}