<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Polls</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome-free-5.15.1/css/all.css">
    <title>Search</title>
  <script src="https://kit.fontawesome.com/afd6aa68df.js" crossorigin="anonymous"></script>
</head>

<header>

<div class="headLogo">
    <a href="home.php" id="elLogo" accesskey="1"><img src="testbild.png" alt="Votality"></a>
</div>
    

<!--Menu Section-->
<div class="navMenu">
    <a href="home.php">Home</a>
    <a href="comments.php">Weekly polls</a>
    <a href="detail.php">Companies</a>
    <a href="detail.php">History</a>     
    <?php
        if(isset ($_SESSION["usersuid"])){
            echo "<a href='includes/logout.inc.php' class='loginDetails'>Log out</a>";
            echo "<a href='profile.php' class='loginDetails'>Profile</a>";
            
        } else {
            echo "<a href='login.php' class='loginDetails'>Login</a>";
            echo "<a href='register.php' class='loginDetails'>Register</a>";
        }
    ?>
    <div class="search-container">
    <form action="/action_page.php">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    </div>
</div>


</header>