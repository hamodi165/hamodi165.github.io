<?php
    require 'header.php';
    if(!isset($_SESSION["username"])){header("location: login.php");}
?>

<body>

<div class="thread">
  <form action="/action_page.php">
    <div class="thetitle">
    <input type="text" class="posttitle" name="posttitle" placeholder="Title"> <br>
  </div>
    <textarea id="summernote" name="subject"></textarea>
    <input type="submit" value="Submit">
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

</body>

