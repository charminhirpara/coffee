    <?php include('parts/menu.php'); ?>
                 
    <!-- coffee sEARCH Section Starts Here -->
    <section class="coffee-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>coffee-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Coffee.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- coffee sEARCH Section Ends Here -->

    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Coffee Menu</h2>

            <?php 
                //Create SQL Query to Display CAtegories from Database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-coffee.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Coffee" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->



    <!-- coffee MEnu Section Starts Here -->
    <section class="coffee-menu">
        <div class="container">
            <h2 class="text-center">Coffee</h2>

            <?php 
            
            //Getting coffees from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_coffee WHERE active='Yes' AND featured='Yes' LIMIT 4 ";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether coffee available or not
            if($count2>0)
            {
                // coffee Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="coffee-menu-box">
                        <div class="coffee-menu-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                  //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/coffee/<?php echo $image_name; ?>" alt="Coffee" class="img-responsive img-curve">
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
                // coffee Not Available 
                echo "<div class='error'>Coffee not available.</div>";
            }
            
            ?>

            

 

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center" >
            <a href="coffee.php" style="color: black; font-style: bold; font-size: 20px;">See All Coffee</a>
        </p>
    </section>
    <!-- coffee Menu Section Ends Here -->
   
    <?php include('parts/footer.php'); ?>