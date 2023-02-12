<?php include 'header.php'; include_once 'conn_db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_SESSION['id'])){
    $size = count($_POST) - 1;
    $id = $_SESSION["id"];
    $stmt = $db->prepare("SELECT * FROM users WHERE id = '$id'");
    $stmt->execute();
    $data = $stmt->fetch();
        ?>

<main>
    <div class="container">
        <div class="bg-light rounded p-4 food_menu">
            <h1 class="text-center">checkout</h1>
            <hr>
            <form action="confirm.php" method="post">
                <input type="number" hidden value="<?php echo $size ?>" name="size">
                <?php for ($x = 0; $x < $size; $x++) { ?>
                <div class="form-group">
                    <h2><?php echo $_POST['item_'.$x]; ?></h2>
                    <input type="text" hidden value="<?php echo $_POST['item_'.$x]; ?>" name="product_name<?php echo $x;?>">
                </div>
                <?php } ?>
                <div class="form-group">
                    <h2>delivery fees: 0.5 BD</h2>
                </div>
                <div class="form-group">
                    <h2>total: <?php echo $_POST['total_price'] + 0.5;  ?> BD</h2>
                    <input type="text" hidden value="<?php echo $_POST['total_price'] + 0.5;  ?>" name="total">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control form-control-lg" id="address" value="<?php echo $data['address'];?>" required name="address" placeholder="Enter your address">
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="tel" class="form-control form-control-lg" id="phone" required value="<?php echo $data['phone_number']; ?>" name="phone" placeholder="Enter your phone number">
                </div>
                <input type="submit" class="btn" value="confirm" style="background-color: #f507a7">
            </form>
        </div>
    </div>
</main>
<?php
}else{
        header('location:login.php');
    }
}
?>
<?include 'footer.php';?>
