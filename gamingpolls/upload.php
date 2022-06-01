<?php
session_start();
include_once 'includes/dbh.inc.php';
$id = $_SESSION["userid"];
if(isset($_POST["submit"])){
  $file = $_FILES['file'];
  $fileName = $_FILES['file'] ['name'];
  $fileTmpName = $_FILES['file'] ['tmp_name'];
  $fileSize = $_FILES['file'] ['size'];
  $fileError = $_FILES['file'] ['error'];
  $fileType = $_FILES['file'] ['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
      if($fileSize < 500000){
        $fileNameNew = "profile".$id.".".$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;
        foreach(glob("uploads/profile{$id}.*") as $match){
          unlink($match);
        }
        move_uploaded_file($fileTmpName, $fileDestination);
        $sql = "UPDATE users SET status=0 WHERE users_id = '$id';";
        $result = mysqli_query($conn, $sql);
        header("Location: profile.php?uploadsuccess");
      } else {
        echo "Your file is too big!";
      }
    } else {
      echo "There was an error uploading your file!";
    }
  } else {
    echo "You cannot upload files of this type!";
  }
}
