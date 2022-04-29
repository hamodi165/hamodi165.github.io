<?php
    include 'header.php';  
    if(!isset($_SESSION["username"])){header("location: login.php");}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Polls</title>
    <link rel="stylesheet" href="htmlcssjs/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome-free-5.15.1/css/all.css">
    <title>Search</title>
  <script src="https://kit.fontawesome.com/afd6aa68df.js" crossorigin="anonymous"></script>
</head>

<body>

    
    <div class="container">
        <!--Navigation-->
        <div class="navigate">
            <span>Your profile</span>
        </div>
     
        <!--Topic Section-->
        <div class="topic-container">
            <!--Original thread-->
            <div class="head">
                <div class="authors">Author</div>
                <div class="content">Topic: random topic (Read 1325 Times)</div>
                
            </div>

            <div class="body">
                <div class="authors">
                <?php
                    if(isset ($_SESSION["username"])){
                        echo "<h3>" . $_SESSION["username"] . "</h3>";
                    }
                ?>
                    <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">
                    <?php
                    if(isset ($_SESSION["role"])){
                        echo "<h4>" . $_SESSION["role"] . "</h4>";
                    }
                    ?>
                    <div>Posts: <u>45</u></div>
                    <div>Points: <u>4586</u></div>
                </div>
                <div class="content">
                    Just a random content of a random topic.
                    <br>To see how it looks like.
                    <br><br>
                    Nothing more and nothing less.
                    <br>
                    <hr>
                    Regards username
                    <br>
                    <div class="comment">
                        <button onclick="commentFunction()">Comment</button>
                    </div>
                    <button type="button">
                        <span aria-hidden="true">&#9650;</span>
                        <span class="sr-only">Vote up</span>
                    </button>
                    <button type="button">
                        <span aria-hidden="true">&#9660;</span>
                        <span class="sr-only">Vote down</span>
                    </button>
                </div>
            </div>
        </div>

        <!--Comment Area-->
        <div class="comment-area hide" id="comment-area">
            <textarea name="comment" id="" placeholder="Write a comment"></textarea>
            <input type="submit" value="submit">
        </div>

        <!--Comments Section-->
        
        <!--Reply Area-->
        <div class="comment-area hide" id="reply-area">
            <textarea name="reply" id="" placeholder="Reply"></textarea>
            <input type="submit" value="submit">
        </div>

        <!-- Comment 1 end -->
    

    <?php
        include "footer.php";
    ?>
</body>
</html>