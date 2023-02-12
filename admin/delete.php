<?php
include_once '../conn_db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $id = $_POST['id'];
    $table = $_POST['name'];
    $stmt = $db->prepare("DELETE FROM $table WHERE id='$id'");
    if($stmt->execute()){
        return true;
    }
}