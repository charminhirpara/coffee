
    <?php include('parts/menu.php'); ?>

    <!-- coffee sEARCH Section Starts Here -->
    <section class="coffee-search text-center">
         <!--  <div class="container"> -->
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            ?>
            <h2>Coffees on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <section class="coffee-menu">
            <h2 class="text-center">Coffee Menu</h2>
            <?php 
                $sql = "SELECT * FROM tbl_coffee WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
               //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);
                //Check whether coffee available of not
                if($count>0)
                {
                    //coffee Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="coffee-menu-box">
                            <div class="coffee-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/coffee/<?php echo $image_name; ?>" alt="coffee" class="img-responsive img-curve">
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

                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //coffee Not Available
                    echo "<div class='error'>Coffee not found.</div>";
                }
            
            ?>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- coffee Menu Section Ends Here -->

    <?php include('parts/footer.php'); ?>