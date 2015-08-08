<?php

include_once './includes/global.php';


if ($_POST) {
    
    @$u_nickName = $_POST["username"];
    @$u_email = $_POST["email"];
    
    if ($u_nickName) {
        $sql = "SELECT * FROM users 
                        WHERE u_nickName ='$u_nickName' LIMIT 1";
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
    
    if($u_email){


        $sql = "SELECT * FROM users 
                        WHERE u_email ='$u_email' LIMIT 1";
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