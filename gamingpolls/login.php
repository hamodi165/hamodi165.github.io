<?php
    include 'header.php';
    if(isset($_SESSION["username"])){header("location: home.php");}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Polls</title>
    <link rel="stylesheet" href="../htmlcssjs/style.css">
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
    <form action="<?php echo htmlspecialchars("includes/login.inc.php");?>" id="formm" method="post">
    <div class="container-register-login">

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" id="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <button type="submit" class="loginbtn" name="submit">Login</button>
    <div class="container-signin">
    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    <?php
    if(isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
        echo"<p>Fill in all fields!</p>";
      }
      if($_GET["error"] == "wrongusername"){
        echo"<p>Incorrect username!</p>";
      }

      if($_GET["error"] == "wrongpassword"){
        echo"<p>Incorrect password!</p>";
      }
    }
    ?>
  </div>
  </div>
  </form>

    <!-- Forum Info -->
    <footer>
        <span>&copy;  Gamingpolls | All Rights Reserved</span>
    </footer>
    <script src="main.js"></script>
</body>
</html>