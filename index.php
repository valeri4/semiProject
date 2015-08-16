<?php
include_once 'includes/global.php';
include_once 'includes/auth.php';
include_once 'includes/header.php';
include_once './posts/showPosts.php';
?>
<div class="userInfoContainer">
    <h3>My Page:</h3>
    <div class="userInfo">
        <div class="profileImg">
            <img src="css/images/man.jpg" alt="Profile Photo"/>
        </div>
        <div class="perfonalInfo">
            <ul>
                <li><strong>First Name: </strong>Valery</li>
                <li><strong>Last Name: </strong>Dubina</li>
                <li><strong>Birthday: </strong>20/04/89</li>
            </ul>
        </div>
        <div class="personalAbout">
            <p><strong>About me:</strong></p>
            <div class="aboutText">
                <p>gdfgdfgdfhg</p>
                <ul>
                    <li>xczxc<strong>dfdfsdfsd</strong></li>
                    <li><strong>dfsdfsdf</strong></li>
                    <li><strong>fgsfgsgfsgf</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= vd($_SESSION['loggedUser']) ?>

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