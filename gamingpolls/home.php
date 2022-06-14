<?php
    
    include 'header.php';
    include 'includes/dbh.inc.php';
?>
<body>
<div class="topic-container">
  <button class="hotlinks" onclick="openTopic(event, 'Hot')" id="default">Hot</button>
  <button class="hotlinks" onclick="openTopic(event, 'Poll')">Poll</button>
  <button class="hotlinks" onclick="openTopic(event, 'Review')">Review</button>
  <button class="hotlinks" onclick="openTopic(event, 'Media')">Media</button>
</div>

    <!-- for the hot content -->
    <div id="Hot" class="hotcontent">
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
                  echo $post_row['content']."<br>";           
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
          </div>


          <div id="Media" class="hotcontent">
             <?php
                   $stmt = $conn->prepare('SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from media LEFT JOIN users on users.users_id = ? order by media_id DESC') or die(mysqli_error());
                   $id = $_SESSION["userid"];
                   $stmt->bind_param('s', $id); // 's' specifies the variable type => 'string'
                   $stmt->execute();
 
                   $result = $stmt->get_result();
                   while ($media_row = $result->fetch_assoc()){
                   $id = $media_row['media_id'];	
                   $upid = $media_row['users_id'];	
                   $imagepath = $media_row['imagepath'];

                   //The profile image of the user
                   echo"<div class ='post-container'>";
                  if($media_row['status'] == 0){ 
                    $filename = "uploads/profile".$upid."*";
                    $fileinfo = glob($filename);
                    $fileext = explode(".", $fileinfo[0]);
                    $fileactualext = $fileext[1];
                    echo "<img src='uploads/profile".$upid.".".$fileactualext."?".mt_rand()."'>"; echo "<br>";
                  } else {
                    echo "<img src='uploads/profiledefault.jpg'>"; echo "<br>";
                  }
                  //The image or video that has been uploaded
                  $filedest = $imagepath;
                  $fileinfo = glob($filedest);
                  foreach($fileinfo as $media) {
                    $mime = mime_content_type($filedest);
                      if(strstr($mime, "video/")){
                        echo "<video width='320' height='240' controls>";
                        echo '<source src="'.$media.'" /><br />';
                        echo "</video>";
                      }else if(strstr($mime, "image/")){
                        echo '<img src="'.$media.'" /><br />';
                      }
                   }
                   echo "<br>";
                  echo $media_row['users_username']."<br>";
                  echo $media_row['title']."<br>";
                  echo $media_row['date_created']."<br>";
        
                 
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
          </div>

           				
                  


          <!-- for the review content -->
          <div id="Review" class="hotcontent">
             <?php        	
                  $stmt = $conn->prepare('SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from review LEFT JOIN users on users.users_id = ? order by review_id DESC') or die(mysqli_error());
                  $stmt->bind_param('s', $_SESSION['userid']); // 's' specifies the variable type => 'string'
                  $stmt->execute();

                  $result = $stmt->get_result();
                  while ($review_row = $result->fetch_assoc()){
                   $id = $review_row['review_id'];	
                   $upid = $review_row['users_id'];	
                   $posted_by = $review_row['users_id'];
                   echo"<div class ='post-container'>";
                  if($review_row['status'] == 0){ 
                    $filename = "uploads/profile".$upid."*";
                    $fileinfo = glob($filename);
                    $fileext = explode(".", $fileinfo[0]);
                    $fileactualext = $fileext[1];
                    echo "<img src='uploads/profile".$upid.".".$fileactualext."?".mt_rand()."'>"; echo "<br>";
                  } else {
                    echo "<img src='uploads/profiledefault.jpg'>"; echo "<br>";
                  }
                  echo $review_row['users_username']."<br>";
                  echo $review_row['title']."<br>";
                  echo $review_row['content']."<br>";          
                  echo $review_row['date_created']."<br>";
                  
                  if(isset ($_SESSION["username"])){
                    echo "<button type='button' id='postbtn' onclick='replyFunction()'>Reply</button>";
                    include 'commentsection.php';      
                  }
             
                }
                echo"</div";
                $stmt->close();

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
          </div>


          <!-- for the poll content -->
          <div id="Poll" class="hotcontent">
             <?php
                  $id = $_SESSION["userid"];	
                  $stmt = $conn->prepare('SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from poll LEFT JOIN users on users.users_id = ? order by poll_id DESC') or die(mysqli_error());
                  $stmt->bind_param('s', $id); // 's' specifies the variable type => 'string'
                  $stmt->execute();
                  
                  $result = $stmt->get_result();
                  while ($poll_row = $result->fetch_assoc()) {
                    $id = $poll_row['poll_id'];
                    $upid = $poll_row['users_id'];	
                    $posted_by = $poll_row['users_id'];
                    echo"<div class ='post-container'>";
                    if($poll_row['status'] == 0){ 
                      $filename = "uploads/profile".$upid."*";
                      $fileinfo = glob($filename);
                      $fileext = explode(".", $fileinfo[0]);
                      $fileactualext = $fileext[1];
                      echo "<img src='uploads/profile".$upid.".".$fileactualext."?".mt_rand()."'>"; echo "<br>";
                    } else {
                      echo "<img src='uploads/profiledefault.jpg'>"; echo "<br>";
                    }
                    echo $poll_row['users_username']."<br>";
                    echo $poll_row['title']."<br>";
                    echo $poll_row['content']."<br>";         
                    echo $poll_row['date_created']."<br>";
                    
                    if(isset ($_SESSION["username"])){
                      echo "<button type='button' id='postbtn' onclick='replyFunction()'>Reply</button>";
                      include 'commentsection.php';      
                    }
               
                  }
                  echo"</div";
                  $stmt->close();

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
            echo "<input type=text id='postinput' placeholder='Create a post' readonly> </a>";
            echo "<a href='#' id='postbtn'>Post</a>";
            echo "</div>"; 
            
        } else {
            echo "<div class='making-post'>";
            $id = $_SESSION["userid"];
            $sqlImg = "SELECT * FROM users WHERE users_id='$id'";
            $resultImg = mysqli_query($conn, $sqlImg);
            while($row = mysqli_fetch_assoc($resultImg)){
              if($row['status'] == 0){ 
                $filename = "uploads/profile".$id."*";
                $fileinfo = glob($filename);
                $fileext = explode(".", $fileinfo[0]);
                $fileactualext = $fileext[1];
                echo "<img src='uploads/profile".$id.".".$fileactualext."?".mt_rand()."'>";
              } else {
                echo "<img src='uploads/profiledefault.jpg'>";
              }
          }
            echo "<a href='makeapost.php'> <input type=text id='postinput' placeholder=' Create a post...' readonly> </a>";
            echo "<a href='makeapost.php' id='postbtn'>Post</a>";
            echo "</div>";
        }

        ?>


    <?php
        include "footer.php";
    ?>
</body>
