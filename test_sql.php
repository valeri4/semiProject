<?php

include_once './includes/global.php';

$u_nickName = filter_input(INPUT_GET, 'username');

$u_nickName = $dbCon->real_escape_string($u_nickName);
$sql = ("SELECT u_nickName FROM users WHERE u_nickName = '$u_nickName'");

$result = $dbCon->query($sql);
if (!$result) {
    die('Query failed: ' . $dbCon->error);
}

$response = $result->fetch_assoc();

vd($response);