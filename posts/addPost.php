<?php 

include_once '../includes/global.php';

if (filter_input_array(INPUT_POST)) {
    $uId = userId();
    $userPost = filter_input(INPUT_POST, 'userPostText');

    $sql = "INSERT INTO posts (u_id, p_post) VALUES ('$uId','$userPost')";
    $result = $dbCon->query($sql);

    if (!$result) {
        die('Query failed: ' . $dbCon->error);
    }
    
    $postReturn = array('userName' =>userName(), 'userPostText' =>$userPost, 'dateTime' => date("H:i d/m/y"));
    
    echo json_encode($postReturn);  
}