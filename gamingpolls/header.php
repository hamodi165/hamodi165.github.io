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
            echo "<a href='#' class='loginDetails' onclick='loginBox()'><i class='far fa-smile'></i> Login</a>";
            echo "<a href='#' class='registerDetails' onclick='registerBox()'><i class='far fa-smile'></i> Register</a>";
            
        }

        ?>
    <a href="javascript:void(0);" class="icon" onclick="mobileFunction()"><i class="fa fa-bars"></i>
  </a>
</div>

</header>

<div id="registerForm" class="modal">
<form action="<?php echo htmlspecialchars("includes/signup.inc.php");?>" class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('registerForm').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img alt="Voteem" src="pictures/logo-transparent.png">
    </div>
    <p id="termsofservice">By creating a Voteem account you agree to our <a href="#">Terms & Privacy</a>.</p> 

    <div class="container">

    <div class="input-container">
		<input type="text"  name="username" id="regusername" onKeyUp="function(character);" required>
    <p>Username</p>	
    <div id="character-strength-status"></div>		
	</div>  

  <div class="input-container">
    <input type="text"  name="email" id="regemail" onKeyUp="checkCharacterStrength();" required>
    <p>Email</p>	
    <div id="character-strength-status"></div>	
    </div>

    <div class="input-container">
    <input type="password"  name="password" id="regpassword" class="passwordclass" onKeyUp="checkCharacterStrength();" required>
    <p>Password</p>
    <div id="character-strength-status"></div>	
    </div>
     
    <div class="input-container">
    <input type="password" name="repeatpassword" id="regrepeatpassword" onKeyUp="checkCharacterStrength();" required>
    <p>Repeat password</p>
    <div id="character-strength-status"></div>	
    </div>

    <div class="input-container"> 
    <input type="text"  name="botquestion" id="regbotquestion" onKeyUp="checkCharacterStrength();" required>
    <p>The name of this platform?</p>
    <div id="character-strength-status"></div>	
    </div>

    <input type="text"  name="bottest" id="bottest" style="display:none">
    <button type="submit" name="submit" id="submitreg">Register</button>
    <br></br>

    <p id="alreadyaccount">Already have an account? <a href="#" onclick="loginBox()">Login here</a>.</p>
    </div>
  </form>
</div>


<!--LOGIN BUTTON-->

<div id="loginForm" class="modal">
<form action="<?php echo htmlspecialchars("includes/login.inc.php");?>" class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('loginForm').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img alt="Voteem" src="pictures/logo-transparent.png">
    </div>
    <p id="termsofservice">By continuing to Voteem, you agree to our <a href="#">Terms & Privacy</a>.</p> 

    <div class="container">

    <div class="input-container">
		<input type="text"  name="username" id="regusername" onKeyUp="function(character);" required>
    <p>Username</p>	
    <div id="character-strength-status"></div>		
	</div>  

    <div class="input-container">
    <input type="password"  name="password" id="regpassword" class="passwordclass" onKeyUp="checkCharacterStrength();" required>
    <p>Password</p>
    <div id="character-strength-status"></div>	
    </div>
 
    <button type="submit" name="submit" id="submitreg">Login</button>
    <br></br>

    <p id="alreadyaccount">Are you new to Voteem? <a href="#" onclick="registerBox()">Signup here!</a></p>
    </div>
  </form>
</div>


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




	
