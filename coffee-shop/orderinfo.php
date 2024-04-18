<?php
include('parts/menu.php');
if (isset($_SESSION['id']) == null)
 {
    header('Location:login.php');
}
?>

<section class="categories">
    <div class="container">
        <h2 class="text-center">Delivery</h2>
        <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%; color: black;">
            <tr>
                <th style="border: 1px solid #dddddd;text-align: left;  padding: 8px;">No</th>
                <th style="border: 1px solid #dddddd;text-align: left;  padding: 8px;">coffee</th>
                <th style="border: 1px solid #dddddd;text-align: left;  padding: 8px;">Price</th>
                <th style="border: 1px solid #dddddd;text-align: left;  padding: 8px;">Qty</th>
                <th style="border: 1px solid #dddddd;text-align: left;  padding: 8px;">Total</th>
                <th style="border: 1px solid #dddddd;text-align: left;  padding: 8px;">Order Date</th>
               
            </tr>
            <?php
            // include 'config/constants.php';
            $session_email = $_SESSION['email'];
            $squery = "SELECT * FROM tbl_order WHERE customer_email= '$session_email'";
            // echo $squery;
            $result = mysqli_query($conn, $squery);
            $id = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $id;?></td>
                        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $row["coffee"] ?></td>
                        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $row["price"] ?></td>
                        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $row["qty"] ?></td>
                        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $row["total"] ?></td>
                        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $row["order_date"] ?></td>
                       
                        <?php
                          $id++;  
                        ?>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</section>
<?php include('parts/footer.php'); ?>