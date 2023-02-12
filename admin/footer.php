<?php
$ser = $_SERVER['SCRIPT_FILENAME'];
if(strpos($ser, 'footer.php') !== false){
    header("Location: index.php");
    exit();
}
?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <a href="index.php" style="color: #f507a7"><img src="../assests/img/logo.png" width="125px" alt=""><br>Pink Burger</a><br/><small>&copy; All Rights Reserved.</small>
            </div>
        </div>
    </div>
</footer>
<script src="../inc/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<?php
if(isset($ajax) && $ajax == 'delete'){
 echo '<script src="inc/js/ajax/delete.js"></script>';
}
if(isset($ajax) && $ajax == 'update'){
    echo '<script src="inc/js/ajax/order_update.js"></script>';
}
if(isset($ajax) && $ajax == 'promote'){
    echo '<script src="inc/js/ajax/promote.js"></script>';
}
?>
</body>
</html>
