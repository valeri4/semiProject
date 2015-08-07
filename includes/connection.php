<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_SCHEMA', 'fs_net');
$dbCon = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);
if ($dbCon -> connect_errno) {
    die("Connection failed. Reason:".$dbCon -> connect_error);
}
?>