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

  <title> Pet Accessories!!</title>
  <style>
    .card:hover{
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        
    }
    a:link{text-decoration: none;}
    .card{
        color: black;
    }
 .card:hover{
    .card-img-top{
        transition: ease 1.5s;
        transform: scale(1.2);
        
    }
    overflow: hidden;
 }

  </style>
</head>

<body>
    <?php  require_once "components/navbar.php" ?>
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

  </div>


<?php  require_once "components/pets.php"?>


  
    

  

  <!-- this is for special deals of janvar -->
  <div class=" deals container-fluid justify-content-center" style="border: 1px solid blue;">
    <p>Special Deals</p>
    <div class="row d-flex justify-content-center align-items-center">

      <div class="col">
        <div class="banner-img">
          <img src="./special deals/catfooddd.jpg" alt="">

        </div>
        <div class="about-prod">
          <p>Lorem ipsum dolor </p>
        </div>
      </div>

      <div class="col">
        <div class="banner-img">
          <img src="./special deals/dogliquid.jpg" alt="">

        </div>
        <div class="about-prod">
          <p>Lorem ipsum dolor </p>
        </div>
      </div>

      <div class="col">
        <div class="banner-img">
          <img src="./special deals/dogs.jpg" alt="">

        </div>
        <div class="about-prod">
          <p>Lorem ipsum dolor </p>
        </div>
      </div>

      <div class="col">
        <div class="banner-img">
          <img src="./special deals/fish.jpg" alt="">

        </div>
        <div class="about-prod">
          <p>Lorem ipsum dolor </p>
        </div>
      </div>
      <div class="col">
        <div class="banner-img">
          <img src="./special deals/gocat.jpg" alt="">

        </div>
        <div class="about-prod">
          <p>Lorem ipsum dolor </p>
        </div>
      </div>

    </div>
  </div>

  <!-- this is for Trending products -->
  <div class=" deals container-fluid justify-content-center" style="border: 1px solid blue;">
    <p>Pet Essentials</p>
    <div class="row d-flex justify-content-center align-items-center">

      <div class="col">
        <div class="banner-img">
          <img src="./essentials/bird.jpg" alt="">

        </div>
        <div class="about-prod">
          <p>Lorem ipsum dolor </p>
        </div>
      </div>

      <div class="col">
        <div class="banner-img">
          <img src="./essentials/collor.jpg" alt="">

        </div>
        <div class="about-prod">
          <p>Lorem ipsum dolor </p>
        </div>
      </div>

      <div class="col">
        <div class="banner-img">
          <img src="./essentials/toys.jpg" alt="">

        </div>
        <div class="about-prod">
          <p>Lorem ipsum dolor </p>
        </div>
      </div>

      <div class="col">
        <div class="banner-img">
          <img src="./essentials/pedigrees.jpg" alt="">

        </div>
        <div class="about-prod">
          <p>Lorem ipsum dolor </p>
        </div>
      </div>
      <div class="col">
        <div class="banner-img">
          <img src="./essentials/vegfoods.jpg" alt="">

        </div>
        <div class="about-prod">
          <p>Lorem ipsum dolor </p>
        </div>
      </div>

    </div>
  </div>

<!-- this is end of Trending products -->


 

<!-- pet parent Resources -->
<div class="container-fluid " style="border: 1px solid black;">
<div class="row d-flex justify-content-around">
  <a href="#" style="text-decoration: none;">
    <div class="card " style="width: 18rem;" >
        <img class="card-img-top" src="./pet parent/bird.jpg" alt="Card image cap">
        <div class="card-body">
          <p class="card-text "> <span> <h3>For Cat</h3></span> </p>
          <p class="card-text "> <span> product name</span> </p>
          <div class="d-flex " style="text-align: center; justify-content:left;">  
          <p class="card-text "> <span  style="font-size: 20px; font-weight: 600;">Rs. 8000</span> <span class="ml-2" style="text-decoration: line-through; font-size: 15px;"> RS.10000  </span> </span> <span class="ml-2" style="color: orange; font-weight: 800;"> (10% OFF)</span> </p>
        </div>
    </div>
      </div>
    </a>
  <a href="#" style="text-decoration: none;">
    <div class="card" style="width: 18rem;" >
        <img class="card-img-top" src="./pet parent/bird.jpg" alt="Card image cap">
        <div class="card-body">
          <p class="card-text "> <span> <h3>For Cat</h3></span> </p>
          <p class="card-text "> <span> product name</span> </p>
          <div class="d-flex " style="text-align: center; justify-content:left;">  
          <p class="card-text "> <span  style="font-size: 20px; font-weight: 600;">Rs. 8000</span> <span class="ml-2" style="text-decoration: line-through; font-size: 15px;"> RS.10000  </span> </span> <span class="ml-2" style="color: orange; font-weight: 800;"> (10% OFF)</span> </p>
        </div>
    </div>
      </div>
    </a>
  <a href="#" style="text-decoration: none;">
    <div class="card" style="width: 18rem;" >
        <img class="card-img-top" src="./pet parent/bird.jpg" alt="Card image cap">
        <div class="card-body">
          <p class="card-text "> <span> <h3>For Cat</h3></span> </p>
          <p class="card-text "> <span> product name</span> </p>
          <div class="d-flex " style="text-align: center; justify-content:left;">  
          <p class="card-text "> <span  style="font-size: 20px; font-weight: 600;">Rs. 8000</span> <span class="ml-2" style="text-decoration: line-through; font-size: 15px;"> RS.10000  </span> </span> <span class="ml-2" style="color: orange; font-weight: 800;"> (10% OFF)</span> </p>
        </div>
    </div>
      </div>
    </a>
  <a href="#" style="text-decoration: none;">
    <div class="card" style="width: 18rem;" >
        <img class="card-img-top" src="./pet parent/bird.jpg" alt="Card image cap">
        <div class="card-body">
          <p class="card-text "> <span> <h3>For Cat</h3></span> </p>
          <p class="card-text "> <span> product name</span> </p>
          <div class="d-flex " style="text-align: center; justify-content:left;">  
          <p class="card-text "> <span  style="font-size: 20px; font-weight: 600;">Rs. 8000</span> <span class="ml-2" style="text-decoration: line-through; font-size: 15px;"> RS.10000  </span> </span> <span class="ml-2" style="color: orange; font-weight: 800;"> (10% OFF)</span> </p>
        </div>
    </div>
      </div>
    </a>
  <a href="#" style="text-decoration: none;" >
    <div class="card" style="width: 18rem;" >
        <img class="card-img-top" src="./pet parent/bird.jpg" alt="Card image cap">
        <div class="card-body">
          <p class="card-text "> <span> <h3>For Cat</h3></span> </p>
          <p class="card-text "> <span> product name</span> </p>
          <div class="d-flex " style="text-align: center; justify-content:left;">  
          <p class="card-text "> <span  style="font-size: 20px; font-weight: 600;">Rs. 8000</span> <span class="ml-2" style="text-decoration: line-through; font-size: 15px;"> RS.10000  </span> </span> <span class="ml-2" style="color: orange; font-weight: 800;"> (10% OFF)</span> </p>
        </div>
    </div>
      </div>
    </a>
  </div>
</div>
 

 
<?php require_once "components/footer.php"; ?>

<!-- pet parent Resources ends here-->

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