<?php
$ser = $_SERVER['SCRIPT_FILENAME'];
if(strpos($ser, 'conn_db.php') !== false){
    header("Location: index.php");
    exit();
}

define('DB_HOST', 'localhost');
define('DB_NAME', 'pink_burger');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
try {
    $db = new PDO(
        "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
        DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $ex) {
    die($ex->getMessage());
}
