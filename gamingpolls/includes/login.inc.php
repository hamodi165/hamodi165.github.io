<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';

if (isset($_POST ["submit"])){
    $username = $_POST["logusername"];
    $password = $_POST["logpassword"];

    loginUser($conn, $username, $password);
    

} else {
    header("location: ../home.php");
    exit();
}
