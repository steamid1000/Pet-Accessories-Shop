<?php
session_start();

?>

<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<style>
  .card:hover{
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        
    }
    .checked{    
        color: orange;
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
 
 form ::placeholder{
   
  font-size: 20px;
  
  /* left: ; */
  margin-left: 150px;

 }
 .mystars span{
  font-size: 3rem;;
  margin-left: 1rem;
 }
 #reviewform .review::placeholder {
  color: red;
}
#submitbtn{
  position: relative;
  width: 300px;;
  border-radius: 11px;
  margin-left: 3.3rem;
  height: 45px;
  margin-bottom: 2rem;
  margin-top: 1rem;
  background-color: #50C878;
  color: black;
  font-size:1.2rem;

}
  
</style>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 
  <title>Product Page</title>
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
          <img src="<?php echo getImageName($result['product_images']); ?>" class="col-md-6"  style="min-height: 100vh; max-height: 100vh; background-size: cover;" alt="">
          <img src="<?php echo getImageName($result['product_images2']); ?>" class="col-md-6"  style="min-height: 100vh; max-height: 100vh; background-size: cover;" alt="">
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
 
<!-- this is the rating section  -->

<?php // rating option will only be give to users that have placed the order and not given the review earlier
  $isOrdered = $conn->query("select user_id from orders where product_id=$productID");
  $isOrdered = mysqli_fetch_array($isOrdered);

  $isReviewed = $conn->query("select user_id from orders where product_id=$productID");
  $isReviewed = mysqli_fetch_array($isReviewed);

  if (($isOrdered == null or $isReviewed==null) or ((isset($_SESSION['user_id']) and array_search($_SESSION['user_id'],$isOrdered)  == false)) or (isset($_SESSION['user_id']) and array_search($_SESSION['user_id'],$isReviewed)  == false)) {
    
?>
<div class="container-fluid"  >

<div class="d-flex container justify-content-around"  >
 <div class="imgs mb-5" style="align-items: left;">
 <p  class="mt-5 mb-3" style="text-align:center; font-size:2rem; font-weight:700">How was your Product Experience?</p>
 <img src="../imgs/reviewme.png"  alt="" style="width:300px;margin-left:6rem"> </div>
<div class="stars"> 


<form  action="" id="reviewform" class="mt-5"  method="post">
        
 <div class="mystars mr-5" id="star">   
    <span class="fa fa-star " id="1"></span>
    <span class="fa fa-star " id="2"></span>
    <span class="fa fa-star " id="3"></span> 
    <span class="fa fa-star" id="4"></span>
    <span class="fa fa-star" id="5" ></span>
    <input type="hidden" value="0">
</div>
    <div class="review row">
        <input type="textarea" class="form-control mt-5 " style="width:80%;height:10rem; margin:auto" name="review" placeholder="share Feedback...">
        
      </div>
      <button class="submit" id="submitbtn"  >Submit Review</button>
    </form>
    </div>



             </div>

</div>
 
<?php } ?>











  <hr>
  <div class=" deals container-fluid mt-5">
    <p style="font-size:1.5rem;font-weight: 600;" >Special Deals</p>
    <div class="row d-flex justify-content-around align-items-around" >
    <?php 
  
      $result = $conn->query("Select * from products where pet_category=$category limit 4");
      while ($row = $result->fetch_assoc()) {
        
    ?>
      <a href="product.php?productID=<?php echo $row['product_id']; ?>" style="text-decoration: none;">
        <div class="card" style="width: 20rem;  max-height: 100%;">
          <img class="card-img-top" style="max-height:12.5rem;object-fit: contain;" src="<?php echo getImageName($row['product_images']); ?>" alt="product images">
          
          <div class="card-body" style="position:relative;">  
            <h3>For <?php echo getPetCategory($row['pet_category']); ?></h3>
              </span> </p>
            <p class="card-text "> <span><?php echo $row['product_name']; ?></span> </p>
            <div class="d-flex " style="text-align: center; justify-content:left; >
              <p class="card-text "> <span style="font-size: 20px; font-weight: 600;"><?php echo "Rs.". getDiscountedPrice($row['product_price'],10); ?></span> <span class="ml-2" style="text-decoration: line-through; font-size: 15px;"> <?php echo "RS.". $row['product_price'];?> </span> </span> <span class="ml-2" style="color: orange; font-weight: 800;"> (10% OFF)</span> </p>
            </div>
          </div>
        </div>
      </a>
        <?php } ?>
    </div>
  </div>
<hr>

 

 
 


<?php require_once "../components/footer.php"; ?>


<script>
const stars = document.querySelectorAll('.fa');
    let newItem,len ,yellowStar;
 
    stars.forEach(eachStar=>{
        eachStar.addEventListener('click',function(){
            newItem=this.id;
         
            // let htmlId=document.getElementById(newItem);
            // htmlId.classList.add('checked')
             len=parseInt(newItem);

             colorme();
            
            
        })
         
    })
   
    colorme=()=>{
        while(len>0){
         yellowStar=document.getElementById(len);
         yellowStar.classList.add('checked')
         len--;

         

    }

    }
   
    

         

         
         
        
       


       
 
</script>
</body>
</html>