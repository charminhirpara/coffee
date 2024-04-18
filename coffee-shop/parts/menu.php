<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop </title>

    <!-- Link our CSS file -->

      <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                  <img src="images/logo.png" alt="cafe Logo" style=" width:160px; height: 55px;">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                  
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Menu</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>coffee.php">Coffee</a>
                    </li>
                                        <?php
                    // session_start();
                    if (isset($_SESSION['id']) != NULL) {
                    ?>
                        <li>
                            <a href="<?php echo SITEURL; ?>orderinfo.php">Order</a>
                        </li>
                        <li>
                            <a href="<?php echo SITEURL; ?>logout.php">Logout</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li>
                            <a href="<?php echo SITEURL; ?>Signup.php">Sign Up</a>
                        </li>
                        <li>
                            <a href="<?php echo SITEURL; ?>login.php">Login</a>
                        </li>
                    <?php
                    }
                    ?>

                   <!--  <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->