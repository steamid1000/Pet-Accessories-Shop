<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "../scripts/db_connect.php";

  if (!isset($_SESSION['feedback'])) {
    $_SESSION['feedback'] = false;
  }
  
  $feedback_email = $_POST['feedback_email'];
  $feedback = $_POST['feedback'];
  $stm = $conn->prepare("insert into feedbacks(feedback_email,feedback) values(?,?)");
  $stm->bind_param("ss",$feedback_email ,$feedback);
  if($_SESSION['feedback'] == false)
  {
    if ($stm->execute()) {
      
      $_SESSION['feedback'] = true;
      echo "<div class='mb-0 alert alert- alert-dismissible fade show' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      <strong>Thanks for your feedback 🐶😸</strong> 
      </div>
      <script>
      $('.alert').alert();
      </script>";
    }
  }
  else {
    echo "<div class='mb-0 alert alert-danger alert-dismissible fade show' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    <strong>Failed to submit your feedback, please try again after sometime.</strong> 
    </div>
    
    <script>
    $('.alert').alert();
    </script>";
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐶😸Feedback</title>
</head>
<body>
    <?php require_once "../components/navbar.php"; ?>
    <div class="container">
    <form action="" method="post">

    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" name="feedback_email" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="feedback" class="form-label">Your Feedback</label>
  <textarea class="form-control" required id="feedback" name="feedback" rows="3"></textarea>
</div>
<button type="submit" class="btn btn-primary mb-5 " >Submit</button>

</form>
     
</div>



    <?php require_once "../components/footer.php"; ?>
</body>
</html>

