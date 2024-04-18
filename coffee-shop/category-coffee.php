    
    <?php include('parts/menu.php'); ?>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>


    <!-- coffee sEARCH Section Starts Here -->
    <section class="coffee-search text-center">
        <div class="container" style="font-style: italic; color: blue;">
            
            <h2> <a href="#" class="text-white"><?php echo $category_title; ?></a></h2>

        </div>
    </section>
    <!-- coffee sEARCH Section Ends Here -->



    <!-- coffee MEnu Section Starts Here -->
    <section class="coffee-menu">
        <div class="container">
            <h2 class="text-center">Coffee Menu</h2>

            <?php 
            
                //Create SQL Query to Get coffees based on Selected CAtegory
                $sql2 = "SELECT * FROM tbl_coffee WHERE category_id=$category_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether coffee is available or not
                if($count2>0)
                {
                    //coffee is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="coffee-menu-box">
                            <div class="coffee-menu-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/coffee/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
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
                    //coffee not available
                    echo "<div class='error'>coffee not Available.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- coffee Menu Section Ends Here -->

    <?php include('parts/footer.php'); ?>