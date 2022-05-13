<?php
    require 'header.php';
    if(!isset($_SESSION["username"])){header("location: login.php");}
?>

<body>

<div class="thread">
  <form action="/action_page.php">
    <input type="text" id="posttitle" name="posttitle" placeholder="Your last name..">  <br>
    <textarea id="subject" name="subject" placeholder="Text (Optional)"></textarea>
    <br>
    <input type="submit" value="Submit">
  </form>
</div>


</body>

