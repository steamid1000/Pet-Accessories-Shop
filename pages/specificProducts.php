<?php
session_start();
require_once "../scripts/db_connect.php";
require_once '../scripts/functions.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

  <title><?php echo getPetCategory($_GET['pet_category']); ?></title>
</head>

<body>


  <?php require_once "../components/navbar.php" ?>
  <div class="container-fluid third-container mt-5 mb-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="../imgs/slider-00.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../imgs/slider-01.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../imgs//slider-03.png" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../imgs/slider-04.png" alt="Forth slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-- these are the cards -->
  <div class=" deals container-fluid">
    <p>Special Deals</p>
    <div class="row d-flex justify-content-around align-items-around">
      <?php

      $result = $conn->query(getActiveQuery($_GET['pet_category']));
      while ($row = $result->fetch_assoc()) {

        ?>
        <a href="pages/product.php?productID=<?php echo $row['product_id']; ?>" style="text-decoration: none; color:black;">
          <div class="card" style="width: 20rem;  max-height: 95%;">
            <img class="card-img-top" style="max-height:12.5rem;object-fit: contain;"
              src="<?php echo getImageName($row['product_images']); ?>" alt="product images">

            <div class="card-body" style="position:relative;">
              <h3>For <?php echo getPetCategory($row['pet_category']); ?></h3>
              </span> </p>
              <p class="card-text "> <span><?php echo $row['product_name']; ?></span> </p>
              <div class="d-flex " style="text-align: center; justify-content:left;">
              <p class=" card-text "> <span style=" font-size: 20px; font-weight: 600;">
                <?php echo "Rs." . getDiscountedPrice($row['product_price'], 10); ?></span> <span class="ml-2"
                  style="text-decoration: line-through; font-size: 15px;"> <?php echo "RS." . $row['product_price']; ?>
                </span> </span> <span class="ml-2" style="color: orange; font-weight: 800;"> (10% OFF)</span> </p>
              </div>
            </div>
          </div>
        </a>
      <?php } ?>
    </div>
  </div>
  <hr>
  <!-- these are the cards -->
  <?php require_once "../components/footer.php" ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>