<?php include 'header.php'; include_once 'conn_db.php';
if($_SERVER['REQUEST_METHOD']==='POST') {
    if (isset($_SESSION['id'])) {
        $id = $_SESSION["id"];
        $size = $_POST['size'];
        $array = [];
        //$json_ready = '';
        for ($x = 0; $x < $size; $x++) {
            $product = 'product_name'.$x;
            $numbor = $x + 1;
            $item_name = "item_" . $numbor;
            $product_name = $_POST[$product];
            $getId = $db->prepare("SELECT id FROM food_menu WHERE food_name ='$product_name'");
            $getId->execute();
            $proId = $getId->fetch();
            /*if($x == $size-1){
                $array = $array . '{"item_'. $numbor .'":{"product_id":'.$proId['id'].',"quantity":2}';
            }else{
                $array = $array . '{"item_'. $numbor .'":{"product_id":'.$proId['id'].',"quantity":2},';
            }*/
            $array[$item_name] = array('product_id' => $proId['id'], 'quantity' => 1);
        }
        $js = json_encode($array);
        $json_ready = str_replace('"', '\"', $js);
        $total = $_POST['total'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $stmt = $db->prepare("INSERT INTO orders (user_id,products,total_price,state) VALUES (:user,:products,:total,'acknowledge')");
        $stmt->bindParam(':user',$id);
        $stmt->bindParam(':products',$js);
        $stmt->bindParam(':total',$total);
        $stmt->execute();
        $con = $db->prepare("UPDATE users SET address = :address, phone_number = :phone WHERE id = '$id'");
        $con->bindParam(':address',$address);
        $con->bindParam(':phone',$phone);
        $con->execute();
    }
}
?>
<main>
    <div class="container slogan">
    <h1 class="text-center text-light">Order is Confirmed</h1>
    <p class="text-center text-light">Expect your devlivery to reach you soon.</p>
    </div>
</main>
<?php include 'footer.php';?>