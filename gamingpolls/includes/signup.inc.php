<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';
if(isset($_POST["submit"])){
    $username = $conn->real_escape_string($_POST["username"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $repeatpassword = $conn->real_escape_string($_POST["repeatpassword"]);
    $bottest = $conn->real_escape_string($_POST["bottest"]);

    if(emptyInputSignup($username, $email, $password, $repeatpassword) !== false){
        header("location: ../home.php?error=emptyinput");
        exit();
    }

    if(invalidUid($username) !== false){
        header("location: ../home.php?error=invalidusername");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../home.php?error=invalidemail");
        exit();
    }

    if(pwdMatch($password, $repeatpassword) !== false){
        header("location: ../home.php?error=passwordsdontmatch");
        exit();
    }

    if(passwordCharacter($password) !== false){
        header("location: ../home.php?error=passwordnotstrong");
        exit();
    }

    if(uidExists($conn, $username, $email) !== false){
        header("location: ../home.php?error=usernameoremailtaken");
        exit();
    }

    createUser($conn, $username, $email, $password, $bottest);

} else {
    header("location: ../home.php");
}
