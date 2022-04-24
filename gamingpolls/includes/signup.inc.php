<?php


if(isset($_POST["submit"]))
{

    //grabbing the data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatpassword = $_POST["repeatpassword"];


    // instantiate signupcontr class

    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($username, $email, $password, $repeatpassword);

    //running error handlers and user signup

    $signup->signupUser();

    //going back to front page
    header("location: ../register.php?error=none");
}