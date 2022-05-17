<?php
session_start();
if (!isset($_SESSION['id'])){
header('location:index.php');
}

$users_id=$_SESSION['id'];
$member_query = mysqli_query($conn,"select * from users where users_id = '$users_id'")or die(mysqli_error());
$member_row = mysqli_fetch_array($member_query);

$fullname = $member_row['id']." ";