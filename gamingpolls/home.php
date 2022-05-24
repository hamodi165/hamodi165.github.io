<?php
    include 'header.php';
    include 'includes/dbh.inc.php';
    include 'upload.php';
?>
<body>
<div class="layout">
      <div class="layout__main">
        <div class="tweet">
          <img class="tweet__author-logo" src="./images/profile-image-1.jpg" />
          <div class="tweet__main">
            <div class="tweet__header">
              <div class="tweet__author-name">
                Becki (& Chris)
              </div>
              <div class="tweet__author-slug">
                @beckiandchris
              </div>
              <div class="tweet__publish-time">
                38m
              </div>
            </div>
            <div class="tweet__content">
              Thank you
            </div>
          </div>
        </div>
        <div class="tweet">
          <img class="tweet__author-logo" src="./images/profile-image-1.jpg" />
          <div class="tweet__main">
            <div class="tweet__header">
              <div class="tweet__author-name">
                Elixir Digest
              </div>
              <div class="tweet__author-slug">
                @elixirdigest
              </div>
              <div class="tweet__publish-time">
                10d
              </div>
            </div>
            <div class="tweet__content">
              Yet Another Guide To Build a JSON API with Phoenix 1.5 shared in
              the latest Elixir Digest
              <a href="https://elixirdigest.net/digests/276"
                >https://elixirdigest.net/digests/276</a
              >
              @_tamas_soos #myelixirstatus #elixirlang #phoenixframework
            </div>
          </div>
        </div>

        <div class="tweet">
          <img class="tweet__author-logo" src="./images/profile-image-1.jpg" />
          <div class="tweet__main">
            <div class="tweet__header">
              <div class="tweet__author-name">
                Chris Martin
              </div>
              <div class="tweet__author-slug">
                @chris_martin
              </div>
              <div class="tweet__publish-time">
                15h
              </div>
            </div>
            <div class="tweet__content">
             <?php
           				$query = mysqli_query($conn,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN users on users.users_id = post.users_id order by post_id DESC")or die(mysqli_error());
                   while($post_row=mysqli_fetch_array($query)){
                   $id = $post_row['post_id'];	
                   $upid = $post_row['users_id'];	
                   $posted_by = $post_row['users_id'];
                  echo "<div class='comment-box'>";
                  if($post_row['status'] == 0){
                    $filename = "uploads/profile".$upid."*";
                    $fileinfo = glob($filename);
                    $fileext = explode(".", $fileinfo[0]);
                    $fileactualext = $fileext[1];
                    echo "<img src='uploads/profile".$upid.".".$fileactualext."?".mt_rand()."'>"; echo "<br>";
                  } else {
                    echo "<img src='uploads/profiledefault.jpg'>"; echo "<br>";
                  }
                  echo $post_row['title']."<br>";
                  echo $post_row['date_created']."<br>";
                  echo $post_row['users_username']."<br>";
                  echo $post_row['content'];           
                  echo "</p></div>";
                  if(isset ($_SESSION["username"])){
                    echo "<button type='button' id='postbtn' onclick='replyFunction()'>Reply</button>";
                    include 'commentsection.php';      
                  }
             
                }
              
            $sql = "SELECT * FROM comment LIMIT 1";
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)){
              echo "<div class='comment-box'>";
              echo $row['date_posted']."<br>";
              echo $row['users_id']."<br>";
              echo $row['content']."<br>";           
              echo "</p></div>";
            }     
              ?>
            </div>
          </div>
        </div>

        <div class="tweet">
          <img class="tweet__author-logo" src="./images/profile-image-1.jpg" />
          <div class="tweet__main">
            <div class="tweet__header">
              <div class="tweet__author-name">
                Becki (& Chris)
              </div>
              <div class="tweet__author-slug">
                @beckiandchris
              </div>
              <div class="tweet__publish-time">
                38m
              </div>
            </div>
            <div class="tweet__content">
              Thank you
            </div>
          </div>
        </div>

        <div class="tweet">
          <img class="tweet__author-logo" src="./images/profile-image-1.jpg" />
          <div class="tweet__main">
            <div class="tweet__header">
              <div class="tweet__author-name">
                Becki (& Chris)
              </div>
              <div class="tweet__author-slug">
                @beckiandchris
              </div>
              <div class="tweet__publish-time">
                38m
              </div>
            </div>
            <div class="tweet__content">
              Thank you
            </div>
          </div>
        </div>

        <div class="tweet">
          <img class="tweet__author-logo" src="./images/profile-image-1.jpg" />
          <div class="tweet__main">
            <div class="tweet__header">
              <div class="tweet__author-name">
                Becki (& Chris)
              </div>
              <div class="tweet__author-slug">
                @beckiandchris
              </div>
              <div class="tweet__publish-time">
                38m
              </div>
            </div>
            <div class="tweet__content">
              Thank you
            </div>
          </div>
        </div>
      </div>
      <div class="layout__right-sidebar-container">
        <div class="layout__right-sidebar">
            <a href="makeapost.php"> <input type=text id="postinput" placeholder="Create a post" readonly> </a>
            <a href="makeapost.php" id="postbtn">Post</a>
            </div>
          </div>
          
          </div>
        </div>
      </div>
    </div>


    <?php
        include "footer.php";
    ?>
</body>
