<?php
session_start();

?>

<!doctype html>
<html lang="en">
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
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 
  <title>PRoduct !</title>
</head>

<body>
  <?php 
  require_once "../components/navbar.php";
  require_once '../scripts/db_connect.php';
  require_once '../scripts/functions.php';

 
    $productID =  $_GET['productID'];

    $result = $conn->query("select * from products where product_id='$productID'");
    $result = mysqli_fetch_assoc($result);

    $category = $result['pet_category']; // this is so that we can load similar products below
  ?>
  
  <div class="container-fluid mt-5 mb-5 ">
    <div class="row col-12">
      <div class=" col-md-8">
        <div class="row">
          <img src="<?php echo $result['product_images']; ?>" class="col-md-6"  style="min-height: 100vh; max-height: 100vh; background-size: cover;" alt="">
          <img src="<?php echo $result['product_images']; ?>" class="col-md-6"  style="min-height: 100vh; max-height: 100vh; background-size: cover;" alt="">
        </div>
      </div>
     

    <div class="col-md-4">
        <p id="pname"><?php echo $result['product_name']; ?></p>
        <p>Lorem ipsum dolor sit amet consectetur.</p>
          
          <p> <span style="font-size: 20px; font-weight: 600;"><?php echo getDiscountedPrice($result['product_price'],10); ?> </span> <span style="text-decoration: line-through; font-size: 15px; font-weight:100"> MRP Rs.<?php echo $result['product_price'];?></span>  <span style="color: orange; font-weight: 600;">(10% OFF)</span></p>
         <p style="color: green;">Inclusive of all taxes</p>
         <div class="forms">
          <form action="">
        <input type="number" name="qt" class="form-control" id="quantity" name="quantity" min="1" style="max-width: 200px;" > 
        </form>
         </div>
            <hr>
         <button type="submit"  class="btn btn-primary mt-4 ml-0" style="width: 252px; background-color:orange; border-radius:5px;height:45px" >   <span > Buy Now</span> <span class="ml-4">  <img width="30" height="30" src="https://img.icons8.com/pastel-glyph/64/cat--v3.png" alt="cat--v3"/></span> </button>
        

   <div class="description mt-3" ></div>
    <p> <span style="font-weight:bold"> Product Details  </span> <span><img width="24" height="24" src="https://img.icons8.com/material-sharp/24/note.png" alt="note"/></span> </p>
    <p><?php echo $result['product_description']; ?></p>


  </div>

   
      </div>
  </div>

  <hr>
  <div class="container-fluid mt-5 mb-5" id="simprod" > 
    <p style="font-size: 1.5rem; font-weight:700;">Similar Products</p>
    <?php 
    $otherProducts = $conn->query("select * from products where pet_category='$category' limit 4");
    while ($row = mysqli_fetch_assoc($otherProducts)) {
    ?>
    <div class="row d-flex justify-content-around">
    <a href="pages/product.php?productID=<?php echo $row['product_id']; ?>" style="text-decoration: none;">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="<?php echo $row['product_images']; ?>" alt="Card image cap">
          <div class="card-body">
            <p class="card-text "> <span>
            <h3>For <?php echo getPetCategory($row['pet_category']); ?></h3>
              </span> </p>
            <p class="card-text "> <span><?php echo $row['product_name']; ?></span> </p>
            <div class="d-flex " style="text-align: center; justify-content:left;">
              <p class="card-text "> <span style="font-size: 20px; font-weight: 600;"><?php echo "Rs.". getDiscountedPrice($row['product_price'],10); ?></span> <span class="ml-2" style="text-decoration: line-through; font-size: 15px;"> <?php echo "RS.". $row['product_price'];?> </span> </span> <span class="ml-2" style="color: orange; font-weight: 800;"> (10% OFF)</span> </p>
            </div>
          </div>
        </div>
      </a>
       <?php } ?>
    
      </div>
      
    </div>
  </div>
  

 

 
 


<?php require_once "../components/footer.php"; ?>
</body>
</html>