<?php include('parts/menu.php'); ?>


<section class="coffee-search">
    <div class="container">

        <h2 class="text-center text-white">Sign Up</h2>

        <form action="" method="POST" class="order" style="border:2px solid black; background-color: silver ; width: 400px;"><br><br>

           
     
                      
            <fieldset >
                <legend style="color:black; font-style: Bold;">Sign up Details</legend>
      
        <center>                <div class="order-label">Name</div>
                <input type="text" name="name" class="input-responsive" required style="border-radius: 40px; width: 210px;">

                <div class="order-label">Email</div>
                <input type="email" name="email"  class="input-responsive" required style="border-radius: 40px; width: 210px;">

                <div class="order-label">Password</div>
                <input type="password" name="password"  class="input-responsive" required style="border-radius: 40px; width: 210px;">
                <div>
                <input type="submit" name="signup" value="SIGN UP" class="btn btn-primary"><br><br>
                </div>

                 <div class="panel-footer"> You have already account ? <a href="login.php" style="color:darkred;"><span>Login</span></a></div>
        </center>

            </fieldset>
            
                  

        </form>

        <?php

        //CHeck whether submit button is clicked or not
        if (isset($_POST['signup'])) {
            // Get all the details from the form

            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $iquery = "INSERT INTO user VALUES(NULL,'$name','$email','$pass')";

            echo $iquery;
            if(mysqli_query($conn,$iquery)){
                echo '<script>alert("Account created successfully");</script>';
                echo '<script>window.location.href = "login.php";</script>';
            }
            else{
                echo "not inserted";
            }
        }
        ?>

    </div>
</section>

<?php include('parts/footer.php'); ?>