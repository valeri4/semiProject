<?php
include_once 'includes/global.php';
include_once 'includes/auth.php';
include_once 'includes/header.php';
include_once './posts/showPosts.php';
include_once './users/myInfoBlock.php';
?>

<?= viewInfoBlock() ?>


<div class="addPost">
    <h3>Add Post:</h3>
    <form role="form" method="POST" action="posts/addShowPosts.php" class="formPost">
        <div class="form-group">
            <textarea class="form-control" rows="5" id="about" name="userPostText">
            </textarea>
        </div>
        <button type="button" class="btn btn-default" id="postSend">Send Post</button>
        <img src="img/ajax-loader.gif" alt="loading..." class="loading" id="loader"/>
    </form>
</div>

<div class="postContainer">
    <h3>My Posts:</h3>
    <?= showPosts($dbCon) ?>
</div>
<?php
include_once './includes/footer.php';
?>