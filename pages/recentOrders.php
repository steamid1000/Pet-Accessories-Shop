<?php
session_start();
require_once '../scripts/db_connect.php';
if (!isset($_SESSION['user_id'])) {
  header("Location: ../index.php", true);
  die();
}

$recent_orders = $conn->query("select ")
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
        <h3 style="color: orange;font-weight:bolder;text-align:center;text-decoration:underline;">Your Recent Orders</h3>
    </div>
</body>
</html>