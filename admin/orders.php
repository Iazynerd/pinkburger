<?php include 'header.php';
include_once 'check_ip.php';
include_once '../conn_db.php';
$states = array("acknowledge", "in process", "in transit","complete");
$stmt = $db->prepare('SELECT * FROM orders');
$stmt->execute();
$orders = $stmt->fetchAll();
$ajax = 'update';
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
                    <th scope="col">user_id</th>
                    <th scope="col">products</th>
                    <th scope="col">total_price</th>
                    <th scope="col">time</th>
                    <th scope="col">state</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($orders as $order){
                ?>
                <tr>
                    <th scope="row"><?php echo $order['id']; ?></th>
                    <td class="text-center align-middle"><?php echo $order['user_id']; ?></td>
                    <td class="text-center align-middle"><?php $json = json_decode($order['products']); foreach($json as $data){
                            $jsonid = $data->{'product_id'};
                            $food = $db->prepare("SELECT food_name FROM food_menu WHERE id = '$jsonid' ");
                            $food->execute();
                            $getfood = $food->fetch();
                            echo $data->{'quantity'} . '*' . $getfood[0] . ",";
                        } ?></td>
                    <td class="text-center align-middle"><?php echo $order['total_price']; ?></td>
                    <td class="text-center align-middle"><?php echo $order['time']; ?></td>
                    <td><select name="state" class="state" did="<?php echo $order['id']; ?>">
                            <?php foreach ($states as $state){
                                if($order['state'] == $state){?>
                                    <option value="<?php echo $order['state']; ?>" selected><?php echo $order['state']; ?></option>
                             <?php }else{ ?>
                                    <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                            <?php }
                            }
                            ?>
                        </select></td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include 'footer.php';?>

