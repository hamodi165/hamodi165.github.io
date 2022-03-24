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
            <a href="home.html" class="links">Home</a>
            <a href="comments.html" class="links">Weekly polls</a>
            <a href="detail.html" class="links">Companies</a>
            <a href="detail.html" class="links">History</a>
            <div class="search-container">
            <form action="/action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            </div>
            <div class="loginDetails">
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>
        </div>  


    </header>
    
    <!--Login Section-->
    <form action="/action_page.php" id="formm">
    <div class="container-register-login">

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" id="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <button type="submit" class="registerbtn">Login</button>
  </div>
    </form>

    <div class="container signin">
    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
  </div>


    <!-- Forum Info -->
    <div class="forum-info">
        <div class="chart">
            MyForum - Stats &nbsp;<i class="fa fa-bar-chart"></i>
        </div>
        <span><u>5,369</u> Posts in <u>48</u> Topics by <u>8,124</u> Members.</span><br>
        <span>Latest post: <b><a href="">Random post</a></b> on Dec 15 2021 By <a href="">RandomUser</a></span>.<br>
        <span>Check <a href="">the latest posts</a> .</span><br>
    </div>

    <footer>
        <span>&copy;  Gamingpolls | All Rights Reserved</span>
    </footer>
    <script src="main.js"></script>
</body>
</html>