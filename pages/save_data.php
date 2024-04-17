<?php

session_start();
require_once "../scripts/db_connect.php";
echo "Hello world!!";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Read JSON data from the request body
  $json_data = file_get_contents("php://input");

  // Debug: Print out the request method
  echo "Request method: " . $_SERVER["REQUEST_METHOD"] . "<br>";

  // Debug: Print out the received JSON data
  echo "Received JSON data: ";
  var_dump($json_data);

  // Decode the JSON data into a PHP associative array
  $data = json_decode($json_data, true);

  // Check if decoding was successful
  if ($data === null) {
    // Handle null data, perhaps by sending an error response
    die("Error: Invalid JSON data received");
  }

  // Extract 'starId' from the decoded JSON data
  $starId = $data['starId'];

  // Now you can use $starId to insert the data into the database or perform other operations
  echo "Received starId55555: " . $starId;
} else {
  // Handle non-POST requests if needed
  die("Error: This script only accepts POST requests");
}

// $query=$conn->query('INSERT INTO `reviews` (`review_id`, `user_id`, `product_id`, `review_stars`, `review_description`, `review_date`) 
// VALUES (?, ?, '?', '$starId', 'ok', CURRENT_TIMESTAMP);
// ')

echo "final checking it right now" . $starId;



?>