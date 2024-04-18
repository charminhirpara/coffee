<?php include('parts/menu.php'); ?>


<section class="coffee-search">
    <div class="container">

        <h2 class="text-center text-white">Login</h2>

        <form action="" method="POST" class="order" style="border:2px solid black; background-color: silver ; width: 400px;">

            <fieldset>
                <legend>Login Details</legend>
<center>
                <div class="order-label">Email</div>
                <input type="email" name="email" class="input-responsive" required style="border-radius: 40px; width: 210px;">

                <div class="order-label">Password</div>
                <input type="password" name="password" class="input-responsive" required style="border-radius: 40px; width: 210px;">

                 <div>
                <input type="submit" name="login" value="LOGIN" class="btn btn-primary"><br><br>
                </div>

                 <div class="panel-footer"> Don't have an account yet? <a href="Signup.php" style="color:darkred;"><span>Sign Up</span></a></div>
</center>
            </fieldset>

        </form>

        <?php

        //CHeck whether submit button is clicked or not
        if (isset($_POST['login'])) {
            // Get all the details from the form

            $email = $_POST['email'];
            $pass = $_POST['password'];

            $squery = "SELECT * FROM user WHERE email='$email' AND password='$pass'";

            $result = mysqli_query($conn, $squery);
            if (mysqli_num_rows($result) == 1) 
            {
                $data = mysqli_fetch_assoc($result);
                $id = $data['id'];
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                header("Location:index.php");
            } 
            else {
                echo '<script>alert("Email and password incorrect")</script>';
                echo '<script>window.location.href = "login.php";</script>';
            }
        }
        ?>

    </div>
</section>

<?php include('parts/footer.php'); ?>