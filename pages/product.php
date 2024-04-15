<?php

session_start();

?>

<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  .card:hover {
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;

  }

  .checked {
    color: orange;
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

  form ::placeholder {

    font-size: 20px;
    margin-left: 150px;

  }

  .mystars span {
    font-size: 3rem;
    ;
    margin-left: 1rem;
  }

  #reviewform .review::placeholder {
    color: red;
  }

  #submitbtn {
    position: relative;
    width: 300px;
    ;
    border-radius: 11px;
    margin-left: 3.3rem;
    height: 45px;
    margin-bottom: 2rem;
    margin-top: 1rem;
    background-color: #50C878;
    color: black;
    font-size: 1.2rem;

  }

  /* this css is only for customer review */
  .login button a {
    color: black;
  }

  .login button:nth-child(1) a {
    color: black;
    font-weight: 700;
  }

  .login button:nth-child(2) a {
    color: white;
    font-weight: 700;
  }

  .reviewme .row .stars span {
    font-size: 3rem;
    margin-left: 1rem;
  }

  .rating-container {
    margin-bottom: 20px;
  }

  .rating-bar {
    width: 200px;
    height: 1.2rem;
    background-color: #ddd;
    margin-bottom: 5px;
    border-radius: 1rem;
  }

  .filled-bar {
    height: 100%;
    background-color: #FFD700;
    border-radius: 15px;
  }

  #one,
  #two,
  #three,
  #four,
  #five {
    font-size: 2rem;
    margin-left: 5px;
    margin-right: 1.2rem;
  }

  .starline p {
    font-size: 1.6rem;
    position: relative;
    margin-left: 127px;
    /* border: 2px solid blue; */
    box-sizing: content-box
  }

  .card {
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
  }

  /* this css is only for customer review */
</style>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>🐶😸Product Page</title>
</head>

