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

    <div class="input-container">
    <div id="uname_response" ></div>
		<input type="text"  name="username" id="regusername" required>
    <p class="regtext">Username</p>
    <span class="errorMsg" id="errorusername">Username has to be between 5 and 15 characters!</span>
    </div>

    <div class="input-container">  
    <div id="uname_responsed" ></div>  
    <input type="text"  name="email" id="regemail" required>
    <p class="regtext">Email</p>	
    <span class="errorMsg" id="erroremail">*Please provide a valid email-ID.</span>	
    </div>
    
    <div class="input-container">
    <input type="password"  name="password" id="regpassword" class="passwordclass" required>
    <p class="regtext">Password</p>
    <span class="errorMsg" id="errorpassword" >*Please provide the valid password.</span>
    </div>

    <div class="input-container">
    <input type="password" name="repeatpassword" id="regrepeatpassword" required>
    <p class="regtext">Repeat password</p>
    <span class="errorMsg" id="errorrepeatpassword" >*Password does not match.</span>	
    </div>
     
    <div class="input-container">
    <input type="text"  name="botquestion" id="regbotquestion" required>
    <p class="regtext">The name of this platform?</p>
    <span class="errorMsg" id="errorbotquestion" >*Wrong answer!</span>	
    </div>

    <div class="termsofservice">
    <input type="checkbox" id="termsofservice" name="termsofservice"> By creating a Voteem account you agree to our <a href="#">Terms & Privacy</a></input>
    </div> 

    <input type="text"  name="bottest" id="bottest" style="display:none">
      
    <div class="gendercheck" style="display:none"> 
      <select name="gender"> 
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
      <option value="Unknown"  selected>Unknown</option>
      </select>
      </div>

    <br>
    <button type="submit" name="submit" id="submitreg">Register</button>

    <div class="alreadyhaveaccount">
    <p>Already have an account? <a href="#" onclick="loginBox()">Login here</a>.</p> 
    </div> 

  </form>
</div>


<!--LOGIN BUTTON-->

<div id="loginForm" class="modal">
<form action="<?php echo htmlspecialchars("includes/login.inc.php");?>" class="modal-content animate" id="loginJForm" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('loginForm').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img alt="Voteem" src="pictures/logo-transparent.png">
    </div>

    <div class="agreeofuse">
    <p id="termsofservice">By continuing to Voteem, you agree to our <a href="#">Terms & Privacy</a>.</p> 
    </div> 
    
    <br>
    <div class="input-container">
		<input type="text"  name="logusername" id="logusername" required>
    <p>Username</p>	
    <div id="availability"></div>	
	</div>  

    <div class="input-container">
    <input type="password"  name="logpassword" id="logpassword" class="passwordclass" required>
    <p>Password</p>
    <span id="availability"></span>
    <span class="errorMsg" id="errorpassword" >*Please provide the valid password.</span>
    </div>
 
    <button type="submit" name="submit" id="submitlog">Login</button>
    <div id="loginUWU"></div>
    <br></br>

    <div class="newtovoteem">
    <p id="alreadyaccount">Are you new to Voteem? <a href="#" onclick="registerBox()">Signup here!</a></p>
    </div> 

    </div>
  </form>
</div>

    <?php
    if(isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
        echo"<p>Fill in all fields!</p>";
        echo '<script>alert("Fill in all the fields!")</script>';
      }
      if($_GET["error"] == "wrongusername"){
        echo '<script>alert("User does not exist!")</script>';
      }

      if($_GET["error"] == "wrongpassword"){
        echo '<script>alert("Incorrect password!")</script>';
      }
    }

    ?>

<!--REGISTER BUTTON-->




	
