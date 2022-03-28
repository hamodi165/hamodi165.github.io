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
    <?php
// define variables and set to empty values
$usernameErr = $emailErr = $passwordErr = $repeatpasswordErr = "";
$username = $email = $password = $repeatpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
        $usernameErr = "Only letters and white space allowed";
        }
    }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
        }
    }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["repeatpassword"])) {
    $repeatpasswordErr = "Repeating password is required";
  } else {
    $repeatpassword = test_input($_POST["repeatpassword"]);
  }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

    <!--Login Section-->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="container-register-login" id="formm"> 

    * Name: <input type="text" placeholder="Enter Username" name="username" id="username" value="<?php echo $username;?>" required>
    <span class="error"> <?php echo $usernameErr;?></span>
    <br><br>
    * Email: <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo $email;?>" required>
    <span class="error"> <?php echo $emailErr;?></span>
    <br><br>
    * Password: <input type="password" placeholder="Enter Password" name="password" id="password" value="<?php echo $password;?>" required>
    <span class="error"> <?php echo $passwordErr;?></span>
    <br><br>
    * Repeat Password: <input type="repeatpassword" placeholder="Repeat Password" name="repeatpassword" id="repeatpassword" value="<?php echo $repeatpassword;?>" required>
    <span class="error"><?php echo $repeatpasswordErr;?></span>
    <br><br>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
    
    <div class="container-signin">
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
  </div>
  </form>
    
    <!-- Forum Info -->
    <footer>
        <span>&copy;  Gamingpolls | All Rights Reserved</span>
    </footer>
    <script src="main.js"></script>
</body>
</html>