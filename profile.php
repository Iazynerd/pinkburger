<?php include'header.php';
include_once 'conn_db.php';
$id = $_SESSION['id'];
$stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
$stmt->bindParam(":id",$id);
$stmt->execute();
$data = $stmt->fetch();

if($_SERVER['REQUEST_METHOD']==='POST'){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $user_name = $_POST['username'];
    $user_nameExp = '/[A-Za-z0-9@_.!-]/';
    if(isset($_POST['address'])){
        $address = $_POST['address'];
    }else{
        $address = NULL;
    }
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
    }else{
        $phone = NULL;
    }
    if(preg_match($user_nameExp, $user_name) == 1){
        $stmt = $db->prepare('UPDATE users SET f_name = :fname, l_name = :lname, user_name = :username, address = :address, phone_number = :phone  WHERE id = :id');
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':username', $user_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}


?>
    <main>
        <div class="container">
            <div class="bg-light rounded p-4 food_menu">
                <h1 class="d-inline-block">profile</h1>
                <a href="logout.php" class="btn float-right" style="background-color: #f507a7">log out</a>
                <hr>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">first name</label>
                        <input type="text" class="form-control form-control-sm in" value="<?php echo $data['f_name']?>" required id="firstname" name="firstname" placeholder="Enter your first name">
                    </div>
                    <div class="form-group">
                        <label for="email">Last name</label>
                        <input type="text" class="form-control form-control-sm in" value="<?php echo $data['l_name']?>" required id="lastname" name="lastname" placeholder="Enter your last name">
                    </div>
                    <div class="form-group">
                        <label for="username">User name</label>
                        <input type="text" class="form-control form-control-sm in" value="<?php echo $data['user_name']?>" required id="username" name="username" placeholder="Enter user name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <br>
                        <p><?php echo $data['email']?></p>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <a href="change-pass.php?id=<?php echo $data['id']?>">change password</a>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control form-control-sm in" value="<?php if(isset($data['address'])){echo $data['address'];}?>" id="address" name="address" placeholder="Enter your address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="tel" class="form-control form-control-sm in" value="<?php if(isset($data['phone_number'])){echo $data['phone_number'];}?>" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>
                    <button type="submit" name="submit" class="btn save" style="background-color: #f507a7">save</button>
                </form>
            </div>
        </div>
        </div>
    </main>
    <script>
        function validate() {
            let user_name = document.getElementById('username').value;
            let username_regularExp = /[A-Za-z0-9@_.!-]/;
            if (username_regularExp.test(user_name)) {
                return true;
            }else{
                return false;
            }
        }
    </script>
<?php include 'footer.php';?>