<?php
include_once './includes/global.php';
include_once 'includes/auth.php';
include_once './includes/header.php';


//get userInfo from db and print into fields
$uId = userId();

$sql = "SELECT * FROM users 
                        WHERE u_id ='$uId' LIMIT 1";
$result = $dbCon->query($sql);

if (!$result) {
    die('Query failed: ' . $dbCon->error);
}

$userArr = $result->fetch_assoc();

//Custom Function in helpers.php
$bdateview = dateFormat($userArr['u_b_day']);

$male_status = 'unchecked';
$female_status = 'unchecked';

if ($userArr['u_gender']) {
    $male_status = "checked";
} else {
    $female_status = "checked";
}


//update userInfo
if (filter_input_array(INPUT_POST)) {

    //Check if birthday updated
    $b_day = trim(filter_input(INPUT_POST, 'date'));
    //If date was changed 
    if ($b_day != $bdateview) {
        $b_day = date("Y-m-d", strtotime(str_replace('/', '-', $b_day)));
    } else {
        $b_day = $userArr['u_b_day'];
    }

    $u_f_name = trim(filter_input(INPUT_POST, 'firstName'));
    $u_l_name = trim(filter_input(INPUT_POST, 'lastName'));
    $u_about = trim(filter_input(INPUT_POST, 'about'));
    $u_gender = filter_input(INPUT_POST, 'gender');

    //Check if gender was changed
    if ($u_gender == 'male') {
        $u_gender = 1;
    } else if ($u_gender == 'female') {
        $u_gender = 0;
    }


    $u_pwd = trim(filter_input(INPUT_POST, 'password'));

    //if password not changed
    if ($u_pwd == '') {
        $sql = "UPDATE users SET u_f_name='$u_f_name', u_l_name='$u_l_name', u_b_day='$b_day', u_about='$u_about', u_gender='$u_gender' WHERE u_id=$uId ";
    } else {
        $u_pwd = password_hash($u_pwd, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET u_f_name='$u_f_name', u_l_name='$u_l_name', u_b_day='$b_day', u_about='$u_about',u_gender='$u_gender', u_pwd='$u_pwd' WHERE u_id=$uId ";
    }


    $result = $dbCon->query($sql);
    if (!$result) {
        die('Query failed : ' . $dbCon->error);
    }


    //Updating user Information in SESSION
    userArrRefresh($dbCon);

    //Refresh after userInfo updating
    redirect('index.php');
}
?>

<h2>Profile</h2>
<form role="form" method="POST" id="userInfo">
    <div class="form-group ">
        <label for="username">Username: *</label>
        <input type="text" class="form-control" id="username" name="username"
               placeholder="<?= $userArr['u_nickName'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="firstName">First Name:</label>
        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $userArr['u_f_name'] ?>">
    </div>
    <div class="form-group">
        <label for="lastName">Last Name:</label>
        <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $userArr['u_l_name'] ?>">
    </div>
    <div class="form-group">
        <label for="email">Email address: *</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="<?= $userArr['u_email'] ?>"
               readonly>
    </div>
    <div class="form-group">
        <label for="datepicker">Birth date:</label>

        <div class="input-group input-append date" id="datePicker">
            <input type="text" class="form-control" name="date" id="bdayCalendar" value="<?= $bdateview ?>"/>
            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    </div>
    <div class="form-group">
        <label>Gender</label>

        <div class="radio">
            <label>
                <input type="radio" name="gender" value="male" id="gender" <?= $male_status ?>/> Male
            </label>

            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="female" id="gender" <?= $female_status ?>/> Female
                </label>
            </div>
        </div>
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
        <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <div class="form-group">
        <label for="repwd">Re-Enter New Password:</label>
        <input type="password" class="form-control" id="repwd" name="confirmPassword">
    </div>

    <button type="submit" class="btn btn-default">Save</button>

</form>


<?php
include_once './includes/footer.php';
?>
