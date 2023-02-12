<?php
function is_logout(){
    if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
        header("Location:index.php");
    }
}
function is_login(){
    if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
        header("Location:dashboard.php");
    }
}
