<?php

if (isset($_GET['user_id'])) {
    require_once "../../scripts/db_connect.php";
    if(mysqli_query($conn,"Delete from users where user_id=$_GET[user_id]")){
        header("Location: ../user_table.php",true);
    }
    else{
        echo "Cannot delete the user";
    }
}
?>