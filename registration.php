<?php
include_once './includes/helpers.php';
include_once './includes/global.php';


//post of registration form
if ($_POST) {   
    $u_email = $_POST['email'];
    $u_pwd = $_POST['pwd'];
    $u_pwd = password_hash($u_pwd, PASSWORD_DEFAULT);
    $u_f_name = $_POST['f_name'];
    $u_l_name = $_POST['l_name'];
    $b_day = $_POST['b_day'];
    $u_about = $_POST['about'];
    $u_nickName = $_POST['nickName'];
    
    $b_day = date("Y-m-d",strtotime(str_replace('/','-',$b_day)));

    $sql = "INSERT INTO users (u_email, u_pwd, u_f_name, u_l_name, u_b_day, u_about, u_nickName)
            VALUES ('$u_email', '$u_pwd', '$u_f_name', '$u_l_name', '$b_day', '$u_about', '$u_nickName')";


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
redirect('index.php');