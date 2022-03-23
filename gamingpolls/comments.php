<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming polls</title>
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
      <!--Menu Section-->
      <div class="dropdown">
        <a href="home.html">Home</a>
        </div>
      </div>

    <div class="dropdown">
        <a href="women.html">News</a>
        <div class="dropdown-content">
        </div>
      </div>

      <div class="dropdown">
        <a href="detail.html">Popular</a>
        <div class="dropdown-content">
        </div>
      </div>


        <!--SearchBox Section-->
        <div class="box">
            <form name="search">
                <input type="text" class="input" name="txt" placeholder="Search and press enter..." 
                onmouseout="document.search.txt.value = ''">
                <i class="fas fa-search"></i>
            </form>           
        </div>

    </header>

    

    <div class="container">
        <!--Navigation-->
        <div class="navigate">
            <span><a href="">MyForum - Forums</a> >> <a href="">random subforum</a></span>
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
                    <div class="username"><a href="">Username</a></div>
                    <div>Role</div>
                    <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">
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
        <div class="comments-container">
            <div class="body">
                <div class="authors">
                    <div class="username"><a href="">AnotherUser</a></div>
                    <div>Role</div>
                    <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">
                    <div>Posts: <u>455</u></div>
                    <div>Points: <u>4586</u></div>
                </div>
                <div class="content">
                    Just a comment of the above random topic.
                    <br>To see how it looks like.
                    <br><br>
                    Nothing more and nothing less.
                    <br>
                    <br>
                    <div class="comment">
                        <button onclick="replyFunction()">Reply</button>
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
        <!--Reply Area-->
        <div class="comment-area hide" id="reply-area">
            <textarea name="reply" id="" placeholder="Reply"></textarea>
            <input type="submit" value="submit">
        </div>

        <!-- Comment 1 end -->
    

    <footer>
        <span>&copy;  Gaming Polls | All Rights Reserved</span>
    </footer>
    <script src="main.js"></script>
</body>
</html>