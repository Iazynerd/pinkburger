<?php include_once 'conn_db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $id = $_POST['id'];
    $state = $_POST['state'];
    $stmt = $db->prepare("UPDATE users SET state = '$state' WHERE id = '$id'");
    $stmt->execute();
}
