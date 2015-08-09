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

function userName(){
    $userFname = $_SESSION['loggedUser']['u_f_name'];
    $userLname = $_SESSION['loggedUser']['u_l_name'];
   echo $userFname." ".$userLname;
}

