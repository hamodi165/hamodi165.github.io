<?php
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
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="mobileFunction()">&#9776;</a>
</div>
</header>