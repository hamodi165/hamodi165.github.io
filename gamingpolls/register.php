<?php
      include_once 'header.php';
      if(isset($_SESSION["username"])){header("location: home.php");}
    
     ?>

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
  <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
    <header>

    </header>

    <!--Login Section-->
    <form action="<?php echo htmlspecialchars("includes/signup.inc.php");?>" class="container-register-login" id="formm" method="post"> 
    * Name: <input type="text" placeholder="Enter Username" name="username" id="username" required>
    <br><br>
    * Email: <input type="text" placeholder="Enter Email" name="email" id="email" required>
    <br><br>
    * Password: <input type="password" placeholder="Enter Password" name="password" id="password" required>
    <br><br>
    * Repeat Password: <input type="password" placeholder="Repeat Password" name="repeatpassword" id="repeatpassword" required>
    <br><br>
    * What is 9+2? <input type="text" placeholder="Enter number" name="botquestion" required>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn" name="submit">Register</button>
    <div class="container-signin">
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
    <?php
    if(isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
        echo"<p>Fill in all fields!</p>";
      }
      if($_GET["error"] == "invalidusername"){
        echo"<p>Choose a valid username!</p>";
      }
      if($_GET["error"] == "invalidemail"){
        echo"<p>Choose a valid email!</p>";
      }
      if($_GET["error"] == "passwordsdontmatch"){
        echo"<p>Password does not match!</p>";
      }

      if($_GET["error"] == "usernameoremailtaken"){
        echo"<p>Email or username taken!</p>";
      }
      if($_GET["error"] == "none"){
        echo"<p>You have successfully been registered!</p>";
      }
    } 
    ?>
  </div>
  </form>
    
    <!-- Forum Info -->
    <footer>
        <span>&copy;  Gamingpolls | All Rights Reserved</span>
    </footer>
    <script src="main.js"></script>
</body>
</html>