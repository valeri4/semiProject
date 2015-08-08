<?php

include_once './includes/global.php';


if ($_GET) {

    @$u_email = $_GET["email"];


    $sql = "SELECT * FROM users 
                        WHERE u_email ='$u_email' LIMIT 1";
    $result = $dbCon->query($sql);
    if (!$result) {
        die('Query failed: ' . $dbCon->error);
    }

     $result->fetch_assoc();

    echo $result->num_rows;
}