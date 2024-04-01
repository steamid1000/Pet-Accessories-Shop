<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../scripts/db_connect.php');
    $usr = $_POST['user_email'];
    $pass = $_POST['user_pass'];

    echo $usr;
    echo $pass . "<br>";
    $result = $conn->query("select `user_id` from `users` where user_email='$usr' and user_password='$pass'");
    if ($result != false) {
        $result = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $result[0];
        header('Location:../newindex.php',true);
    }
    else {
        echo "failed";
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body{    
    margin: 0;;
    padding: 0;
    width:100vw;
    height: 100vh;
    font-family: "Roboto Mono", monospace;
    /* background: linear-gradient(120deg,#29809b,#8e44ad); */
    background-image: url('../imgs/hero2.jpg');
    /* background-repeat: no-repeat; */
 background-position: center;
 background-repeat:no-repeat;
 background-size: cover;
 overflow: hidden;

    
    background-position: center;
    height: 100vh;
    font-family:  "Poppins", sans-serif;;
    
    overflow: hidden;
}
.center{
    position: absolute;
    top:50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 400px;
    background: white;
    border-radius: 10px;

}
.center h1{
    
    font-family: "Roboto Mono", monospace;
    
  /* font-family: "Inter", sans-serif; */
    text-align: center;
    padding: 0 0 20px 0;
    border-bottom: 1px solid silver;
}
.center form{
    padding: 0 40px;
    box-sizing: border-box;
}
form .txt_field{
position: relative;
border-bottom: 2px solid #adadad;
margin: 30px 0 ;
}
.txt_field input{
    width: 100%;
    padding: 0 5px;
    height: 40px;;
    font-size: 16px;
    border: none;
    outline: none;
    
  font-family: "Inter", sans-serif;

}
.txt_field label{
    position: absolute;
    top: 50%;
    
  font-family: "Inter", sans-serif;
    left: 5px;
    color: #adadad;
    transform: translateY(-50%);   
    font-size: 16px;
    pointer-events: none;
    transition: .9s;;    
}
.txt_field span::before{
    content: '';
    position: absolute;
    top: 40px;
    left: 0;
    width: 0;
    height: 2px;
    background:#2691d9;
    transition: .9s;
}
.txt_field input:focus~label,
.txt_field input:valid~label{
top: -5px;
color: #2691d9;

}
.txt_field input:focus~span::before,
.txt_field input:valid~span::before{
    width: 100%;
}
.pass{
    margin: -5px,0,20px,5px; 
    color: #a6a6a6;
    cursor: pointer;

}
 
input[type="submit"]{
    width: 100%;
    height: 50px;
    border: 1px solid ;
    background: #2691d9;;
    border-radius: 20px;;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;

}
input[type="submit"]:hover{
    border-color:#2691d9 ;
    transition: .7s;;
}
.signup_link{
    margin: 30px 0;
    text-align: center;
    font-size: 16px;;
    color: #666666;
    text-decoration: none;;
}
.signup_link a{
    color: #2691d9;
    text-decoration: none;

}
  #link:hover{
    text-decoration: underline;
     
}
#notice{
    width: 80%;
    height: 44px;
    /* border: 2px solid blue; */
    margin-bottom: 15px;
    margin-top: 5px;
    margin: auto;
    margin-top: 5px;
}
.center{
    margin-bottom: -100px;
    margin-top: 50px;
}
    </style>
      
</body>
</head>
<body>
    <?php require_once "../components/navbar.php" ?>
    <div class="advice" id="notice"> </div>
    <div class="center">
        <h1 style="color:black">Login</h1>
        <form  action="" method="post" >
           

            <div class="txt_field">
                <input type="email" name="user_email" id="" required>
                <span></span>
                <label >Email</label>
            </div>
 

            <div class="txt_field">
                <input type="password" name="user_pass" id="pass" required>
                <span></span>
                <label >Password</label>
            </div>
             

            <div class="pass mb-4">
                <input type="submit" value="Login">
                <!-- <div class="signup_link">
                     Already a Member?  <a href="login.php"  id="link" >login here</a>
                </div> -->
            </div>

        </form>
    </div>
   
</html>


