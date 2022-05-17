<?php
require_once 'includes/dbh.inc.php';
require_once 'session.php';

if (isset($_POST['submit'])){
    $content  = $_POST['content'];
    
    mysqli_query($conn,"insert into post (content,date_created,users_id) values ('$content','".strtotime(date("Y-m-d h:i:sa"))."','$users_id') ")or die(mysqli_error());
    
    ?>
    <script>
    window.location = 'home.php';
    </script>
    <?php
    }
    ?>
