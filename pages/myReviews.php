<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <style>
    .card {
      min-width: 100%;
      /* border: 1px solid blue; */
    }

    .card {
      height: 120px;
      margin-top: 25px;
      box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
    }

    .row .col-2 img {
      width: 80px;
      border: 1px solid black;
    }

    #rupee,
    #price,
    #date,
    #productname {
      font-size: 1.2rem;
    }

    .container-fluid {
      min-height: 100vh;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <?php require_once "../components/navbar.php" ?>
    <div class="container">
      <div class="card">
        <div class="row">
          <div class="col-2 text-center mt-1">
            <img src="../imgs/bird.jpg" class="m-2" />
          </div>
          <div class="col-4 text-center mt-4">
            <span id="productname">product name is here </span>
          </div>
          <div class="col-4 text-center mt-4">
            <span id="rupee"> &#8377;</span> . <span id="price"> 1350</span>
          </div>
          <div class="col-2 text-center mt-4">
            <span id="date"> 10/04/2024</span>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="row">
          <div class="col-2 text-center mt-1">
            <img src="../imgs/bird.jpg" class="m-2" />
          </div>
          <div class="col-4 text-center mt-4">
            <span id="productname">product name is here </span>
          </div>
          <div class="col-4 text-center mt-4">
            <span id="rupee"> &#8377;</span> . <span id="price"> 1350</span>
          </div>
          <div class="col-2 text-center mt-4">
            <span id="date"> 10/04/2024</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once "../components/footer.php" ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>