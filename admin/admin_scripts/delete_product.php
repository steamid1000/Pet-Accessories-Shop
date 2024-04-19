<?php

if (isset($_GET['productID'])) {
  require_once "../../scripts/db_connect.php";
  if (mysqli_query($conn, "Delete from products where product_id=$_GET[productID]")) {
    header("Location: ../products.php", true);
  } else {
    echo "Cannot delete the user";
  }
}
?>