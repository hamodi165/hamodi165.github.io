<?php


if(isset($_POST["submit"])){

    // Grabbing the data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatpassword = $_POST["repeatpassword"];

    //Instantiate SignupContr class

    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    $signup = new SignupContr($username, $email, $password, $repeatpassword);


    //Running error handlers and user signup
    $signup->signupUser();


    // Going to back to front page
    header("location: ../gamingpolls/home.php?error=none");

}
?>