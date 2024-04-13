<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../scripts/db_connect.php';
    require_once '../scripts/functions.php';

    //General details of the movie form
    $title = $_POST['product_name'];
    $description = $_POST['description'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $pet_category = $_POST['pet_category'];

    $product_id = (isset($_GET['ProductID'])) ? $_GET['ProductID'] : -1;

    //lets take the image here only
     $image1Given = false;
     $image2Given = false;

     if ( is_uploaded_file($_FILES['image1']['tmp_name']) == true) {
        $image1Given = true;
        if ( is_uploaded_file($_FILES['image2']['tmp_name']) == true) {
            $image2Given = true;
        }
     }


     echo $image1Given;

     
     $image1 = ($image1Given) ? convertToBase64($_FILES['image1']['tmp_name'],$_FILES['image1']['name']) : "null"; 
     $image2 = ($image2Given) ? convertToBase64($_FILES['image2']['tmp_name'],$_FILES['image2']['name']) : "null"; 


    if ((isset($_GET['update']) and $_GET['update'] == "true") and $image1Given == false) {
        $stmt = $conn->prepare("UPDATE `products` SET `product_name`=?,`product_description`=?,`product_price`=?,`product_category`=?,`pet_category`=? WHERE product_id=?");
        $stmt->bind_param("ssssss",$title,$description,$product_price,$product_category,$pet_category,$product_id);
        $stmt->execute();
    }
    elseif ((isset($_GET['update']) and $_GET['update'] == "true") and $image1Given == true) {
        $stmt = $conn->prepare("UPDATE `products` SET `product_name`=?,`product_description`=?,`product_price`=?, `product_images`=?, `product_images2`=?,`product_category`=?,`pet_category`=? WHERE product_id=?");
        $stmt->bind_param("ssssssss",$title,$description,$product_price,$image1,$image2,$product_category,$pet_category, $product_id);
        $stmt->execute();
    }

    else {
        //Adding in the prdoduct table
        $stmt = $conn->prepare("INSERT INTO `products`(`product_name`, `product_description`, `product_price`, `product_images`, `product_images2`, `product_category`, `pet_category`) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss",$title,$description,$product_price,$iamge1,$image2,$product_category,$pet_category);
        $stmt->execute();
    
    }

  
       header("Location: products.php",true);
    } else {
        header('Location: admin.php', true);
    }


?>