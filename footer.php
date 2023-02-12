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
            <div class="col-md-8 text-center text-md-left mb-3">
                <a href="index.php" style="color: #f507a7"><img src="assests/img/logo.png" width="125px" alt=""><br>Pink Burger</a><br/><small>&copy; All Rights Reserved.</small>
            </div>

            <div class="col-md-4 align-self-center text-md-right">
                <ul class="list-inline text-center">
                    <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Facebook">
                        <a target="_blank" href="" style="color: #f507a7">
                            <i class="fab fa-facebook fa-2x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Instagram">
                        <a target="_blank" href="https://www.instagram.com/pinkburger.bh/?hl=en" style="color: #f507a7">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Twitter">
                        <a target="_blank" href="" style="color: #f507a7">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Youtube">
                        <a target="_blank" href="" style="color: #f507a7">
                            <i class="fab fa-youtube fa-2x"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="inc/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="inc/js/util.js"></script>
<script src="inc/js/cart.js"></script>
<script>
    $(document).ready(function(){
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#list h4").filter(function() {
                $(this).parents("a:first").toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
</body>
</html>
