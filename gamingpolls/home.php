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
<<<<<<< HEAD
  <?php
    include_once 'header.php';
    
  ?>
    
=======
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
>>>>>>> parent of 70d99ae (har fixat registrering och login system)

    <!--Categories-->
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1> ~ News</h1>
            </div>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-car center"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="posts.php">Admin news</a></h4>
                    <p>New changes to the polls...</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span>24 Posts | 12 Topics</span>
                </div>
                
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">Hamodi</a> 
                    <br>on <small>12 Dec 2020</small>
                </div>
            </div>
        </div>
        
        
        <div class="subforum">
            <div class="subforum-title">
                <h1>Categories</h1>
            </div>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-car center"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="posts.html">Games</a></h4>
                    <p>Description Content: let's try to be cool, otherwise,w at 'sthe point in libing together with people youdont' live.</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span>24 Posts | 12 Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a> 
                    <br>on <small>12 Dec 2020</small>
                </div>
            </div>

            <hr class="subforum-devider">
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-car center"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="posts.html">Social</a></h4>
                    <p>Description Content: let's try to be cool, otherwise,w at 'sthe point in libing together with people youdont' live.</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span>24 Posts | 12 Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a> 
                    <br>on <small>12 Dec 2020</small>
                </div>
            </div>
            <hr class="subforum-devider">
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-car center"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="posts.html">NFTs/Crypto</a></h4>
                    <p>Description Content: let's try to be cool, otherwise,w at 'sthe point in libing together with people youdont' live.</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span>24 Posts | 12 Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a> 
                    <br>on <small>12 Dec 2020</small>
                </div>
            </div>
            <hr class="subforum-devider">
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-car center"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="posts.html">What's going on today?</a></h4>
                    <p>Description Content: let's try to be cool, otherwise,w at 'sthe point in libing together with people youdont' live.</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span>24 Posts | 12 Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a> 
                    <br>on <small>12 Dec 2020</small>
                </div>
            </div>
            <hr class="subforum-devider">
        </div>
        
        <div class="subforum">
            <div class="subforum-title">
                <h1>General information for support</h1>
            </div>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-car center"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="posts.html">Help</a></h4>
                    <p>Description Content: let's try to be cool, otherwise,w at 'sthe point in libing together with people youdont' live.</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span>24 Posts | 12 Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a> 
                    <br>on <small>12 Dec 2020</small>
                </div>
            </div>
            <hr class="subforum-devider">
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-car center"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="posts.html">Poll tutorial</a></h4>
                    <p>Description Content: let's try to be cool, otherwise,w at 'sthe point in libing together with people youdont' live.</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span>24 Posts | 12 Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a> 
                    <br>on <small>12 Dec 2020</small>
                </div>
            </div>
            <hr class="subforum-devider">
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-car center"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="posts.html">Sponsorship</a></h4>
                    <p>Description Content: let's try to be cool, otherwise,w at 'sthe point in libing together with people youdont' live.</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span>24 Posts | 12 Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a> 
                    <br>on <small>12 Dec 2020</small>
                </div>
            </div>
            <hr class="subforum-devider">

           
        </div>
        
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