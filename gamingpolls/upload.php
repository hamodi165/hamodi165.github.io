<?php
session_start();
include_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
$id = $_SESSION["userid"];

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
        profileStatus($conn, $id);
        echo "<script>window.location.href='profile.php';</script>";
      } else {
        echo '<script>alert("File is too big!")</script>';
        echo "<script>window.location.href='profile.php';</script>";
        exit;
      }
    } else {
      echo '<script>alert("There was an error uploading your file!")</script>';
      echo "<script>window.location.href='profile.php';</script>";
      exit;
    }
  } else { 
    echo '<script>alert("Wrong type of file!")</script>';
    echo "<script>window.location.href='profile.php';</script>";
    exit;
  }

