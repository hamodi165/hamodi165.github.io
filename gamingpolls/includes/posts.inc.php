<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["submit"])){
    $title = $_POST["title"];
    $users_id = $_POST["users_id"];
    $content = $_POST["content"];
    $date_created = $_POST["date_created"];
    $type = $_POST["type"];

    if(emptyInputTitleOrContent($content, $title) !== false){
        header("location: ../makeapost.php?error=emptycontentortitle");
        exit();
    }

    if(getTitleType($title) === false){
        header("location: ../makeapost.php?error=nostringontitle");
        exit();
    }


    createPost($conn, $content, $title, $users_id, $date_created, $type);
}

