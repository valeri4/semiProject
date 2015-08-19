<?php

include_once '../includes/global.php';

if (filter_input_array(INPUT_POST)) {
    $searchQuery = filter_input(INPUT_POST, 'q');

    $sql = "SELECT * FROM users WHERE u_f_name LIKE '%$searchQuery%' OR u_l_name LIKE '%$searchQuery%' ";

    $result = $dbCon->query($sql);
    if (!$result) {
        die('Query failed : ' . $dbCon->error);
    }

    $userArr = $result->fetch_assoc();
    
    $noResult = 'No result'; 
    
    $userResult = $userArr['u_f_name']." ".$userArr['u_l_name'];
    
    
    //If userSearch is logened user => No Result!
    if($userArr['u_id'] == $_SESSION['u_id']){
        $userArr = NULL;
    }
    
    
    if(!$userArr){
        echo json_encode(array($noResult));
    }else{
        echo json_encode(array($userResult));
    }   
}




