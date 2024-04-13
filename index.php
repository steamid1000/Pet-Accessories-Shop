<?php
session_start();
require_once "scripts/db_connect.php";
require_once 'scripts/functions.php';
?>

<!doctype html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css">

  <title>🐶😸Pet Accessories!!</title>
  <style>
    .card:hover {
      box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;

    }

    a:link {
      text-decoration: none;
    }

    .card {
      color: black;
    }

    .card:hover {
      .card-img-top {
        transition: ease 1.5s;
        transform: scale(1.2);

      }

      overflow: hidden;
    }
  </style>
</head>

<body>
  <?php require_once "components/navbar.php" ?>
  <div class="container-fluid third-container mt-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="./imgs/slider-00.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./imgs/slider-01.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./imgs//slider-03.png" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./imgs/slider-04.png" alt="Forth slide">
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




  <?php require_once "components/pets.php" ?>

  <!-- Special deals div -->
  <div class=" deals container-fluid">
    <p>Special Deals</p>
    <div class="row d-flex justify-content-around align-items-around">
      <?php

      $result = $conn->query("Select * from products where pet_category=0 limit 4");
      while ($row = $result->fetch_assoc()) {

        ?>
        <a href="pages/product.php?productID=<?php echo $row['product_id']; ?>" style="text-decoration: none;">
          <div class="card" style="width: 20rem;  max-height: 95%;">
            <img class="card-img-top" style="max-height:12.5rem;object-fit: contain;"
              src="<?php echo getImageName($row['product_images']); ?>" alt="product images">

            <div class="card-body" style="position:relative;">
              <h3>For <?php echo getPetCategory($row['pet_category']); ?></h3>
              </span> </p>
              <p class="card-text "> <span><?php echo $row['product_name']; ?></span> </p>
              <div class="d-flex " style="text-align: center; justify-content:left; >
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






  <div class=" deals container-fluid  mt-5">
    <p>Trending Now</p>

    <div class="row d-flex justify-content-around align-items-around">

      <?php
      $result = $conn->query("Select * from products where pet_category=1 limit 4");
      while ($row = $result->fetch_assoc()) {
        ?>
        <a href="pages/product.php?productID=<?php echo $row['product_id']; ?>" style="text-decoration: none;">
          <div class="card" style="width: 20rem;  max-height: 95%;">
            <img class="card-img-top" style="max-height:12.5rem;object-fit: contain;"
              src="<?php echo getImageName($row['product_images']); ?>" alt="Card image cap">
            <div class="card-body" style="position:relative;">
              <p class="card-text "> <span>
                  <h3>For <?php echo getPetCategory($row['pet_category']); ?></h3>
                </span> </p>
              <p class="card-text "> <span><?php echo $row['product_name']; ?></span> </p>
              <div class="d-flex " style="text-align: center; justify-content:left;">
                <p class="card-text "> <span
                    style="font-size: 20px; font-weight: 600;"><?php echo "Rs." . getDiscountedPrice($row['product_price'], 10); ?></span>
                  <span class="ml-2" style="text-decoration: line-through; font-size: 15px;">
                    <?php echo "RS." . $row['product_price']; ?> </span> </span> <span class="ml-2"
                    style="color: orange; font-weight: 800;"> (10% OFF)</span>
                </p>
              </div>
            </div>
          </div>
        </a>

      <?php } ?>
    </div>
  </div>
  <hr>

  <!-- this is end of Trending products -->




  <!-- pet-parent Resources -->
  <div class="deals container-fluid  mt-5 ">
    <p>Special Deals</p>
    <div class="row d-flex justify-content-around align-items-around">
      <?php
      $result = $conn->query("Select * from products limit 4");
      while ($row = $result->fetch_assoc()) {
        ?>
        <a href="pages/product.php?productID=<?php echo $row['product_id']; ?>" style="text-decoration: none;">
          <div class="card" style="width: 20rem;  max-height: 95%;">
            <img class="card-img-top" style="max-height:12.5rem;object-fit: contain;"
              src="<?php echo getImageName($row['product_images']); ?>" alt="Card image cap">
            <div class="card-body" style="position:relative;">
              <p class="card-text "> <span>
                  <h3>For <?php echo getPetCategory($row['pet_category']); ?></h3>
                </span> </p>
              <p class="card-text "> <span><?php echo $row['product_name']; ?></span> </p>
              <div class="d-flex " style="text-align: center; justify-content:left;">
                <p class="card-text "> <span
                    style="font-size: 20px; font-weight: 600;"><?php echo "Rs." . getDiscountedPrice($row['product_price'], 10); ?></span>
                  <span class="ml-2" style="text-decoration: line-through; font-size: 15px;">
                    <?php echo "RS." . $row['product_price']; ?> </span> </span> <span class="ml-2"
                    style="color: orange; font-weight: 800;"> (10% OFF)</span>
                </p>
              </div>
            </div>
          </div>
        </a>
      <?php } ?>
    </div>
  </div>



  <?php require_once "components/footer.php"; ?>

  <!-- pet-parent Resources ends here-->


  <script>

    let scrollContainer = document.querySelector('.gallery');
    let backBtn = document.getElementById('backBtn');
    let nextBtn = document.getElementById('nextBtn');
    scrollContainer.addEventListener('wheel', (evt) => {
      evt.preventDefault();
      scrollContainer.scrollLeft += evt.deltaY;
      scrollContainer.style.scrollBehavior = "smooth";
    })
    nextBtn.addEventListener("click", () => {
      scrollContainer.style.scrollBehavior = "smooth";
      scrollContainer.scrollLeft += 1200;
    })
    backBtn.addEventListener("click", () => {
      scrollContainer.style.scrollBehavior = "smooth";
      scrollContainer.scrollLeft += -1200;
    })

  </script>
</body>

</html>