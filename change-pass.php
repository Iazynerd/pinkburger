<?php include'header.php';
include_once 'conn_db.php';
$id = $_SESSION['id'];
$stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
$stmt->bindParam(":id",$id);
$stmt->execute();
$data = $stmt->fetch();
if($_SERVER['REQUEST_METHOD']==='POST'){
    $old_pass = $_POST['oldpassword'];
    $new_pass = $_POST['newpassword'];
if(password_verify($old_pass,$data['password'])){
   $pass = password_hash($new_pass, PASSWORD_BCRYPT);
   $update = $db->prepare('UPDATE users SET password = :pass WHERE id = :id');
   $update->bindParam(':pass',$pass);
   $update->bindParam(':id',$id);
   if($update->execute()){
       echo '<script>alert("password updated")</script>';
   }else{
       echo '<script>alert("there is an error")</script>';
   }
}else{
    echo '<script>alert("Wrong password")</script>';
}
}
?>
<main>
    <div class="container">
        <div class="bg-light rounded p-4 food_menu">
            <h1>change password</h1>
            <hr>
            <form action="" method="post">
                <div class="form-group">
                    <label for="oldpasword">old password</label>
                    <input type="password" class="form-control form-control-sm in" required id="oldpasword" name="oldpassword" placeholder="Enter your old password">
                </div>
                <div class="form-group">
                    <label for="newpassword">new password</label>
                    <input type="password" class="form-control form-control-sm in" required id="newpassword" name="newpassword" placeholder="Enter your new password">
                </div>
                <button type="submit" name="submit" class="btn save" style="background-color: #f507a7">save</button>
            </form>
        </div>
    </div>
    </div>
</main>
<?php include 'footer.php';?>
