<?php

include_once '../includes/global.php';
include_once '../includes/auth.php';

if (filter_input_array(INPUT_POST)) {
    $searchQuery = filter_input(INPUT_POST, 'q');

    $test = 'hello';
    
    $test2 = 'No Matches';
    

    
    if($searchQuery == $test){
        echo json_encode(array($test));
    }else{
        echo json_encode($test2);
    }   
}




