<?php


<<<<<<< HEAD
<<<<<<< HEAD
if(isset($_POST["submit"]))
{

    //grabbing the data
=======
if(isset($_POST["submit"])){

    // Grabbing the data
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
if(isset($_POST["submit"])){

    // Grabbing the data
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatpassword = $_POST["repeatpassword"];

<<<<<<< HEAD
<<<<<<< HEAD

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
=======
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
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
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
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
