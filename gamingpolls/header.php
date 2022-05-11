<?php
    session_start(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Polls</title>
    <link rel="stylesheet" href="htmlcssjs/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/afd6aa68df.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="htmlcssjs/main.js"></script>
</head>

<!--Menu Section-->

<header>
<div class="topnav" id="myTopnav">
<a href="home.php"> <img alt="Voteem" src="pictures/logo-transparent.png" width="150"></a>
  <div class="dropdown">
    <button class="dropbtn">Home <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
      <a href="home.php"> <i class="fa fa-home"></i> Home</a>
      <a href="#">Weekly</a>
      <a href="#">About</a>
    </div>
  </div> 
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" id="searchbutton"><i class="fa fa-search"></i></button>
    </form>
  </div>
  <?php
        if(isset ($_SESSION["username"])){
            echo "<a href='includes/logout.inc.php' class='logoutDetails'> <i class='fas fa-power-off'></i> Log out</a>";
            echo "<a href='profile.php' class='profileDetails'><i class='far fa-address-card'></i> Profile</a>";
            
        } else {
            echo "<a href='#' class='loginDetails' onclick='openFormLogin()'><i class='far fa-user-circle'></i> Login</a>";
            echo "<a href='#' class='registerDetails' onclick='openFormRegister()'><i class='far fa-smile'></i> Register</a>";
            
        }

        ?>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<!--LOGIN BUTTON-->

<div class="form-popup" id="myForm">
<form action="<?php echo htmlspecialchars("includes/login.inc.php");?>" id="formm" class="form-container" method="post">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" id="username" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>
    <button type="submit" class="loginbtn" name="submit">Login</button>
    <br></br>
    <button type="button" class="btn cancel" onclick="closeFormLogin()">Close</button>
    <div class="container-signin">
    <p>Don't have an account? <a href="#" onclick="openFormRegister()">Register here</a>.</p>
    </div>
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
  </form>
</div>

<!--REGISTER BUTTON-->


<div class="form-popup-2" id="myForm-2">
<form action="<?php echo htmlspecialchars("includes/signup.inc.php");?>" class="form-container-2" id="formm" method="post"> 
    * Name: <input type="text" placeholder="Enter Username" name="username" id="username" required>
    <br><br>
    * Email: <input type="text" placeholder="Enter Email" name="email" id="email" required>
    <br><br>
    * Password: <input type="password" placeholder="Enter Password" name="password" id="password" required>
    <br><br>
    * Repeat Password: <input type="password" placeholder="Repeat Password" name="repeatpassword" id="repeatpassword" required>
    <br><br>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn" name="submit">Register</button>
    <br></br>
    <button type="button" class="btn cancel" onclick="closeFormRegister()">Close</button>
    <div class="container-signin">
    <p>Already have an account? <a href="#" onclick="openFormLogin()">Login here</a>.</p>
    </div>
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
  </form>
</div>
</header>