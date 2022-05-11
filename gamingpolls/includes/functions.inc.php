<?php

function emptyInputSignup($username, $email, $password, $repeatpassword) {
    $result;
    if(empty($username) || empty($email) || empty($password) || empty($repeatpassword)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
    

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function pwdMatch($password, $repeatpassword) {
    $result;
    if($password !== $repeatpassword){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
   $sql = "SELECT * FROM users WHERE users_username = ? OR users_email = ?;";

   $stmt = mysqli_stmt_init($conn);

   if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../register.php?error=stmtfailed");
    exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $username, $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if($row = mysqli_fetch_assoc($resultData)){
       return $row;
        // for login
   } else {
       $result = false;
       return $result;
   }

   mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $email, $password) {
    $sql = "INSERT INTO users (users_username, users_email, users_password, create_datetime, users_role, gender) VALUES (?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)){
     header("location: ../register.php?error=stmtfailed");
     exit();
    }
 
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $mysqltime = date ('Y-m-d H:i:s', $phptime);
    $userRole = array("User", "Community Members", "Moderators", "Super Moderators", "Admin");
    $gender = array("Male", "Female", "Other", "Unknown");
    
    

    mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $hashedPwd, $mysqltime, $userRole[0], $gender[3]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    echo "You have successfully been registered!";
     exit();
 }

 function emptyInputLogin($username, $password) {
    $result;
    if(empty($username) || empty($password)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password){
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../login.php?error=wrongusername");
        exit();
    }

    $passwordHashed = $uidExists["users_password"];
    $checkPwd = password_verify($password, $passwordHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wrongpassword");
        exit();
    } else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["users_id"];
        $_SESSION["username"] = $uidExists["users_username"];
        $_SESSION["role"] = $uidExists["users_role"];
        header("location: ../home.php");
        exit();
    }
}


