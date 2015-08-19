<?php

function redirect($location) {
    header('Location: ' . $location);
    die();
}

function vdd($expression) {
    var_dump($expression);
    die();
}

function vd($expression) {
    var_dump($expression);
}

function login($userArr, $userId) {
    $_SESSION['auth'] = true;
    $_SESSION['u_id'] = $userId;
    $_SESSION['timeLogin'] = time();
    $_SESSION['loggedUser'] = $userArr;
    redirect('../index.php');
}

function userId() {
    $uId = $_SESSION['u_id'];
    return ($uId);
}

function userName() {
    $userFname = $_SESSION['loggedUser']['u_f_name'];
    $userLname = $_SESSION['loggedUser']['u_l_name'];
    return ($userFname . " " . $userLname);
}

function dateFormat($userDate) {
    $date = date_create($userDate);
    $bdateview = date_format($date, 'd/m/Y');
    return ($bdateview);
}

//Call this function to update user information in SESSION
function userArrRefresh($dbCon) {
    $uId = userId();
    $sql = "SELECT * FROM users 
                        WHERE u_id ='$uId' LIMIT 1";
    $result = $dbCon->query($sql);
    if (!$result) {
        die('Query failed: ' . $dbCon->error);
    }
    $userArr = $result->fetch_assoc();

    $_SESSION['loggedUser'] = $userArr;
}


function checkIFfriendORloggedUser(){
    
}