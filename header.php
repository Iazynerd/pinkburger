<?php
$ser = $_SERVER['SCRIPT_FILENAME'];
if(strpos($ser, 'header.php') !== false){
    header("Location: index.php");
    exit();
}
ob_start();
session_start();

if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    $account = 'loggedin';
}else{
    $account = 'loggedout';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pink_burger</title>
    <?php if(isset($script)){ echo $script; } ?>
    <link rel="stylesheet" href="assests/css/cart.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="inc/css/style.css">

</head>
<body>
<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <a class="navbar-brand" href="#"><img src="assests/img/logo.png" width="125px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item index">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item menu">
                        <a class="nav-link" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item orders">
                        <a class="nav-link <?php if($account == 'loggedout'){ echo 'disabled';}?>" href="orders.php">orders</a>
                    </li>
                    <li class="nav-item about">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item contact">
                        <a class="nav-link" href="contact.php">Contact-us</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <?php if($account == 'loggedout'){ ?>
                        <a href="login.php" class="btn" style="background-color: #f507a7">signup/login</a>
                    <?php
                        }elseif ($account == 'loggedin'){ ?>
                        <a href="profile.php?id=<?php echo $_SESSION['id'] ?>" class="btn" style="background-color: #f507a7"><?php echo $_SESSION['name'] ?></a>
                    <?php
                    }
                    ?>
                </span>
            </div>
        </nav>
    </header>
</div>
