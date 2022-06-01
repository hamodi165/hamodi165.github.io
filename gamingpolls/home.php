<?php
    include 'header.php';
    include 'includes/dbh.inc.php';
?>
<body>
            
             <?php
           				$query = mysqli_query($conn,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN users on users.users_id = post.users_id order by post_id DESC")or die(mysqli_error());
                   while($post_row=mysqli_fetch_array($query)){
                   $id = $post_row['post_id'];	
                   $upid = $post_row['users_id'];	
                   $posted_by = $post_row['users_id'];
                   echo"<div class ='post-container'>";
                  if($post_row['status'] == 0){ 
                    $filename = "uploads/profile".$upid."*";
                    $fileinfo = glob($filename);
                    $fileext = explode(".", $fileinfo[0]);
                    $fileactualext = $fileext[1];
                    echo "<img src='uploads/profile".$upid.".".$fileactualext."?".mt_rand()."'>"; echo "<br>";
                  } else {
                    echo "<img src='uploads/profiledefault.jpg'>"; echo "<br>";
                  }
                  echo $post_row['users_username']."<br>";
                  echo $post_row['title']."<br>";
                  echo $post_row['content'];           
                  echo $post_row['date_created']."<br>";
                  
                  if(isset ($_SESSION["username"])){
                    echo "<button type='button' id='postbtn' onclick='replyFunction()'>Reply</button>";
                    include 'commentsection.php';      
                  }
             
                }
                echo"</div";
              
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

        <?php
        if(!isset ($_SESSION["username"])){
            echo "<div class='making-post'>";
            echo "<input type=text id='postinput' onclick='openFormLogin()' placeholder='Create a post' readonly> </a>";
            echo "<a href='#' onclick='openFormLogin()' id='postbtn'>Post</a>";
            echo "</div>"; 
            
        } else {
            echo "<div class='making-post'>";
            $id = $_SESSION["userid"];
            $sqlImg = "SELECT * FROM users WHERE users_id='$id'";
            $resultImg = mysqli_query($conn, $sqlImg);
            while($row = mysqli_fetch_assoc($resultImg)){
            $filename = "uploads/profile".$id."*";
            $fileinfo = glob($filename);
            $fileext = explode(".", $fileinfo[0]);
            $fileactualext = $fileext[1];
            echo "<img src='uploads/profile".$id.".".$fileactualext."?".mt_rand()."'>";
          }
            echo "<a href='makeapost.php'> <input type=text id='postinput' placeholder='Create a post' readonly> </a>";
            echo "<a href='makeapost.php' id='postbtn'>Post</a>";
            echo "</div>";
        }

        ?>


    <?php
        include "footer.php";
    ?>
</body>
