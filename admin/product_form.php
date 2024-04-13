<?php

session_start();
function edit($index){
 require "../scripts/db_connect.php";
 require_once "../scripts/functions.php";

  if (isset($_GET['ProductID'])) {
    
    $product_id = $_GET['ProductID'];

      // a session varible for avoiding re-inserting the same data twice
      if (!isset($_SESSION['productID'])) {
        $_SESSION['productID'] = $product_id;
      }

      $query = "SELECT * from products where product_id=$product_id";
      $res = $conn->query($query);
        if($res = mysqli_fetch_array($res)){
          return $res[$index];
        }
      }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add New Movie</title>
  <style>
    body {
      font-family: Georgia, 'Times New Roman', Times, serif;
      background-image: url("../image/Admin.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 500px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      background: transparent;
      color: white;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .form-group textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      resize: vertical;
    }

    .form-group select {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .form-group button {
      padding: 10px 20px;
      background-color: red;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1 style="text-align: center;color:black;">Product Details</h1>
  <form action="testupload.php?ProductID=<?php echo $_GET['ProductID'];?>&update=<?php echo (isset($_GET['ProductID'])) ? "true" : "false" ;?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title"> Product Name:</label>
        <input type="text" id="title" name="product_name" required value="<?php echo edit(1);?>">
      </div>
      <div class="form-group">
        <label for="description"> Product Description:</label>
        <input type="textarea" class="form-control" id="description" name="description" required value="<?php echo edit(2);?>">
      </div>
      <div class="form-group">
        <label for="Ticket_price">Product Price:</label>
        <input type="text" id="Ticket_price" name="product_price" required value="<?php echo edit(3);?>">
      </div>
     
      <div class="form-group">
        <label for="thumbnail">Product Image:</label>
        <input type="file" <?php echo (!isset($_GET['ProductID'])) ? 'required' : ' ' ;  ?> id="thumbnail" name="image1">
      </div>
      <div class="form-group">
        <label for="thumbnail">Product Image2:</label>
        <input type="file" <?php echo (!isset($_GET['ProductID'])) ? 'required': '' ;  ?>  id="thumbnail" name="image2">
      </div>

      <div class="form-group">
        <label for="start_date">Product Category:</label>
        <input type="text" id="start_date" name="product_category" required value="<?php if(isset($_GET['ProductID'])) echo edit(6);?>">
      </div>
      <div class="form-group">
        <label for="end_date">Pet Category</label>
        <input type="text" id="end_date" name="pet_category" required value="<?php if(isset($_GET['ProductID'])) echo edit(7);?>">
      </div>
      
      <div class="form-group">
        <button type="submit">Add Product</button>
      </div>
    </form>
  </div>
</body>

</html>
