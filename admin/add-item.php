<?php include'header.php'; include_once '../conn_db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $fname = $_POST['foodname'];
    $descrip = $_POST['descrip'];
    $categ = $_POST['categ'];
    $price = $_POST['price'];

        $stmt = $db->prepare('INSERT INTO food_menu (food_name,descrip,category,price) values (:fname,:descrip,:categ,:price)');
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':descrip', $descrip);
        $stmt->bindParam(':username', $categ);
        $stmt->bindParam(':price', $price);
        $stmt->execute();

}
?>
<main>
    <div class="container">
        <div class="bg-light rounded p-4 food_menu">
            <h1 class="text-center">add item</h1>
            <hr>
            <form action="" method="post">
                <div class="form-group">
                    <label for="foodname">food name</label>
                    <input type="text" class="form-control form-control-lg" required id="foodname" name="foodname" placeholder="Enter food name">
                </div><div class="form-group">
                    <label for="descrip">description</label>
                    <input type="text" class="form-control form-control-lg" required id="descrip" name="descrip" placeholder="Enter food description">
                </div>
                <div class="form-group">
                    <label for="username">category</label>
                    <input type="text" class="form-control form-control-lg" required id="username" name="username" placeholder="Enter user name">
                    <select name="category" id="category">
                        <option value="1">sandwishes</option>
                        <option value="2">grill</option>
                        <option value="3">salads</option>
                        <option value="4">drinks</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">price</label>
                    <input type="text" class="form-control form-control-lg" required id="price" name="price" placeholder="Enter item price">
                </div>
                <input type="submit" value="add item" class="btn" style="background-color: #f507a7">
            </form>
        </div>
    </div>
</main>
<?php include 'footer.php';?>
