<?php include'header.php'; include_once 'conn_db.php';
$sandwishs = $db->query('SELECT * FROM food_menu WHERE category = 1');
$grills = $db->query('SELECT * FROM food_menu WHERE category = 2');
$salads = $db->query('SELECT * FROM food_menu WHERE category = 3');
$drinks = $db->query('SELECT * FROM food_menu WHERE category = 4');


?>
    <main>
        <div class="container">
            <div class="bg-light rounded p-4 food_menu" id="list">
                <h1 class="text-center d-inline-block">Menu</h1>
                <input class="form-control w-25 float-right" type="search" placeholder="Search" aria-label="Search" id="searchInput">
                <hr>
                <div class="text-center">
                    <h2>sandwishes</h2>
                </div>
                <div class="row">
                    <?php
                    foreach ($sandwishs as $sandwish){
                    ?>
                    <a href="#0" class="text-dark col-md-6 border js-cd-add-to-cart" id="_<?php echo $sandwish['id']; ?>" data-price="<?php echo $sandwish['price']; ?>" data-id="<?php echo $sandwish['id']; ?>" data-name="<?php echo $sandwish['food_name']; ?>">
                        <div>
                        <h4 class="ml-1 mt-1"><?php echo $sandwish['food_name']; ?></h4>
                        <div class="row">
                            <p class="w-75 col-md-5 m-4 descrip"><?php echo $sandwish['descrip']; ?></p>
                            <p class="text-right col-md-5"><?php echo $sandwish['price']; ?> BD</p>
                        </div>
                        </div>
                    </a>
                        <?php }?>
                </div>

                <hr>
                <div class="text-center"><h2>grills</h2></div>
                <div class="row">
                    <?php
                    foreach ($grills as $grill){
                        ?>
                        <a href="#0" class="text-dark col-md-6 border js-cd-add-to-cart" id="_<?php echo $grill['id']; ?>" data-price="<?php echo $grill['price']; ?>" data-id="<?php echo $grill['id']; ?>" data-name="<?php echo $grill['food_name']; ?>">
                            <div>
                                <h4 class="ml-1 mt-1"><?php echo $grill['food_name']; ?></h4>
                                <div class="row">
                                    <p class="w-75 m-4 col-md-5 descrip"><?php echo $grill['descrip']; ?></p>
                                    <p class="text-right col-md-5"><?php echo $grill['price']; ?> BD</p>
                                </div>
                            </div>
                        </a>
                    <?php }?>
                </div>
                <hr>
                <div class="text-center"><h2>salads</h2></div>
                <div class="row">
                    <?php
                    foreach ($salads as $salad){
                        ?>
                        <a href="#0" class="text-dark col-md-6 border js-cd-add-to-cart" id="_<?php echo $salad['id']; ?>" data-price="<?php echo $salad['price']; ?>" data-id="<?php echo $salad['id']; ?>" data-name="<?php echo $salad['food_name']; ?>">
                            <div>
                                <h4 class="ml-1 mt-1"><?php echo $salad['food_name']; ?></h4>
                                <div class="row">
                                    <p class="w-75 m-4 col-md-5 descrip"><?php echo $salad['descrip']; ?></p>
                                    <p class="text-right col-md-5"><?php echo $salad['price']; ?> BD</p>
                                </div>
                            </div>
                        </a>
                    <?php }?>
                </div>
                <hr>
                <div class="text-center"><h2>drinks</h2></div>
                <div class="row">
                    <?php
                    foreach ($drinks as $drink){
                        ?>
                        <a href="#0" class="text-dark col-md-6 border js-cd-add-to-cart" id="_<?php echo $drink['id']; ?>" data-price="<?php echo $drink['price']; ?>" data-id="<?php echo $drink['id']; ?>" data-name="<?php echo $drink['food_name']; ?>">
                            <div>
                                <h4 class="ml-1 mt-1"><?php echo $drink['food_name']; ?></h4>
                                <div class="row">
                                    <p class="w-75 m-4 col-md-5 descrip"><?php echo $drink['descrip']; ?></p>
                                    <p class="text-right col-md-5"><?php echo $drink['price']; ?> BD</p>
                                </div>
                            </div>
                        </a>
                    <?php }?>
                </div>
                </div>
            </div>

    </main>

    <div class="cd-cart cd-cart--empty js-cd-cart">
        <a href="#0" class="cd-cart__trigger text-replace">
            .
            <ul class="cd-cart__count"> <!-- cart items count -->
                <li>0</li>
                <li>0</li>
            </ul> <!-- .cd-cart__count -->
        </a>

        <div class="cd-cart__content">
            <div class="cd-cart__layout">
                <header class="cd-cart__header">
                    <h2>Cart</h2>
                    <span class="cd-cart__undo">Item removed. <a href="#0">Undo</a></span>
                </header>

                <div class="cd-cart__body">
                    <ul id="ul">
                        <!-- products added to the cart will be inserted here using JavaScript -->
                    </ul>
                </div>

                <footer class="cd-cart__footer">
                    <a href="#0" class="cd-cart__checkout" onclick="checkout()">
                        <em>Checkout - BD<span id="total-price">0</span>
                            <svg class="icon icon--sm" viewBox="0 0 24 24"><g fill="none" stroke="currentColor"><line stroke-width="2" stroke-linecap="round" stroke-linejoin="round" x1="3" y1="12" x2="21" y2="12"/><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="15,6 21,12 15,18 "/></g>
                            </svg>
                        </em>
                    </a>
                </footer>
            </div>
        </div> <!-- .cd-cart__content -->
    </div> <!-- cd-cart -->
    <form action="checkout.php" hidden id="checkout" method="post">

    </form>
    <script>
        function checkout(){
                var total = document.getElementById('total-price').innerHTML;
                console.log(total);
                var child = document.getElementById('ul').childElementCount;
                for (let i = 0; i < child; i++) {
                   var item = document.getElementById('ul').getElementsByTagName('li')[i].getElementsByTagName('h3')[0].innerHTML;
                   console.log(item);
                    var x = document.createElement("INPUT");
                    x.setAttribute("type", "text");
                    x.setAttribute("value", item);
                    x.setAttribute("name", "item_" + i);
                    document.getElementById('checkout').appendChild(x);
                }
            var y = document.createElement("INPUT");
            y.setAttribute("type", "text");
            y.setAttribute("value", total);
            y.setAttribute("name", 'total_price');
            document.getElementById('checkout').appendChild(y);
            document.getElementById("checkout").submit();
        }
    </script>

<?php
if($_SERVER['REQUEST_METHOD']==='GET') {
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $food = $db->prepare("SELECT products FROM orders WHERE id = '$id' ");
    $food->execute();
    $json = $food->fetch();
    $jds = json_decode($json['products'], true);
    foreach ($jds as $js){
        ?>
        <script>
            console.log(<?php print_r($js['product_id']); ?>);
            var id = <?php print_r($js['product_id']); ?>;
            setTimeout(function (){
                document.getElementById('_' + id).click();
            }, 2000);
        </script>
    <?php }
    }
}
?>
<?php include 'footer.php';?>

