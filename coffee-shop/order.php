<?php
include('parts/menu.php');
if (isset($_SESSION['id']) == null)
 {
    header('Location:login.php');
}
?>


    <?php 
        //CHeck whether coffee id is set or not
        if(isset($_GET['coffee_id']))
        {
            //Get the coffee id and details of the selected coffee
            $coffee_id = $_GET['coffee_id'];

            //Get the DEtails of the SElected coffee
            $sql = "SELECT * FROM tbl_coffee WHERE id=$coffee_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //coffee not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>

    <!-- coffee sEARCH Section Starts Here -->
    <section class="coffee-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Coffee</legend>

                    <div class="coffee-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/coffee/<?php echo $image_name; ?>" alt="hot coffee" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="coffee-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden"   name="coffee" value="<?php echo $title; ?>">

                        <p class="coffee-price">&#8377;<?php echo $price; ?></p>
                         <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required style="border: 2px solid black;" >
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <h2 style="color:yellowgreen;">Delivery Details</h2>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name"  class="input-responsive" required style="border: 2px solid black;">

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact"  class="input-responsive" required style="border: 2px solid black;">

                    <div class="order-label">Email</div>
                    <input type="email" name="email"  class="input-responsive" required style="border: 2px solid black;">

                    

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary" style="background: green;">
                </fieldset>

            </form>

            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $coffee = $_POST['coffee'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    

                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                        coffee = '$coffee',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email'   ";
                        
                    

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);
                     //Check whether query executed successfully or not
                    if ($res2 == true) 
                    {

                              //Query Executed and Order Saved
                             $_SESSION['order'] = "<div class='success text-center'>Coffee Ordered Successfully.</div>";
                             header('location:' . SITEURL);
                     }
                      else {
                                                                      //Failed to Save Order
                             $_SESSION['order'] = "<div class='error text-center'>Failed to Order Coffee.</div>";
                             header('location:' . SITEURL);
                             }
              
                   
                   

                }
            
            ?>

        </div>
    </section>
    <!-- coffee SEARCH Section Ends Here -->

    <?php include('parts/footer.php'); ?>