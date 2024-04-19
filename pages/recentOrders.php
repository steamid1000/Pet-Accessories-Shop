<?php
session_start();
require_once '../scripts/db_connect.php';
require_once '../scripts/functions.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php", true);
    die();
}

$recent_orders = $conn->query("SELECT orders.order_amount,orders.order_amount,orders.order_address,orders.order_date,products.product_name,products.product_images,products.product_price FROM orders INNER JOIN products ON orders.product_id  = products.product_id and orders.user_id=$_SESSION[user_id]");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐶😸Recent Orders</title>
</head>

<body>
    <?php include_once '../components/navbar.php'; ?>
    <div class="container">
        <h3 class="mt-4 mb-3" style="color: orange;font-weight:bolder;text-align:center;text-decoration:underline;">Your
            Recent Orders</h3>
        <hr>
        <div class="conatiner">
            <?php while ($row = mysqli_fetch_assoc($recent_orders)) {
                ?>
                <div class="container-fluid d-flex mb-5 justify-content-center">
                    <img style="max-width: 150px;" class="img mr-4" src="<?php echo getImageName($row['product_images']) ?>"
                        alt="">


                    <div class="conatienr">
                        <h3><?php echo $row['product_name'] ?></h3>
                        <h5>Order Date: <?php echo $row['order_date'] ?></h5>
                        <h5>Order Amount: <?php echo $row['order_amount'] ?> </h5>
                        <h5>Order Qty: <?php echo $row['order_amount'] / $row['product_price']; ?> </h5>
                        <h5>Order Addres: <?php echo $row['order_address'] ?> </h5>
                    </div>

                </div>
                <hr>
            <?php } ?>
        </div>
    </div>
</body>

</html>