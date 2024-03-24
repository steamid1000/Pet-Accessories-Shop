<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
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

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "../scripts/db_connect.php";

  $feedback_email = $_POST['feedback_email'];
  $feedback = $_POST['feedback'];

  $stm = $conn->prepare("insert into feedbacks(feedback_email,feedback) values(?,?)");
  $stm->bind_param("sss",$feedback_email ,$feedback);
  if($stm->execute())
  {
    echo "done";
  }
  else {
    echo "failed";
  }
}

?>