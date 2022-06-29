<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';

if (isset($_POST ["submit"])){
    $username = $_POST["logusername"];
    $password = $_POST["logpassword"];

    if(emptyInputLogin($username, $password) !== false){
        header("location: ../home.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
    

} else {
    header("location: ../home.php");
    exit();
}
