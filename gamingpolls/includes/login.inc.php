<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';

if (isset($_POST ["submit"])){
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);

   

    if(emptyInputLogin($username, $password) !== false){
        header("location: ../home.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
} else {
    header("location: ../home.php");
    exit();
}
