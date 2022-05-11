<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatpassword = $_POST["repeatpassword"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($username, $email, $password, $repeatpassword) !== false){
        header("location: ../register.php?error=emptyinput");
        exit();
    }

    if(invalidUid($username) !== false){
        header("location: ../register.php?error=invalidusername");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../register.php?error=invalidemail");
        exit();
    }

    if(pwdMatch($password, $repeatpassword) !== false){
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }

    if(uidExists($conn, $username, $email) !== false){
        header("location: ../register.php?error=usernameoremailtaken");
        exit();
    }

    createUser($conn, $username, $email, $password);
    

} else {
    header("location: ../home.php");
}
