<?php
// define variables and set to empty values
$usernameErr = $emailErr = $passwordErr = $repeatpasswordErr = "";
$username = $email = $password = $repeatpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        $usernameErr = "Only letters and numbers are allowed";
        }
    }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
        }
    }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["repeatpassword"])) {
    $repeatpasswordErr = "Password is not the same!";
  } else {
    $repeatpassword = test_input($_POST["repeatpassword"]);
  }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
