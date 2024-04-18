<?php
include('parts/menu.php');
if (isset($_SESSION['id']) == null)
 {
    header('Location:login.php');
}
?>


    <!-- coffee SEARCH Section Starts Here -->
    <section class="coffee-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>coffee-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for coffee.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- coffee sEARCH Section Ends Here -->



    <!-- coffee MEnu Section Starts Here -->
    <section class="coffee-menu">
        <div class="container">
            <h2 class="text-center">Coffee Menu</h2>

            <?php 
                //Display coffees that are Active
                $sql = "SELECT * FROM tbl_coffee WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the coffee are availalable or not
                if($count>0)
                {
                    //coffees Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="coffee-menu-box">
                            <div class="coffee-menu-img">
                                <?php 
                                    //CHeck whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/coffee/<?php echo $image_name; ?>" alt="hot" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="coffee-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="coffee-price">&#8377;<?php echo $price; ?></p>
                                <p class="coffee-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?coffee_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //coffee not Available
                    echo "<div class='error'>coffee not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- coffee Menu Section Ends Here -->

    <?php include('parts/footer.php'); ?>