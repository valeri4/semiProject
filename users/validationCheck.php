<?php

include_once '../includes/global.php';


if (filter_input_array(INPUT_POST)) {

    
    //Username Validation Ajax query from login.php
    $u_nickName = filter_input(INPUT_POST, 'username');
    $u_email = filter_input(INPUT_POST, 'email');

    if ($u_nickName) {

        $u_nickName = $dbCon->real_escape_string($u_nickName);
        $sql = "SELECT u_nickName FROM users WHERE u_nickName ='$u_nickName' LIMIT 1";
        $result = $dbCon->query($sql);
        if (!$result) {
            die('Query failed: ' . $dbCon->error);
        }

        $response = $result->fetch_assoc();


        $isAvailable = false;

        if (!$response) {
            $isAvailable = true;
        }

        echo json_encode(array(
            'valid' => $isAvailable,
        ));
    }

    //Email Validation Ajax query from login.php
    if ($u_email) {
        
        $u_email = $dbCon->real_escape_string($u_email);
        $sql = "SELECT u_email FROM users WHERE u_email ='$u_email' LIMIT 1";
        $result = $dbCon->query($sql);
        if (!$result) {
            die('Query failed: ' . $dbCon->error);
        }

        $response = $result->fetch_assoc();


        $isAvailable = false;

        if (!$response) {
            $isAvailable = true;
        }

        echo json_encode(array(
            'valid' => $isAvailable,
        ));
    }
}