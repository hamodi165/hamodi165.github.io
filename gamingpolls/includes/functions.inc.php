
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
    if(gettype($title) === "string"){
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
    if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)){
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

function createUser($conn, $username, $email, $password, $bottest) {
    $sql = "INSERT INTO users (users_username, users_email, users_password, create_datetime, users_role, gender, status, bottest) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.php?error=sqlerror");
        exit();
    }
 
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $mysqltime = date ('Y-m-d H:i:s');
    $userRole = array("User", "Community Members", "Moderators", "Super Moderators", "Admin");
    $gender = array("Male", "Female", "Other", "Unknown");
    $status = 1;

    mysqli_stmt_bind_param($stmt, "ssssssss", $username, $email, $hashedPwd, $mysqltime, $userRole[0], $gender[3], $status, $bottest);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../home.php?error=none");
    echo "<h1> You have successfully been registered! </h1>";
     exit();
 }

 //hot
 function createPost($conn, $content, $title, $users_id, $date_created){
    $sql = "INSERT INTO post (title, users_id, content, date_created) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)){
     header("location: ../home.php?error=stmtfailed");
     exit();
    }

    $mysqltime = date ('Y-m-d H:i:s');

    mysqli_stmt_bind_param($stmt, "ssss", $title, $users_id, $content, $mysqltime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../home.php?error=noerroronpost");
     exit();
 }


 //polls
 function createPoll($conn, $content, $title, $users_id, $date_created){
    $sql = "INSERT INTO poll (title, users_id, content, date_created) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)){
     header("location: ../home.php?error=stmtfailed");
     exit();
    }

    $mysqltime = date ('Y-m-d H:i:s');

    mysqli_stmt_bind_param($stmt, "ssss", $title, $users_id, $content, $mysqltime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../home.php?error=noerroronpost");
     exit();
 }

 //reviews
 function createReview($conn, $content, $title, $users_id, $date_created){
    $sql = "INSERT INTO review (title, users_id, content, date_created) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)){
     header("location: ../home.php?error=stmtfailed");
     exit();
    }

    $mysqltime = date ('Y-m-d H:i:s');

    mysqli_stmt_bind_param($stmt, "ssss", $title, $users_id, $content, $mysqltime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../home.php?error=noerroronpost");
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

function emptyPost($content, $users_id, $date){
    $result;
    if(empty($content) || empty($users_id) || empty($date)){
        $result = true;
    } else {
        $return = false;
    }
    return $result;
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
        $_SESSION["username"] = $uidExists["users_username"];
        $_SESSION["role"] = $uidExists["users_role"];
        header("location: ../home.php");
        exit();
    }
}




