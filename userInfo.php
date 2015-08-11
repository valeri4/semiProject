<?php
include_once './includes/global.php';
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
<form role="form">
    <div class="form-group ">
        <label for="username">Username: *</label>
        <input type="text" class="form-control" id="username" name="username" readonly>
    </div>
    <div class="form-group">
        <label for="firstName">First Name:</label>
        <input type="text" class="form-control" id="firstName" name="firstName">
    </div>
    <div class="form-group">
        <label for="lastName">Last Name:</label>
        <input type="text" class="form-control" id="lastName" name="lastName">
    </div>
    <div class="form-group">
        <label for="email">Email address: *</label>
        <input type="email" class="form-control" id="email" name="email" readonly>
    </div>
    <div class="form-group">
        <label for="datepicker">Birth date:</label>
        <div class="input-group input-append date" id="datePicker">
            <input type="text" class="form-control" name="date" />
            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>  
    </div>
    <div class="form-group">
        <label>Gender</label>
        <div class="radio">
            <label>
                <input type="radio" name="gender" value="male" id="gender" readonly/> Male
            </label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="female" id="gender" readonly/> Female
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="about">About myself:</label>
        <textarea class="form-control" rows="5" id="about" name="about"><?= $userArr['u_about'] ?>
        </textarea>
    </div>
</form>
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