<body>
  <?php
  require_once "../components/navbar.php";
  require_once '../scripts/db_connect.php';
  require_once '../scripts/functions.php';


  if (isset($_GET['productID']) and $_GET['productID'] != -1) {
    
  
  $productID = $_GET['productID'];

  $result = $conn->query("select * from products where product_id='$productID'");
  $result = mysqli_fetch_assoc($result);

  $category = $result['pet_category']; // this is so that we can load similar products below




  ?>


  <div class="container-fluid mt-5 mb-5 ">
    <div class="row col-12">
      <div class=" col-md-8">
        <div class="row">
          <img src="<?php echo getImageName($result['product_images']); ?>" class="col-md-6" style="min-height: 100vh; max-height: 100vh; background-size: cover;" alt="">
          <img src="<?php echo getImageName($result['product_images2']); ?>" class="col-md-6" style="min-height: 100vh; max-height: 100vh; background-size: cover;" alt="">
        </div>
      </div>


      <div class="col-md-4">
        <p id="pname">
          <?php echo $result['product_name']; ?>
        </p>
        <p>Lorem ipsum dolor sit amet consectetur.</p>

        <p> <span style="font-size: 20px; font-weight: 600;">
            <?php echo getDiscountedPrice($result['product_price'], 10); ?>
          </span> <span style="text-decoration: line-through; font-size: 15px; font-weight:100"> MRP Rs.
            <?php echo $result['product_price']; ?>
          </span> <span style="color: orange; font-weight: 600;">(10% OFF)</span></p>
        <p style="color: green;">Inclusive of all taxes</p>
        <div class="forms">
          <form action="">
            <input type="number" name="qt" class="form-control" id="quantity" name="quantity" min="1" style="max-width: 200px;">
          </form>
        </div>
        <hr>
        <?php if (isset($_SESSION['user_id'])) { ?> <button type="submit" class="btn btn-primary mt-4 ml-0" data-toggle="modal" data-target="#exampleModal" style="width: 252px; background-color:orange; border-radius:5px;height:45px"> <span> Buy Now</span> <span class="ml-4"> <img width="30" height="30" src="https://img.icons8.com/pastel-glyph/64/cat--v3.png" alt="cat--v3" /></span> </button>
        <?php } else { ?>
          <h5 style="color: red;">Please Login to buy product!</h5>
          <hr>
        <?php } ?>
        <div class="description mt-3"></div>
        <p> <span style="font-weight:bold"> Product Details </span> <span><img width="24" height="24" src="https://img.icons8.com/material-sharp/24/note.png" alt="note" /></span> </p>
        <p>
          <?php echo $result['product_description']; ?>
        </p>


      </div>


    </div>
  </div>
  <hr>
  <!-- this section is for check customer reviews and it will be always appear. -->

  <div class="container " style="height: 550px;">
    <hr />
    <div class="navcontainer d-flex justify-content-between">
      <div class="logoimg">
        <img src="../imgs/shopicon.png" alt="" style="width: 50px" />
        <span><b>Reviews</b></span>
      </div>
    </div>
    <hr />
    <div class="reviewme d-flex" style="overflow-y:hidden;">
      <div class="row">

        <div class="col-sm stars  text-center">
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
        </div>
        <div class="starline">
          <div style="font-size: 15px;" class="row d-flex flex-row mt-4">
            <div class="name d-flex">
              <p>5</p> <span class="fa fa-star" id="one"></span>
            </div>
            <div class="rating-bar">
              <div class="filled-bar" style="width: 80%;"></div>
            </div>

          </div>
          <div class="row d-flex flex-row mt-3">
            <div class="name d-flex">
              <p>4</p> <span class="fa fa-star" id="two"></span>
            </div>
            <div class="rating-bar">
              <div class="filled-bar" style="width: 80%;"></div>
            </div>

          </div>
          <div class="row d-flex flex-row mt-3">
            <div class="name d-flex">
              <p>3</p> <span class="fa fa-star" id="three"></span>
            </div>
            <div class="rating-bar">
              <div class="filled-bar" style="width: 80%;"></div>
            </div>

          </div>
          <div class="row d-flex flex-row mt-3">
            <div class="name d-flex">
              <p>2</p> <span class="fa fa-star" id="four"></span>
            </div>
            <div class="rating-bar">
              <div class="filled-bar" style="width: 80%;"></div>
            </div>

          </div>
          <div class="row d-flex flex-row mt-3">
            <div class="name d-flex">
              <div class="d-flex" style=" margin-bottom: 25px;">
                <p>1</p> <span class="fa fa-star" id="five"></span>
              </div>
            </div>
            <div class="rating-bar">
              <div class="filled-bar" style="width: 80%;"></div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-sm reviews " id="rightdiv" style="max-height: 28.1215rem;">
        <div class="scrollme" style="width: 100%;; height: 100%; overflow-Y: scroll; overflow-x: hidden;">
          <?php

          $cardResult = $conn->query("SELECT reviews.review_stars,users.user_name,reviews.review_description,reviews.review_date FROM reviews INNER JOIN users ON reviews.user_id  = users.user_id and reviews.product_id=$productID;");
          while ($feedbackRow = $cardResult->fetch_assoc()) {

            // Start PHP code
            echo '<div class="card mt-4 mb-4" style="text-align: center; border:1px solid grey;min-width:600px; margin-left:6rem">' .
              '<div class="row d-flex justify-content-between mb-3 mt-2">' .
              '<div class="img d-flex align-items-center">' .
              '<img style="width: 2.5rem; margin-left: 1.3rem;" src="../imgs/back.png" alt="">' .
              '<p style="margin-left: 1rem; text-transform: capitalize; font-style: italic;">' . $feedbackRow['user_name'] . '</p>' .
              '</div>' .
              '<div class="date" style="margin-right: 1.9rem;">' .
              '<p>' . $feedbackRow["review_date"] . '</p>' .
              '</div>' .
              '</div>' .
              '<p class="ml-1 mr-1">' . $feedbackRow['review_description'] . '</p>' .
              '</div>';
            // End PHP code

          }
          ?>

        </div>
      </div>
    </div>
  </div>
  <hr>
  </div>

  <!-- this section is for check customer reviews and it will be always appear. -->

  <!-- this is the rating section  -->

  <?php // rating option will only be give to users that have placed the order and not given the review earlier

  if (canWriteReview()) {

  ?>
    <div class="container-fluid">

      <div class="d-flex container justify-content-around">
        <div class="imgs mb-5" style="align-items: left;">
          <p class="mt-5 mb-3" style="text-align:center; font-size:2rem; font-weight:700">How was your Product Experience?
          </p>
          <img src="../imgs/reviewme.png" alt="" style="width:300px;margin-left:6rem">
        </div>
        <div class="stars">


          <form action="" id="reviewform" class="mt-5" method="post">

            <div class="mystars mr-5" id="star">
              <span class=" reviewstars fa fa-star " id="1"></span>
              <span class=" reviewstars fa fa-star " id="2"></span>
              <span class=" reviewstars fa fa-star " id="3"></span>
              <span class=" reviewstars fa fa-star" id="4"></span>
              <span class=" reviewstars fa fa-star" id="5"></span>
              <input type="hidden" value="0" name="stars">
            </div>
            <div class="review row">
              <input type="textarea" class="form-control mt-5" style="min-width:100%;height:10rem; margin:auto" name="review" placeholder="share Feedback...">

            </div>
            <button class="submit btn btn-primary mt-3" id="submitbtn">Submit Review</button>
          </form>
        </div>
      </div>
      <hr>

      <!-- this is the rating section  -->
    

    <hr>
    <div class=" deals container-fluid mt-5">
      <p style="font-size:1.5rem;font-weight: 600;">Special Deals</p>
      <div class="row d-flex justify-content-around align-items-around">
        <?php

        $result = $conn->query("Select * from products where pet_category=$category limit 4");
        while ($row = $result->fetch_assoc()) {

        ?>
          <a href="product.php?productID=<?php echo $row['product_id']; ?>" style="text-decoration: none;">
            <div class="card" style="width: 20rem;  max-height: 100%;">
              <img class="card-img-top" style="max-height:12.5rem;object-fit: contain;" src="<?php echo getImageName($row['product_images']); ?>" alt="product images">

              <div class="card-body" style="position:relative;">
                <h3>For
                  <?php echo getPetCategory($row['pet_category']); ?>
                </h3>
                </span> </p>
                <div class="d-flex " style="text-align: center; justify-content:left;">
                  <p class=" card-text "> <span style=" font-size: 20px; font-weight: 600;">
                      <?php echo "Rs." . getDiscountedPrice($row['product_price'], 10); ?></span> <span class="ml-2" style="text-decoration: line-through; font-size: 15px;">
                      <?php echo "RS." . $row['product_price']; ?>
                    </span> </span> <span class="ml-2" style="color: orange; font-weight: 800;"> (10% OFF)</span> </p>
                </div>
              </div>
            </div>
          </a>
        <?php } ?>
      </div>
    </div>
    <hr>




    <?php } ?>
<?php }else {
  echo "<h2 style='color:red;text-align:center'>The product your are looking for is not found!</h2>";
} ?>


    <?php require_once "../components/footer.php";

    function canWriteReview()
    {
      include "../scripts/db_connect.php";

      if (!isset($_SESSION['user_id']))
        return false;
      $productID = $_GET['productID'];

      $isOrdered = mysqli_query($conn, "select user_id from orders where product_id=$productID and user_id=$_SESSION[user_id];");
      $isOrdered = mysqli_fetch_array($isOrdered);
      $isReviewed = $conn->query("select user_id from reviews where product_id=$productID and user_id=$_SESSION[user_id];");
      $isReviewed = mysqli_fetch_array($isReviewed);



      if ($isOrdered != null) {
        if ($isOrdered != null) // checking if the current user has ordered the product
        {
          if ($isReviewed == null)
            return true;
          else
            return false;
        }
      } else
        return false;
    }
    ?>
    <!-- /this is model -->
    <?php require_once "../components/modal.php" ?>
    <!-- /this is model -->

    <script>
      const stars = document.querySelectorAll('.fa');
      let newItem, len, yellowStar, initialstar, len2;
      const startIndex = 10;
      let count = 0;
      const endIndex = 15;
      let starArray = new Array();
      for (let i = startIndex; i < endIndex; i++) {

        starArray.push(stars[i])

      }
      // console.log(starArray)

      starArray.forEach(eachStar => {
        eachStar.addEventListener('click', function() {
          newItem = this.id;
          count++;
          console.log("iamcount", count);


          len = parseInt(newItem);
          len2 = len;

          console.log("newitem", newItem)

          colorme();


        })

      })

      colorme = () => {
        while (len > 0) {
          initialstar = len;
          yellowStar = document.getElementById(len);
          yellowStar.classList.add('checked')
          len--;

        }
        removeme()


      }



      removeme = () => {

        if (count % 2 != 0) {

          while (len2 > 0) {

            console.log("len2", len2);
            let star = document.getElementById(len2);
            console.log(star);
            len2--;
            if (star.classList.contains('checked')) {

              star.classList.toggle('checked')
            }
          }
        }






      }
    </script>
</body>

</html>