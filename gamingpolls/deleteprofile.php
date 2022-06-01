<?php
session_start();
include_once 'includes/dbh.inc.php';
$id = $_SESSION["userid"];
if(isset($_POST["delete"])){

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

$sql = "UPDATE users SET status=1 WHERE users_id='$id';";
mysqli_query($conn, $sql);
header("location: profile.php?deletesuccess");
}