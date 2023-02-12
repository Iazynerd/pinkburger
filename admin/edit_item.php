<?php include 'header.php';
include_once 'check_ip.php';
include_once '../conn_db.php';
if ($_SESSION['state'] != 'admin') {
    header('location:dashboard.php');
}else{
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $id = $_GET['id'];
        $stmt = $db->prepare("SELECT * FROM food_menu WHERE id = '$id'");
        $stmt->execute();
        $item = $stmt->fetch();
        $stmtt = $db->prepare('SELECT * FROM category');
        $stmtt->execute();
        $categs = $stmtt->fetchAll();
        ?>
    <main>
        <div class="container">
            <div class="bg-light rounded p-4 food_menu">
                <h1>edit item</h1>
                <hr>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="food_name">item name</label>
                        <input type="text" class="form-control form-control-sm in" value="<?php echo $item['food_name']?>" required id="food_name" name="food_name">
                    </div>
                    <div class="form-group">
                        <label for="descrip">descrip</label>
                        <input type="text" class="form-control form-control-sm in" value="<?php echo $item['descrip']?>" id="descrip" name="descrip">
                    </div>
                    <div class="form-group">
                        <label for="category">category</label>
                        <select class="form-select" name="categ">
                            <?php foreach ($categs as $categ){ ?>
                            <option <?php if($categ['id'] == $item['category']){ echo 'selected'; }?> value="<?php echo $categ['id']; ?>"><?php echo $categ['categ_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="text" class="form-control form-control-sm in" value="<?php echo $item['price']?>" required id="price" name="price">
                    </div>
                    <button type="submit" name="submit" class="btn save" style="background-color: #f507a7">save</button>
                </form>
            </div>
        </div>
    </main>
        <?php
            }elseif ($_SERVER['REQUEST_METHOD']==='POST'){
                $id = $_GET['id'];
                $name = $_POST['food_name'];
                $descrip = $_POST['descrip'];
                $category = $_POST['categ'];
                $price = $_POST['price'];
                $update = $db->prepare("UPDATE food_menu SET food_name = :name,descrip = :descrip, category = :categ, price = :price WHERE id = '$id'");
                $update->bindParam(':name',$name);
                $update->bindParam(':descrip',$descrip);
                $update->bindParam(':categ',$category);
                $update->bindParam(':price',$price);
                $update->execute();
            }
        }
        ?>
<?php include 'footer.php';?>