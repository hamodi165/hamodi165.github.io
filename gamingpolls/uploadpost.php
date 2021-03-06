<?php
session_start();
include_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
$id = $_SESSION["userid"];

if(isset($_POST["submitimgvid"])){
  $title = $_POST["title"];
  $users_id = $_POST["users_id"];
  $content = $_POST["content"];
  $date_created = $_POST["date_created"];
  $type = $_POST["type"];
  $imagepath = $_POST["imagepath"];

  $file = $_FILES['file'];
  $fileName = $_FILES['file'] ['name'];
  $fileTmpName = $_FILES['file'] ['tmp_name'];
  $fileSize = $_FILES['file'] ['size'];
  $fileError = $_FILES['file'] ['error'];
  $fileType = $_FILES['file'] ['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png', 'mp4');
  $fileNameNew = uniqid('', true).".".$fileActualExt;
  $fileDestination = 'pictures/'.$fileNameNew;

  if(getTitleType($title) !== true){
    header("location: makeapost.php?error=nostringontitle");
    exit();
}


  if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
      if($fileSize < 50000000){
        move_uploaded_file($fileTmpName, $fileDestination);
        $sql = "INSERT INTO post (title, users_id, content, date_created, type, imagepath) VALUES (?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
         header("location: ../home.php?error=stmtfailed");
         exit();
        }
        
        $type = 3;
        $mysqltime = date ('Y-m-d H:i:s');
    
        mysqli_stmt_bind_param($stmt, "ssssss", $title, $id, $content, $mysqltime, $type, $fileDestination);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: home.php?error=noerroronpost");
         exit();
      } else {
        echo '<script>alert("File is too big!")</script>';
        echo "<script>window.location.href='makeapost.php';</script>";
      }
    } else {
      echo '<script>alert("There was an error uploading your file!")</script>';
      echo "<script>window.location.href='makeapost.php';</script>";
    }
  } else {
    echo '<script>alert("Wrong type of file!")</script>';
    echo "<script>window.location.href='makeapost.php';</script>";
  }
}