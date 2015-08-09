<?php

include_once '../includes/global.php';

if (filter_input_array(INPUT_POST)) {

    $u_email = trim(filter_input(INPUT_POST, 'email_login'));
    $u_pwd = trim(filter_input(INPUT_POST, 'pwd_login'));

    $u_email = $dbCon->real_escape_string($u_email);

    $sql = "SELECT * FROM users 
                        WHERE u_email ='$u_email' LIMIT 1";
    $result = $dbCon->query($sql);
    if (!$result) {
        die('Query failed: ' . $dbCon->error);
    }

    $userArr = $result->fetch_assoc();

    if ($userArr == NULL) {
        echo 'email';
        die();
    }

    if (password_verify($u_pwd, $userArr['u_pwd'])) {
        $_SESSION['auth'] = true;
        $_SESSION['u_id'] = $userArr['u_id'];
        $_SESSION['timeLogin'] = time();
        $_SESSION['loggedUser'] = $userArr;
        
        echo 'true';
    } else {
        echo 'password';
        die();
    }
}

