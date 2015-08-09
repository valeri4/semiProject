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
        login($userArr, $userArr['u_id']);
    } else {
        echo $u_pwd;
        die();
    }
}

