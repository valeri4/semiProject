<?php
ob_start();

date_default_timezone_set('Asia/Jerusalem');

header('Content-Type: text/html; charset=utf-8');

session_start();

include_once 'includes/helpers.php';
include_once 'includes/connection.php';
?>