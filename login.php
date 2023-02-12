<?php include'header.php';
include_once 'conn_db.php';
include 'admin/log_session.php';
is_login();
if($_SERVER['REQUEST_METHOD']==='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $stmt=$db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $user = $stmt->fetch();
        if(password_verify($password,$user['password'])){
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $user['id'];
            $_SESSION['name']=$user['user_name'];
            header("location:index.php");
        }else{
            echo 'wrong email or password';
        }
    }
}
?>
    <main>
        <div class="container">
            <div class="bg-light rounded p-4 food_menu">
                <h1 class="text-center">login</h1>
                <hr>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="pb-3">
                        <a href="sign_up.php" class="float-right">don't have account?</a>
                    </div>
                    <button type="submit" class="btn" style="background-color: #f507a7">login</button>
                </form>
            </div>
        </div>
    </main>
<?php include 'footer.php';?>