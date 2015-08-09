<?php

include_once '../includes/global.php';


//post of registration form
if (filter_input_array(INPUT_POST)) {

    $u_nickName = trim(filter_input(INPUT_POST, 'username'));
    $u_f_name = filter_input(INPUT_POST, 'firstName');
    $u_l_name = filter_input(INPUT_POST, 'lastName');
    $u_email = trim(filter_input(INPUT_POST, 'email'));
    $u_pwd = trim(filter_input(INPUT_POST, 'password'));
    $u_pwd = password_hash($u_pwd, PASSWORD_DEFAULT);
    $b_day = filter_input(INPUT_POST, 'date');
    $u_gender = filter_input(INPUT_POST, 'gender');
    
    if($u_gender == "male"){
        $u_gender = 1;
    }else{
        $u_gender = 0;
    }
    
    $b_day = date("Y-m-d", strtotime(str_replace('/', '-', $b_day)));
    
    
    $u_email = $dbCon->real_escape_string($u_email);
    $u_pwd = $dbCon->real_escape_string($u_pwd);
    $u_f_name = $dbCon->real_escape_string($u_f_name);
    $u_l_name = $dbCon->real_escape_string($u_l_name);
    $b_day = $dbCon->real_escape_string($b_day);
    $u_gender = $dbCon->real_escape_string($u_gender);
    $u_nickName = $dbCon->real_escape_string($u_nickName);
    

    $sql = "INSERT INTO users (u_email, u_pwd, u_f_name, u_l_name, u_b_day, u_gender, u_nickName)
            VALUES ('$u_email', '$u_pwd', '$u_f_name', '$u_l_name', '$b_day', '$u_gender', '$u_nickName')";


    $result = $dbCon->query($sql);
    if (!$result) {
        die('Query failed : ' . $dbCon->error);
    }
    $lastId = $dbCon->insert_id;

    //get userArr for session by user id
    $sql = "SELECT * FROM users 
                        WHERE u_id ='$lastId' LIMIT 1";
    $result = $dbCon->query($sql);
    if (!$result) {
        die('Query failed: ' . $dbCon->error);
    }

    $userArr = $result->fetch_assoc();

    //if registration successfully user logged in  
    login($userArr, $lastId);
}

//without Post -> redirect to index
redirect('../index.php');
