<?php
session_start();
require_once '../scripts/db_connect.php';
if (!isset($_SESSION['user_id'])) {
  header("Location: ../index.php", true);
  die();
}

$current_address = $conn->query("select user_address from users where user_id=$_SESSION[user_id]");
$current_address = mysqli_fetch_array($current_address);
$current_address = $current_address[0];

function change()
{
  if (isset($_GET['change']) and $_GET['change'] == 'same') {
    echo "<div class='mb-0 alert alert-danger alert-dismissible fade show' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    <strong>The current address and the new address are same🐶😸</strong> 
  </div>
  
  <script>
    $('.alert').alert();
  </script>";
  } else if (isset($_GET['change']) and $_GET['change'] == 'address') {

    echo "<div class='mb-0 alert alert-warning alert-dismissible fade show' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    <strong>Your address has been updated🐶😸</strong> 
  </div>
  
  <script>
    $('.alert').alert();
  </script>";
  }
  else if(isset($_GET['change']) and $_GET['change'] == 'pass'){
    echo "<div class='mb-0 alert alert-warning alert-dismissible fade show' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    <strong>Your password has been updated🐶😸</strong> 
  </div>
  
  <script>
    $('.alert').alert();
  </script>";
  }
  else if (isset($_GET['change']) and $_GET['change'] == 'both') {
    
    echo "<div class='mb-0 alert alert-warning alert-dismissible fade show' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    <strong>Both your's address and  password has been updated🐶😸</strong> 
  </div>
  
  <script>
    $('.alert').alert();
  </script>";
  }
}

change();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $new_address = $_POST['new_address'];

  if ($current_address == $new_address and $_POST['new_password'] == '') { // if same address is submitted


    header("Location: editProfile.php?change=same");
  } else if ($new_address != $current_address and $_POST['new_password'] == '') {
    // if different address is submitted without new password
    $stm = $conn->prepare("update users set user_address=? where user_id=?");
    $stm->bind_param("ss", $new_address, $_SESSION['user_id']);
    if ($stm->execute() == false) {
      echo mysqli_error($conn);
    }

    header("Location: editProfile.php?change=address");
  } else if ($new_address == $current_address and isset($_POST['new_password']) and $_POST['new_password'] != '') {
    // if different new password is submitted

    $stm = $conn->prepare("update users set user_password=? where user_id=?");
    $stm->bind_param("ss", $_POST['new_password'], $_SESSION['user_id']);
    if ($stm->execute() == false) {
      echo mysqli_error($conn);
    }

    header("Location: editProfile.php?change=pass");

   
  } else if ($new_address != $current_address and isset($_POST['new_password']) and $_POST['new_password'] != '') {
    // if different new password is submitted

    $stm = $conn->prepare("update users set user_address=?, user_password=? where user_id=?");
    $stm->bind_param("sss", $new_address, $_POST['new_password'], $_SESSION['user_id']);
    if ($stm->execute() == false) {
      echo mysqli_error($conn);
    }

    header("Location: editProfile.php?change=both");

  }
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>🐶😸Edit Profile</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
</head>
<style>
  form .form-group input {
    border: none;
    border-bottom: 1px solid silver;
  }

  h1 {
    font-weight: 600;
    font-family: "Roboto Condensed", sans-serif;
    font-optical-sizing: auto;
    text-transform: uppercase;

    font-style: normal;
  }

  .container-fluid .img-container img {
    min-height: 100%;
  }

  .img img {
    width: 100%;
    height: 100%;
  }
</style>

<body>
  <?php include_once '../components/navbar.php'; ?>

  <div class="container-fluid mt-5 d-flex">
    <div class="img" style="width: 50%">
      <img src="../imgs/changeprofile4.jpg" alt="" />
    </div>

    <div class="container mt-5 mb-5" style="max-width: 40%; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px">
      <h1 class="mt-3 mb-4 text-center">change profile</h1>
      <form onsubmit="return validatepass()" action="" method="post">
        <div class="form-group">
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Address" value="<?php echo $current_address ?>" name="new_address" />
        </div>

        <div class="form-group">
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="new_password" />
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" />
        </div>

        <button type="submit" class="btn btn-primary" style="margin-left: 40%">
          Submit
        </button>
      </form>
    </div>
  </div>
  <script>
    function validatepass() {
      let pass = document.getElementById("exampleInputPassword1").value;

      let pass2 = document.getElementById("exampleInputPassword2").value;

      if (pass != pass2) {
        alert("Passwords do not match!");

        return false;
      } else {
        return true;
      }
    }
  </script>
  <?php include_once '../components/footer.php'; ?>
</body>

</html>