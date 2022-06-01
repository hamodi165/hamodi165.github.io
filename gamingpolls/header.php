<?php
    session_start();
    include 'tags.php';
?>
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
    <a href="javascript:void(0);" class="icon" onclick="mobileFunction()"><i class="fa fa-bars"></i>
  </a>
</div>

</header>

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
        echo '<script>alert("Fill in all the fields!")</script>';
      }
      if($_GET["error"] == "wrongusername"){
        echo"<p>Incorrect username!</p>";
        echo '<script>alert("Incorrect username!")</script>';
      }

      if($_GET["error"] == "wrongpassword"){
        echo"<p>Incorrect password!</p>";
        echo '<script>alert("Incorrect password!")</script>';
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
    * What is 9+2? <input type="text" placeholder="Enter number" name="botquestion" required>
    <br><br>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn" name="submit">Register</button>
    <br></br>
    <button type="button" class="btn cancel" onclick="closeFormRegister()">Close</button>
    <div class="container-signin">
    <p>Already have an account? <a href="#" onclick="openFormLogin()">Login here</a>.</p>
    <?php
    if(isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
        echo"<p>Fill in all fields!</p>";
        echo '<script>alert("Fill in all the fields!")</script>';
      }
      if($_GET["error"] == "invalidusername"){
        echo"<p>Choose a valid username!</p>";
        echo '<script>alert("Choose a valid username!")</script>';
      }
      if($_GET["error"] == "invalidemail"){
        echo"<p>Choose a valid email!</p>";
        echo '<script>alert("Choose a valid email!")</script>';
      }
      if($_GET["error"] == "passwordsdontmatch"){
        echo"<p>Password does not match!</p>";
        echo '<script>alert("Password does not match!")</script>';
      }

      if($_GET["error"] == "usernameoremailtaken"){
        echo"<p>Email or username taken!</p>";
        echo '<script>alert("Email or username taken!")</script>';
      }
      if($_GET["error"] == "wrongnumber"){
        echo"<p>Wrong answer on bot question!</p>";
        echo '<script>alert("Wrong answer on bot question!")</script>';
      }
      if($_GET["error"] == "none"){
        echo"<p>You have successfully been registered!</p>";
        echo '<script>alert("You have successfully been registered!")</script>';
      }

      if($_GET["error"] == "noerroronpost"){
        echo '<script>alert("Congratulations, you just created a post!")</script>';
      }

    } 
    ?>
    </div>
  </form>
</div>
