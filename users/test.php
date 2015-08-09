<?php

include_once '../includes/global.php'; 

$dir    = '../includes';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

var_dump($files1);
var_dump($files2);
?>