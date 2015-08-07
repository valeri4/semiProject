<?php
include_once './includes/global.php';
include_once './includes/helpers.php';
include_once 'includes/auth.php';
include_once './includes/header.php';

//get userInfo from db
$uId = $_SESSION['u_id'];

$sql = "SELECT * FROM users 
                        WHERE u_id ='$uId' LIMIT 1";
$result = $dbCon->query($sql);
if (!$result) {
    die('Query failed: ' . $dbCon->error);
}

$userArr = $result->fetch_assoc();

$date = date_create($userArr['u_b_day']);
$bdateview = date_format($date, 'd/m/Y');

//update userInfo
if ($_POST) {
    $b_day = $_POST['b_day'];
    //If date was changed 
    if ($b_day != $bdateview) {
        $b_day = date("Y-m-d", strtotime(str_replace('/', '-', $b_day)));
        vd($b_day);
    } else {
        $b_day = $userArr['u_b_day'];
    }
    $u_f_name = $_POST['f_name'];
    $u_l_name = $_POST['l_name'];
    $u_about = $_POST['about'];
    @$u_pwd = $_POST["pwd"];
    //if password not changed
    if ($u_pwd == '') {
        $sql = "UPDATE users SET u_f_name='$u_f_name', u_l_name='$u_l_name', u_b_day='$b_day', u_about='$u_about' WHERE u_id=$uId ";
    }
    $u_pwd = password_hash($u_pwd, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET u_f_name='$u_f_name', u_l_name='$u_l_name', u_b_day='$b_day', u_about='$u_about', u_pwd='$u_pwd' WHERE u_id=$uId ";
    $result = $dbCon->query($sql);
    if (!$result) {
        die('Query failed : ' . $dbCon->error);
    }
    redirect('userinfo.php');
}
?>

<h2>Profile</h2>
<form role="form" method="POST">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email"  class="form-control" id="email" name="email" placeholder="<?= $userArr['u_email'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="nickName">Nickname:</label>
        <input type="text" class="form-control" id="nickName" name="nickName" placeholder="<?= $userArr['u_nickName'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="f_name">First Name:</label>
        <input type="text" class="form-control" id="f_name" name="f_name" value="<?= $userArr['u_f_name'] ?>">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name:</label>
        <input type="text" class="form-control" id="l_name" name="l_name" value="<?= $userArr['u_l_name'] ?>">
    </div>
    <div class="form-group">
        <label for="datepicker">Birth date:</label>
        <input type="text" class="form-control" id="datepicker" name="b_day" value="<?= $bdateview ?>">
    </div>
    <div class="form-group">
        <label for="about">About myself:</label>
        <textarea class="form-control" rows="5" id="about" name="about"><?= $userArr['u_about'] ?>
        </textarea>
    </div>
    <h3>Change Password</h3>
    <hr>
    <div class="form-group">
        <label for="pwd">New Password:</label>
        <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
    <div class="form-group">
        <label for="repwd">Re-Enter New Password:</label>
        <input type="password" class="form-control" id="repwd">
    </div>

    <button type="submit" class="btn btn-default">Save</button>

</form

<?php
include_once './includes/footer.php';
?>
