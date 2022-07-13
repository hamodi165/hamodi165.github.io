<?php
session_start();
include_once 'includes/dbh.inc.php';
$id = $_SESSION["userid"];
if(isset($_POST["deleteprof"])){

$filename = "uploads/profile".$id."*";
$fileinfo = glob($filename);
$fileext = explode(".", $fileinfo[0]);
$fileactualext = $fileext[1];

$file = "uploads/profile".$id.".".$fileactualext;

if(!unlink($file)){
    echo"file was not deleted";
} else {
    echo"file was deleted";
}

$sql = "UPDATE users SET status=? WHERE users_id=?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)){
 header("location: ../home.php?error=stmtfailed");
 exit();
}   
$status = 1;

mysqli_stmt_bind_param($stmt, "ss", $status, $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location: profile.php?=deletesuccess");
exit();
}