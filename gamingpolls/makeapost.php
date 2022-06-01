<?php
    include 'session.php';
    include 'homeheader.php';
?>

<body>


<div class="thread">
<form action="<?php echo htmlspecialchars("includes/posts.inc.php");?>"method="post">
    <h4>Create a post </h4>
    <hr></hr>
    <input type="hidden" name="users_id" value="<?php echo  $_SESSION["userid"] ?>">
    <input type="text" id="thetitle" name="title" placeholder="Title">
    <input type="hidden"  name="date_created"> <br>
    <textarea id="summernote" name="content"></textarea>
    <hr></hr>
    <button type="submit" id="postbutton" name="submitPost" >Post</button>
    
  </form>
</div>

<?php
    if(isset($_GET["error"])){
    if($_GET["error"] == "emptycontentinput"){
      echo '<script>alert("You need to write some content before posting!")</script>';
    }

    if($_GET["error"] == "emptytitleinput"){
      echo '<script>alert("You need to write a title before posting!")</script>';
    }
  }
?>


<script> $(document).ready(function() {
  $('#summernote').summernote({
        placeholder: 'Text (Optional)',
        tabsize: 2,
        height: 160,     
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview']]
        ]
      });
}); </script>

 <?php
        include "footer.php";
    ?>
</body>

