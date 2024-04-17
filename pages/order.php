<?php
session_start();
require_once "../scripts/db_connect.php";

$qt = null;
$amount = null;
$product_id = null;
$date = date("Y-m-d");


  $qt = $_SESSION['qt'];
  $product_id = $_SESSION['productID'];
  
  $amount = $conn->query("select product_price from products where product_id=$product_id");
  $amount = mysqli_fetch_array($amount);
  $amount = $amount[0];


if ($_SERVER["REQUEST_METHOD"] == "GET") {
  // require_once "../scripts/db_connect.php";
  $address = null;
  if (isset($_GET['default']) and $_GET['default'] == 'on') {
    $address = $conn->query("select user_address from users where user_id=$_SESSION[user_id]");
    $address = mysqli_fetch_array($address);
    $address = $address[0];
  } else {
    if(isset($_GET['new_address']) and $_GET['new_address'] != ''){$address = $_GET['new_address'];}
  }

  if ($address != null) {
    
    $stm = $conn->prepare("INSERT INTO `orders`(`product_id`, `user_id`, `order_amount`, `order_address`, `order_date`) VALUES (?,?,?,?,?)");
    $stm->bind_param("sssss", $product_id, $_SESSION['user_id'], $amount, $address, $date);
    if($stm->execute()){//going back to the index page with a alert
      header("Location: ../index.php?order_status=succ");
    }
    else {
      echo mysqli_error($conn);
      header("Location: ../index.php?order_status=fail");
    }
  }


}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>😺🐶Order Address</title>
  <style>
    body {
      align-items: center;
      justify-content: center;
      margin: auto;
    }

    .container {
      max-width: 100px;

      height: 500px;
      margin-top: 5rem;

    }

    .container form {
      max-width: 500px;
      margin-top: 400px;
      margin-left: 25%;
      position: relative;
      min-height: 300px;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      ;

    }
  </style>
</head>

<body>
  <?php require_once "../components/navbar.php"; ?>
  <div class="container mt-5 mb-4">


    <form class="mt-2 mb-3" action="order.php" method="get">
      <div class="form-contaienr text-center mt-3 mb-4">
        <p style="font-size:1.5rem; font-weight:600"> Order Address </p>
      </div>
      <div class=" form-group mt-3 mb-4">
        <div class="form-check text-center mt- mb-2" style=" margin-top:2rem">
          <input type="checkbox" class="form-check-input" name="default" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Continue with default address</label>
        </div>
      </div>
      <div class="form-group mt-3 mb-4">
        <label for="exampleInputEmail1">Enter New Address</label>
        <input type="text" class="form-control" name="new_address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">

      </div>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  </div>

  <?php require_once "../components/footer.php"; ?>






  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>