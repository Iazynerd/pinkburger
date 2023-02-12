<?php include'header.php'; include_once 'conn_db.php';
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $user_name = $_POST['username'];
        $user_nameExp = '/[A-Za-z0-9@_.!-]/';
        $email = $_POST['email'];
        $emailExp = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
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
        if(preg_match($user_nameExp, $user_name) == 1 && preg_match($emailExp, $email) == 1){
            try {
            $stmt = $db->prepare('INSERT INTO users(id,f_name,l_name,user_name,email,password,state,address,phone_number) VALUES (NULL,:fname,:lname,:username,:email,:password,"user",:address,:phone)');
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':username', $user_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
            if($stmt->execute()){
                $done = 'done';
            }else{
                $done = 'error';
            }
            } catch (Exception $ex) {
                $done = 'dup';
            }
        }else{
            $done = 'error';
        }

    }
?>


    <main>
        <?php if(isset($done) && $done == 'done'){?>
        <div class="alert alert-success container" role="alert" id="error">
            account is done.
        </div>
        <?php
        }elseif (isset($done) && $done == 'error'){?>
            <div class="alert alert-danger container" role="alert" id="error">
                check the user name and email and make sure it's correct.
            </div>
            <?php

        }elseif (isset($done) && $done == 'dup'){?>
            <div class="alert alert-danger container" role="alert" id="error">
                account is already registered.
            </div>
            <?php

        } ?>
        <div class="alert alert-danger container" role="alert" id="error" hidden>
            check the user name and email and make sure it's correct.
        </div>
        <div class="container">
            <div class="bg-light rounded p-4 food_menu">
                <h1 class="text-center">sign up</h1>
                <hr>
                <form action="" method="post" id="sign_form">
                    <div class="form-group">
                        <label for="firstname">First name</label>
                        <input type="text" class="form-control form-control-lg" required id="firstname" name="firstname" placeholder="Enter your first name">
                    </div><div class="form-group">
                        <label for="lastname">Last name</label>
                        <input type="text" class="form-control form-control-lg" required id="lastname" name="lastname" placeholder="Enter your last name">
                    </div>
                    <div class="form-group">
                        <label for="username">User name</label>
                        <input type="text" class="form-control form-control-lg" required id="username" name="username" placeholder="Enter user name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control form-control-lg" required id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-lg" required id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control form-control-lg" id="address" name="address" placeholder="Enter your address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="tel" class="form-control form-control-lg" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="pb-3">
                        <a href="login.php" class="float-right">already have account?</a>
                    </div>
                    <input type="button" onclick="validate()" value="sign-up" class="btn" style="background-color: #f507a7">
                </form>
            </div>
        </div>
    </main>
    <script>
        function validate() {
            let user_name = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let username_regularExp = /[A-Za-z0-9@_.!-]/;
            let email_regularExp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (username_regularExp.test(user_name) && email_regularExp.test(email)) {
                console.log('good');
                document.getElementById('sign_form').submit();
            }else{
                console.log('bad');
                document.getElementById('error').removeAttribute('hidden');
                return false;
            }
        }
    </script>
<?php include 'footer.php';?>