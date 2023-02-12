<?php include 'header.php';
include_once 'check_ip.php';
include_once '../conn_db.php';
if ($_SESSION['state'] != 'admin') {
    header('location:dashboard.php');
}else{
    $stmt = $db->prepare('SELECT * FROM food_menu LEFT JOIN category ON food_menu.category = category.id');
    $stmt->execute();
    $items = $stmt->fetchAll();
}
$ajax = 'delete';
?>
    <main>
        <div class="container">
            <div class="bg-light rounded p-4 food_menu">
                <h1>items</h1>
                <a href="add-item.php" class="btn float-right" style="background-color: #f507a7">add item</a>
                <hr>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">category</th>
                        <th scope="col">price</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                        foreach ($items as $item){
                            $id = $item[0];
                            ?>
                            <tr>
                                <th scope="row"><?php echo $id;?></th>
                                <td class="text-center align-middle"><?php echo $item['food_name'];?></td>
                                <td class="text-center align-middle"><?php echo $item['descrip'];?></td>
                                <td class="text-center align-middle"><?php echo $item['categ_name'];?></td>
                                <td class="text-center align-middle"><?php echo $item['price'];?> BD</td>
                                <td><a href="edit_item.php?id=<?php echo $id;?>" class="btn mx-1 my-1" style="background-color: #f507a7">edit</a><a name="food_menu" did="<?php echo $id;?>"  class="btn mx-1 my-1 del" style="background-color: #f507a7">delete</a></td>
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

