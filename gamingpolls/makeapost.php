<?php
    require 'header.php';
    require 'includes/dbh.inc.php';
    require 'includes/posts.inc.php';
    if(!isset($_SESSION["username"])){header("location: login.php");}
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
    <button type="submit" id="postbutton" name="submit">Post</button>
    
  </form>
</div>



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

