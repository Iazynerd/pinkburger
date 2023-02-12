<?php include_once 'conn_db.php';
if($_SERVER['REQUEST_METHOD']==='GET') {
    if($_GET['state'] == 'reorder'){
        $id = $_GET['id'];
        $stmt = $db->prepare("SELECT * FROM orders WHERE id = '$id'");
        $stmt->execute();
        $oldord = $stmt->fetch();
        $user_id = $oldord['user_id'];
        $products = $oldord['products'];
        $total = $oldord['total_price'];
        $go = $db->prepare("INSERT INTO orders (user_id,products,total_price) VALUES (:user,:products,:total)");
        $go->bindParam(':user',$user_id);
        $go->bindParam(':products',$products);
        $go->bindParam(':total',$total);
        $go->execute();
    }
    header('location:confirm.php');
}