<?php

if (isset($_GET['user_id'])) {
    require_once "../../scripts/db_connect.php";
    if(mysqli_query($conn,"Delete from reviews where review_id=$_GET[review_id]")){
        header("Location: ../reviews.php",true);
    }
    else{
        echo "Cannot delete the user";
    }
}
?>