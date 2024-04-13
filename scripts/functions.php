<?php

// This file will include many usefull funtion for the project

function getPetCategory($index){
    switch ($index) {
        case -1:
            return "Both";
        case 0:
            return "Cats";
        case 1:
            return "Dogs";
        case 2:
            return "Fish";
        case 3:
            return "Birds";
        case 4:
            return "Rabbits";
        default:
            return "Other";
    }
}

function getProductCategory($index){
    switch ($index) {
        case 0:
            return "Toys";
        case 1:
            return "Safety";
        case 2:
            return "Bedding";
        case 3:
            return "Fashion";
        case 4:
            return "Feeding";
        case 5:
            return "Walking";
        case 6:
            return "Grooming";
        case 7:
            return "Litter & Cleanup";
        case 8:
            return "Outdoor Gear";
        case 9:
            return "Travel";
        case 10:
            return "Furniture";
        default:
            return "Other";
    }
}

function getDiscountedPrice($price,$discount){ // return the discounted price of the product
    return ($price - ($price / $discount));
}

//functions to remove the extra tags from the image base64 string
function getImageName($current_name){
    if (str_contains($current_name,"<img src")){
        $img_name = substr($current_name,10);
        $img_name = substr($img_name,0,strlen($img_name)-3);
        return $img_name;
      }
      else {
        return $current_name;
      } 
}

//function to convert the image to base64
function convertToBase64($imagePath,$imageName){
    $path = $imagePath;
    $type = substr($imageName,strpos($imageName,'.',)+1,strlen($imageName));    
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64;
}

// seprate queries for each pet
function getActiveQuery($category){
    return "select * from products where pet_category=$category limit 12";

}

// a trial version of the user class
class user{ // we can store the user data instead of fetching the details every time we need from the database
    private $user_name;
    private $user_address;
    private $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getConnection(){
        include "db_connect.php";
        return $conn;
    }

    public function addOrder($data){
        // order_id 	product_id 	user_id 	order_amount 	order_address 	order_date 
        $connect = $this->getConnection();
        $note = $connect->prepare("insert into orders(product_id,user_id,order_amount,order_address,order_date) values(?,?,?,?,?)");
        $note->bind_param("sssss",$product_id,$this->user_id,$order_amount,$this->user_address,$order_date);
        $note->execute();
    }

    public function setData(){
        $connect = $this->getConnection();
        $set = $connect->query("select * from users where user_id=$this->user_id");
        $set = mysqli_fetch_assoc($set);
        
        $this->user_id = $set['user_id'];
        $this->user_name = $set['user_name'];
        $this->user_address = $set['user_address'];

        echo $this->user_name . " ";
        echo $this->user_address;
    }
}


?>