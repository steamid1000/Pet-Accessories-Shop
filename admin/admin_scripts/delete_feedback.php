<?php

if (isset($_GET['feedback_id'])) {
    require_once "../../scripts/db_connect.php";
    if(mysqli_query($conn,"Delete from feedbacks where feedback_id=$_GET[feedback_id]")){
        header("Location: ../feedback.php",true);
    }
    else{
        echo "Cannot delete the user";
    }
}
?>