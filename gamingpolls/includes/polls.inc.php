<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';
if (isset($_POST["submitPoll"])){
    $title = $conn->real_escape_string($_POST["title"]);
    $users_id = $conn->real_escape_string($_POST["users_id"]);
    $content = $conn->real_escape_string($_POST["content"]);
    $date_created = $conn->real_escape_string($_POST["date_created"]);

    if(emptyInputTitleOrContent($content, $title) !== false){
        header("location: ../makeapost.php?error=emptycontentortitle");
        exit();
    }

    if(getTitleType($title) === false){
        header("location: ../makeapost.php?error=nostringontitle");
        exit();
    }


    createPoll($conn, $content, $title, $users_id, $date_created);
}