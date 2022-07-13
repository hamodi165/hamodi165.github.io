<?php
   require_once 'dbh.inc.php';
   if(isset($_POST["gender"]) && isset($_POST["country"])){ 
   $gender = $_POST["gender"];
   $country = $_POST["country"];
   $users_id = $_POST["users_id"];

   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   $sql = "UPDATE users SET gender = ?, users_country = ? WHERE users_id = ?";

   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
       header("location: ../home.php?error=sqlerror");
       exit();
   }


    mysqli_stmt_bind_param($stmt, "ssi", $gender, $country, $users_id);
    mysqli_stmt_execute($stmt);

    echo $data = "<span id='genderMessage'>Changes saved!</span>";

    mysqli_stmt_close($stmt);
   
    
   }

   if(isset($_POST["users_about"])){ 
    $about = $_POST["users_about"];
    $users_id = $_POST["users_id"];
 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $sql = "UPDATE users SET users_about = ? WHERE users_id = ?";
 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.php?error=sqlerror");
        exit();
    }
 
 
     mysqli_stmt_bind_param($stmt, "si", $about, $users_id);
     mysqli_stmt_execute($stmt);
 
     echo $data = "<span id='aboutMessage'>Changes saved!</span>";
 
     mysqli_stmt_close($stmt);
    
     
    }

    

  
    
   
