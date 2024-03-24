<?php 

$server = "localhost";
$username = "root";
$pass = "";
$db = "pet-accessories";

$conn = new mysqli($server,$username,$pass,$db);

if ($conn->connect_error) {
    echo "Failed to connect to the database";
}


?>