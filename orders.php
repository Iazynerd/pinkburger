<?php include'header.php';
include_once 'conn_db.php';
if($account == 'loggedin'){
$id = $_SESSION['id'];
$stmt = $db->prepare("SELECT * FROM orders WHERE user_id = '$id' " );
$stmt->execute();
$orders = $stmt->fetchAll();
?>
    <main>
        <div class="container">
            <div class="bg-light rounded p-4 food_menu">
                <h1>orders</h1>
                <hr>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">order#</th>
                        <th scope="col">products</th>
                        <th scope="col">total_price</th>
                        <th scope="col">time</th>
                        <th scope="col">state</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($orders as $order){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $order['id']; ?></th>
                            <td class="text-center align-middle"><?php $json = json_decode($order['products']); foreach($json as $data){
                                    $jsonid = $data->{'product_id'};
                                    $food = $db->prepare("SELECT food_name FROM food_menu WHERE id = '$jsonid' ");
                                    $food->execute();
                                    $getfood = $food->fetch();
                                    echo $data->{'quantity'} . '*' . $getfood[0] . ",";
                                } ?></td>
                            <td class="text-center align-middle"><?php echo $order['total_price']; ?></td>
                            <td class="text-center align-middle"><?php echo $order['time']; ?></td>
                            <td class="text-center align-middle"><?php echo $order['state']; ?></td>
                            <td>
                                <a href="menu.php?id=<?php echo $order['id'];?>" class="btn mx-1 my-1" style="background-color: #f507a7">edit and reorder</a>
                                <a href="reorder.php?id=<?php echo $order['id'];?>&state=reorder"  class="btn mx-1 my-1 del" style="background-color: #f507a7">reorder</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php
}else{
    header("Location:login.php");
}
    include 'footer.php';?>