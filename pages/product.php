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
  <?php require_once "../components/navbar.php"; ?>
  
  <div class="container-fluid mt-5 mb-5 ">
    <div class="row col-12">
      <div class=" col-md-8">
        <div class="row">
          <img src="../imgs/bunny.jpg" class="col-md-6"  style="min-height: 100vh; max-height: 100vh; background-size: cover;" alt="">
          <img src="../imgs/bird.jpg" class="col-md-6"  style="min-height: 100vh; max-height: 100vh; background-size: cover;" alt="">
        </div>
      </div>
     

    <div class="col-md-4">
        <p id="pname">Pedigree</p>
        <p>Lorem ipsum dolor sit amet consectetur.</p>
          
          <p> <span style="font-size: 20px; font-weight: 600;"> Rs.500 </span> <span style="text-decoration: line-through; font-size: 15px; font-weight:100"> MRP Rs.800</span>  <span style="color: orange; font-weight: 600;">(10% OFF)</span></p>
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
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis pariatur fugit nesciunt, quia et harum assumenda odio quam commodi deleniti aliquid deserunt iste tenetur aperiam porro, rem at, natus mollitia veniam aliquam voluptatibus ab hic dolorem a? Totam in sunt cupiditate id explicabo, earum natus quaerat ex autem facilis inventore beatae aut veniam fugiat officia delectus, numquam amet quam voluptatum velit! Saepe quaerat a provident deserunt, perferendis cumque non esse beatae consequuntur obcaecati rem debitis aliquam. Voluptatem animi impedit, dicta esse assumenda accusantium veritatis officia a harum expedita quae numquam maxime. Distinctio totam, soluta id dolorum quam doloribus repudiandae repellendus!</p>


  </div>

   
      </div>
  </div>

  <hr>
  <div class="container-fluid mt-5 mb-5" id="simprod" > 
    <p style="font-size: 1.5rem; font-weight:700;">Similar Products</p>
    <div class="row d-flex justify-content-between">
    <a href="#" style="text-decoration: none;">
    <div class="card" style="width: 18rem;" >
        <img class="card-img-top" src="../pet parent/bird.jpg" alt="Card image cap">
        <div class="card-body">
          <p class="card-text "> <span style="font-size: 1.5rem; font-weight: 600;"> For Cat</span> </p>
          <p class="card-text "> <span> product name</span> </p>
          <div class="d-flex " style="text-align: center; justify-content:left;">  
          <p class="card-text "> <span  style="font-size: 20px; font-weight: 600;">Rs. 8000</span> <span class="ml-2" style="text-decoration: line-through; font-size: 15px;"> RS.10000  </span> </span> <span class="ml-2" style="color: orange; font-weight: 800;"> (10% OFF)</span> </p>
        </div>
    </div>
      </div>
    </a>
       
    
      </div>
      
    </div>
  </div>
  

 

 
 


<?php require_once "../components/footer.php"; ?>
</body>

</html>