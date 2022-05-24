<?php
   
?>

<div class="comment-section">
<form action="<?php echo htmlspecialchars("includes/comments.inc.php");?>"method="post">
    <input type="hidden" name="post_id">
    <input type="hidden" name="users_id">
    <input type="hidden"  name="date_posted"> <br>
    <textarea id="commentarea" name="content" style="display:none"></textarea>
    <button type="submit" id="replyButton" name="submit" style="display:none">Comment</button>
  </form>
</div>
