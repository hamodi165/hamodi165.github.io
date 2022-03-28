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

<body>
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
            <a href="login.php" class="loginDetails">Login</a>
            <a href="register.php" class="loginDetails">Register</a>
            <div class="search-container">
            <form action="/action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            </div>
    </div>
    


    </header>

    <!--Login Section-->
    <form action="#" id="formm">
    <div class="container-register-login">

        Welcome <?php echo $_POST["username"]; ?><br>
        We have sent you an verification to your emailadress: <?php echo $_POST["email"]; ?>
        <p>Please make sure that you verify in order to access the forums</p>
  </div>
  </form>
    
    <!-- Forum Info -->
    <footer>
        <span>&copy;  Gamingpolls | All Rights Reserved</span>
    </footer>
    <script src="main.js"></script>
</body>
</html>