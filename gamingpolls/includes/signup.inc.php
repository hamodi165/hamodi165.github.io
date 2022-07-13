<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatpassword = $_POST["repeatpassword"];
    $bottest = $_POST["bottest"];
    $botquestion = $_POST["botquestion"];
    $gender = $_POST["gender"];

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

    if(botQuestion($botquestion) === false){
        header("location: ../home.php?error=botquestion");
        exit();
    }

    if(uidExists($conn, $username, $email) !== false){
        header("location: ../home.php?error=usernameoremailtaken");
        exit();
    }

    createUser($conn, $username, $email, $password, $bottest, $gender);

} else {
    header("location: ../home.php");
}
?>



