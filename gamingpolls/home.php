<?php
    
    include 'header.php';
    include 'includes/dbh.inc.php';
?>
<html>
<body>
<div class="topic-container">
<a href="#hot" onclick="openTopic(event, 'Hot')" id="default" class="tablinks"> <i class='fas fa-award'></i> Hot</a>
<a href="#polls" onclick="openTopic(event, 'Poll')" class="hotlinks"> <i class='fas fa-poll-h'></i> Poll</a>
<a href="#reviews" onclick="openTopic(event, 'Review')" class="hotlinks"><i class='fas fa-edit'></i> Review</a>

</div>

<button onclick="topFunction()" id="scrollbutton" title="Go to top"><i class="fas fa-arrow-up"></i></button>

<?php
//The interface to make a post as user
        if(!isset ($_SESSION["username"])){
            echo "<div class='making-post'>";
            echo "<input type=text id='postinput' onclick='loginBox()' placeholder='Create a post' readonly> </a>";
            echo "<a href='#' onclick='loginBox()' id='postbtn'>Post</a>";
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

    <!-- for the hot content -->
    <div id="Hot" class="hotcontent">
             <?php
           				$query = mysqli_query($conn,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN users on users.users_id = post.users_id order by post_id DESC")or die(mysqli_error());
                   while($post_row=mysqli_fetch_array($query)){
                   $id = $post_row['post_id'];	
                   $upid = $post_row['users_id'];	
                   $posted_by = $post_row['users_id'];
                   $imagepath = $post_row['imagepath'];
                   echo"<div class ='post-container'>";
                   echo"<div class ='post-container-title'>";
                  if($post_row['status'] == 0){ 
                    
                    $filename = "uploads/profile".$upid."*";
                    $fileinfo = glob($filename);
                    $fileext = explode(".", $fileinfo[0]);
                    $fileactualext = $fileext[1];
                     
                    echo "<div id='fkmedude'>";
                    echo "</div>";

                    echo "<img src='uploads/profile".$upid.".".$fileactualext."?".mt_rand()."' id='profileimghome'>"; echo "<br>";                
                  } else {
                    echo "<img src='uploads/profiledefault.jpg' id='profileimghome'>"; echo "<br>";      
                  }
                  
                  echo "<p id='postedby'> Posted by </p>";
                  
                  echo "<a href='makeapost.php' id='usernameinpost'>";
                  echo $post_row['users_username'];
                  echo "</a>";

                  echo "<a href='makeapost.php' id='usernameinpost'>";
                  echo "<p id='postedingenre'>/MMORPG</p>";
                  echo "</a>";

                  echo "<p id='timeforpost'>";
                  $mysqltime = $post_row['date_created'];
                  $timenow = date('d-m-y h:i:s');
                  strtotime($mysqltime) * 1000;

                  print_r($mysqltime);
                  print_r(stringtotime($mysqltime));
                  if ($mysqltime >= 31536000) {
                    echo "" . intval($timenow / 31536000) . " years ago";
                } elseif ($mysqltime >= 2419200) {
                    echo "" . intval($timenow / 2419200) . " months ago";
                } elseif ($mysqltime >= 86400) {
                    echo "" . intval($timenow / 86400) . " days ago";
                } elseif ($mysqltime >= 3600) {
                    echo "" . intval($timenow / 3600) . " hours ago";
                } elseif ($mysqltime >= 60) {
                    echo "" . intval($timenow / 60) . " minutes ago";
                } else {
                    echo "Less than a minute ago";
                }
                  echo "</p>";
                  echo "<span id='rating'>4.5</span>"; 
                  echo "</div>";
                  

                  echo "<h3 id='titleinpost'>";
                  echo $post_row['title'];
                  echo "</h3>";

                  if($post_row['type'] == 0){
                    echo"<h5 id ='post-container-content'>";
                    echo $post_row['content']."<br>";           
                    echo"</h5>";
                  } else if($post_row['type'] == 1){
                    echo"<h4 id ='post-container-content'>";
                    echo $post_row['content']."<br>";           
                    echo"</h4>";
                  } else if($post_row['type'] == 2){
                    echo"<h4 id ='post-container-content'>";
                    echo $post_row['content']."<br>";           
                    echo"</h4>";
                  } else if($post_row['type'] == 3){
                    echo"<h4 id ='post-container-content'>";
                      $filedest = $imagepath;
                      $fileinfo = glob($filedest);
                      foreach($fileinfo as $media) {
                        $mime = mime_content_type($filedest);
                          if(strstr($mime, "video/")){
                            echo "<video width='541' height='300' controls>";
                            echo '<source src="'.$media.'" /><br />';
                            echo "</video>";
                          }else if(strstr($mime, "image/")){
                            echo '<img src="'.$media.'" width="543" height="300"/>';
                          }
                       }
                       echo"</h4>";
                  }
             
                }
                
                echo"</div>";
            echo"</div>";
              ?>
            </div>


          <div id="Review" class="hotcontent">
             <?php
                   
                   $query = mysqli_query($conn,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN users on users.users_id = post.users_id order by post_id DESC")or die(mysqli_error());
                   while($review_row=mysqli_fetch_array($query)){
                   $review_id = $review_row['post_id'];	
                   $upid = $review_row['users_id'];	
                   $posted_by = $review_row['users_id'];

                   //The profile image of the user
                   echo"<div class ='post-container'>";
                   if($review_row['type'] == 2){
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
                    echo "<br>";   
                    echo $review_row['content'];
                    echo "<br>";         
                    echo "<br>";
                    echo $review_row['date_created']."<br>";

                    if(isset ($_SESSION["username"])){
                      echo "<button type='button' id='postbtn' onclick='replyFunction()'>Reply</button>";
                      include 'commentsection.php';      
                    }
                  }
            
                }
                echo"</div>";

              
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

</body>
</html>