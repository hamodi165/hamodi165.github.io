<?php
    require 'header.php';
    if(!isset($_SESSION["username"])){header("location: login.php");}
?>

<body>

<div class="thread">
<form action="<?php echo htmlspecialchars("home.php");?>"method="post">
    <h3>Create a post </h3>
    <hr></hr>
    <input type="text" id="thetitle" name="posttitle" placeholder="Title"> <br>
    <textarea id="summernote" name="subject"></textarea>
    <hr></hr>
    <button type="submit" id="postbutton">Post</button>
    
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
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
}); </script>
 <?php
        include "footer.php";
    ?>
</body>

