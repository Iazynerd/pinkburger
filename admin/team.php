<?php include 'header.php';
include_once 'check_ip.php';
include_once '../conn_db.php';
if ($_SESSION['state'] != 'admin') {
    header('location:dashboard.php');
}

$stmt = $db->prepare('SELECT * FROM users WHERE state = "staff"');
$stmt->execute();
$staffs = $stmt->fetchAll();

$ajax = 'promote';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $id = $_POST['id'];
    $pro = $db->prepare("UPDATE users SET state = 'admin' WHERE id = '$id'");
    $pro->execute();
}
?>
<main>
    <div class="container">
        <div class="bg-light rounded p-4 food_menu">
            <h1>items</h1>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">promote</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($staffs as $staff){ ?>
                <tr>
                    <th scope="row"><?php echo $staff['id']; ?></th>
                    <td class="text-center align-middle"><?php echo $staff['user_name']; ?></td>
                    <td class="text-center align-middle"><?php echo $staff['email']; ?></td>
                    <td><a href="#0" class="btn mx-1 mt-0 promote" id="<?php echo $staff['id']; ?>" style="background-color: #f507a7">promote</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include 'footer.php';?>

