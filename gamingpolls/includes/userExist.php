<?php
session_start();
include "dbh.inc.php";

if(isset($_POST['username'])){
   $username = $_POST["username"];
   $stmt = $conn->prepare('SELECT count(*) as cntUser FROM users WHERE users_username = ?;') or die(mysqli_error());

   $stmt->bind_param('s', $username);
   $stmt->execute();

   $resultData = mysqli_stmt_get_result($stmt);

   $response = "<span style='color: green;'>Available (5 to 15 characters)</span>";
   if(mysqli_num_rows($resultData)){
      $row = mysqli_fetch_array($resultData);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Not Available.</span>";
      }
   
   }

   echo $response;
   $stmt->close();
}
  
if(isset($_POST['email'])){
   $email = $_POST["email"];
   $stmt = $conn->prepare('SELECT count(*) as cntUser FROM users WHERE users_email = ?;') or die(mysqli_error());

   $stmt->bind_param('s', $email);
   $stmt->execute();

   $resultData = mysqli_stmt_get_result($stmt);

   if(mysqli_num_rows($resultData)){
      while($row = mysqli_fetch_array($resultData)){
         $count = $row['cntUser'];
         if($count > 0){
            $response = "<span style='color: red;'>Not Available.</span>";
         } else {
            $response = "<span style='color: green;'>Available</span>";
         }

         echo $response;
      }

   }

   $stmt->close();
}

if(isset($_POST['logusername'])){
   $logusername = $_POST["logusername"];

   $stmt = $conn->prepare('SELECT * FROM users WHERE users_username = ?;') or die(mysqli_error());

   $stmt->bind_param('s', $logusername);
   $stmt->execute();

   echo $data = "<span style='color: red;'>User does not exist!</span>";
  
   $stmt->close();

}
