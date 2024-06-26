<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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


<body>
  <div class="container">
  <?php 
      require_once "../scripts/db_connect.php";
      require_once "../scripts/functions.php";

      $result = $conn->query("Select * from products"); // change this query according to the context
      // $result->fetch_assoc();
      while ($row = $result->fetch_assoc()) {
        
    ?>
    <a href="#" style="text-decoration: none;">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?php echo "../".$row['product_images']; ?>" alt="Card image cap">
        <div class="card-body">
          <p class="card-text "> <span>
              <h3>For <?php echo getPetCategory($row['pet_category']); ?></h3>
            </span> </p>
          <p class="card-text "> <span><?php echo $row['product_name']; ?></span> </p>
          <div class="d-flex " style="text-align: center; justify-content:left;">
            <p class="card-text "> <span style="font-size: 20px; font-weight: 600;"><?php echo "Rs." . ($row['product_price'] - ($row['product_price'] * 0.10)); ?></span> <span class="ml-2" style="text-decoration: line-through; font-size: 15px;"> <?php echo "RS." . $row['product_price']; ?> </span> </span> <span class="ml-2" style="color: orange; font-weight: 800;"> (10% OFF)</span> </p>
          </div>
        </div>
      </div>
    </a>
    <?php } ?>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>


<?php 
// Below code is experimental for storing the user object into the session array
// session_start();
//   require_once "../scripts/functions.php";
//   $user = new user(200);
//   $user->setData();

//   // $_SESSION['userObj'] = $user;  // we can store the obj in the session
?>