<?php

// This file will include many usefull funtion for the project

function getPetCategory($index){
    switch ($index) {
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
            return "Food";
        case 1:
            return "Clothes";
        case 2:
            return "Leashes";
        default:
            return "Other";
    }
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