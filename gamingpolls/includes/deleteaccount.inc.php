<?php
	require_once 'dbh.inc.php';
if(isset($_POST["submitdelete"])){
    $users_id = $_POST["users_id"];
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $sql = "DELETE FROM users WHERE users_id=?;";

    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)){
     header("location: ../home.php?error=stmtfailed");
     exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $users_id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

session_start();
session_unset();
session_destroy();
header("location: ../home.php?error=accountdeleted");
 exit();

}

