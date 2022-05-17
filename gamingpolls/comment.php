<?php
require_once 'includes/dbh.inc.php';
require_once 'session.php';


if (isset($_POST['comment'])){
$comment = $_POST['content'];

mysqli_query($conn,"insert into comment (content,users_id,post_id) values ('$comment','$users_id','$content')") or die (mysqli_error());

?>
<script>
window.location = 'home.php';
</script>

<?php
}
?>