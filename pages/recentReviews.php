<?php
session_start();
require_once '../scripts/db_connect.php';
require_once '../scripts/functions.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php", true);
    die();
}

$recent_orders = $conn->query("SELECT reviews.review_description,reviews.review_stars,reviews.review_date,products.product_name,products.product_images FROM reviews INNER JOIN products ON reviews.product_id  = products.product_id and reviews.user_id=$_SESSION[user_id]");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐶😸Recent Reviews</title>
</head>

<body>
    <?php include_once '../components/navbar.php'; ?>
    <div class="container">
        <h3 class="mt-4 mb-3" style="color: orange;font-weight:bolder;text-align:center;text-decoration:underline;">Your
            Recent Reviews </h3>
        <hr>
        <div class="conatiner">
            <?php while ($row = mysqli_fetch_assoc($recent_orders)) {
                ?>
                <div class="container-fluid d-flex mb-5 justify-content-center">
                    <img style="max-width: 150px;" class="img mr-4" src="<?php echo getImageName($row['product_images']) ?>"
                        alt="">


                    <div class="conatienr">
                        <h3><?php echo $row['product_name'] ?></h3>
                        <h5><strong>Review Date: </strong><?php echo $row['review_date'] ?></h5>
                        <h5><strong>Review Description: </strong><?php echo $row['review_description'] ?> </h5>
                        <h5><strong> Stars:
                            </strong><?php echo '(' . $row['review_stars'] . ") ";
                            $star = $row['review_stars'];
                            while ($star--) {
                                echo '⭐';
                            } ?>
                        </h5>
                    </div>

                </div>
                <hr>
            <?php } ?>
        </div>
    </div>
</body>

</html>