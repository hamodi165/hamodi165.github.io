
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

function emptyInputTitleOrContent($content, $title){
    $result;
    if(empty($content) || empty($title)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function botQuestion($botquestion){
    $result;
    if($botquestion === "voteem" || $botquestion === "Voteem") {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function getTitleType($title){
    $result;
    if(gettype($title) === "string" && !empty($title)){
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

function passwordCharacter($password) {
    $result;
    $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    if(!preg_match($pattern, $password)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
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

function emptyPost($content, $users_id, $date){
    $result;
    if(empty($content) || empty($users_id) || empty($date)){
        $result = true;
    } else {
        $return = false;
    }
    return $result;
}


function createUser($conn, $username, $email, $password, $bottest, $gender) {
    $sql = "INSERT INTO users (users_username, users_email, users_password, create_datetime, users_role, gender, status, bottest, users_country, users_about) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.php?error=sqlerror");
        exit();
    }
 
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $mysqltime = date ('Y-m-d H:i:s');
    $userRole = array("User", "Community Members", "Moderators", "Super Moderators", "Admin");
    $country = array("Unknown");
    $about = "Write a brief description of yourself!";
    $status = 1;

    mysqli_stmt_bind_param($stmt, "ssssssssss", $username, $email, $hashedPwd, $mysqltime, $userRole[0], $gender, $status, $bottest, $country[0], $about);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../home.php?error=none");
    echo "<h1> You have successfully been registered! </h1>";
     exit();
 }
 function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE users_username = ? OR users_email = ?;";
    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)){
     header("location: ../home.php?error=stmtfailed");
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

 function loginUser($conn, $username, $password){
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../home.php?error=wrongusername");
        exit();
        
    }

    $passwordHashed = $uidExists["users_password"];
    $checkPwd = password_verify($password, $passwordHashed);

    if($checkPwd === false){
        header("location: ../home.php?error=wrongpassword");
        
        exit();
    } else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["users_id"];
        $_SESSION["email"] = $uidExists["users_email"];
        $_SESSION["username"] = $uidExists["users_username"];
        $_SESSION["role"] = $uidExists["users_role"];
        $_SESSION["gender"] = $uidExists["users_gender"];
        header("location: ../home.php");
        exit();
    }
}

 //posts
 function createPost($conn, $content, $title, $users_id, $date_created, $type){
    $sql = "INSERT INTO post (title, users_id, content, date_created, type) VALUES (?,?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)){
     header("location: ../home.php?error=stmtfailed");
     exit();
    }

    $mysqltime = date ('Y-m-d H:i:s');
    $type;


    mysqli_stmt_bind_param($stmt, "sssss", $title, $users_id, $content, $mysqltime, $type);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../home.php?error=noerroronpost");
     exit();
 }



  function profileStatus($conn, $id){
    $sql = "UPDATE users SET status = ? WHERE users_id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../home.php?error=stmtfailed");
    exit();
    }   
    $status = 0;
    
    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
 }

