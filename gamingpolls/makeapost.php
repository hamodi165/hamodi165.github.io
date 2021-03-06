<?php
    include 'session.php';
    include 'homeheader.php';
?>

<body>

<?php
$typepost = 0;
$typepoll = 1;
$typereview = 2;
?>


<div class="makingapost-container">
    <button class="makinglinks" onclick="openPost(event, 'Hot')" id="default">Hot</button>
    <button class="makinglinks" onclick="openPost(event, 'Poll')">Poll</button>
    <button class="makinglinks" onclick="openPost(event, 'Review')">Review</button>
    <button class="makinglinks" onclick="openPost(event, 'Upload')">Videos & Images</button>
    </div>

<div id="Hot" class="postcontent">
<form action="<?php echo htmlspecialchars("includes/posts.inc.php");?>"method="post">
    <h4>Create a post </h4>
    <hr></hr>
    <input type="hidden" name="users_id" value="<?php echo  $_SESSION["userid"] ?>">
    <input type="text" id="thetitle" name="title" placeholder="Title">
    <input type="hidden"  name="date_created"> <br>
    <input type="number" id="type" name="type" value = "<?php echo (isset($typepost))?$typepost:'';?>" min="0" max="0" hidden>
    <textarea id="summernote" name="content"></textarea>
    <hr></hr>
    <button type="submit" id="postbutton" name="submit" >Post</button>
  </form>
</div>

<div id="Poll" class="postcontent">
<form action="<?php echo htmlspecialchars("includes/posts.inc.php");?>"method="post">
    <h4>Create a poll </h4>
    <hr></hr>
    <input type="hidden" name="users_id" value="<?php echo  $_SESSION["userid"] ?>">
    <input type="text" id="thetitle" name="title" placeholder="Title">
    <input type="hidden"  name="date_created"> <br>
    <input type="number" id="type" name="type" value = "<?php echo (isset($typepoll))?$typepoll:'';?>" min="1" max="1" hidden>
    <textarea id="contentarea" name="content"></textarea>
    <hr></hr>
    <button type="submit" id="postbutton" name="submit" >Post</button>
  </form>
</div>

<div id="Review" class="postcontent">
<form action="<?php echo htmlspecialchars("includes/posts.inc.php");?>"method="post">
    <h4>Create a review </h4>
    <hr></hr>
    <input type="hidden" name="users_id" value="<?php echo  $_SESSION["userid"] ?>">
    <input type="text" id="thetitle" name="title" placeholder="Title">
    <input type="hidden"  name="date_created"> <br>
    <input type="number" id="type" name="type" value = "<?php echo (isset($typereview))?$typereview:'';?>" min="2" max="2" hidden>
    <textarea id="contentaread" name="content"></textarea>
    <hr></hr>
    <button type="submit" id="postbutton" name="submit" >Post</button>
  </form>
</div>

<div id="Upload" class="postcontent">
<form method="post" action="<?php echo htmlspecialchars("uploadpost.php");?>" enctype="multipart/form-data">
    <h4>Videos & Images</h4>
    <hr></hr>
    <input type="text" id="thetitle" name="title" placeholder="Title">
    <input type="hidden" name="users_id" value="<?php echo  $_SESSION["userid"] ?>">
    <input type="text" id="imagepath" name="imagepath" hidden>
    <input type="hidden"  name="date_created">
    <input type="number" id="type" name="type" min="3" max="3" hidden>
    <textarea id="videoimage" name="content" hidden></textarea>
    <div class="upload-container">
    <input type="file" id="imgvid" name="file" accept="image/png, image/jpg, image/jpeg, video/mp4"/>
    <div id="drop-area">
    <img src="" id="imgsource" style="display:none"> <br>
    <video width="100%" height="20%" style="display:none" id="video" controls>
    <source src="" id="videoplayer">
    </video>
    </div>
    </div>
    <button type="submit" name="submitimgvid" id="postbutton">Post</button>
    </form>
</div>

<script>

$("#imgvid").change(function() {
   imgPreview(this);
  });
  function imgPreview(input) {
    var file = input.files[0];
    var mixedfile = file['type'].split("/");
    var filetype = mixedfile[0]; // (image, video)
    if(filetype == "image"){
      var reader = new FileReader();
      reader.onload = function(e){
        $("#imgsource").show().attr("src", e.target.result);
        $("#video").hide().attr("src", URL.createObjectURL(input.files[0]));
      }
      reader.readAsDataURL(input.files[0]);
    }else if(filetype == "video"){
      $("#video").show().attr("src", URL.createObjectURL(input.files[0]));
      $("#imgsource").hide().attr("src", e.target.result);
      $("#videoplayer")[0].load();
    }else{
        alert("Invalid file type");
    }
  }
    
</script>


<?php
    if(isset($_GET["error"])){
    if($_GET["error"] == "emptycontentortitle"){
      echo '<script>alert("You need to fill title or content with text!")</script>';
    }

    if($_GET["error"] == "nostringontitle"){
      echo '<script>alert("Title must contain only characters and numbers!")</script>';
    }

    
  }
?>


<script> $(document).ready(function() {
  $('#summernote').summernote({
        placeholder: 'Text (Optional)',
        tabsize: 2,
        height: 160,
        blockquoteBreakingLevel: 2,
        toolbar: [
          ['font', ['bold', 'underline']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen']]
        ]
      });
}); 

$(document).ready(function() {
  $('#contentarea').summernote({
        placeholder: 'Text (Optional)',
        tabsize: 2,
        height: 160,
        blockquoteBreakingLevel: 2,
        toolbar: [
          ['font', ['bold', 'underline']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen']]
        ]
      });
}); 

$(document).ready(function() {
  $('#contentaread').summernote({
        placeholder: 'Text (Optional)',
        tabsize: 2,
        height: 160,
        blockquoteBreakingLevel: 2,
        toolbar: [
          ['font', ['bold', 'underline']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen']]
        ]
      });
}); 

</script>

 <?php
        include "footer.php";
    ?>
</body>

