
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <title>Login</title>

    <style>

 body{
    margin: 0;;
    padding: 0;
    font-family: monospace;
    background: linear-gradient(120deg,#29809b,#8e44ad);
    height: 100vh;
    background-image: url('./imgs/hero2.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    
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
    text-align: center;
    font-family: "Roboto Mono", monospace;
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
    left: 5px;
    color: #adadad;
    transform: translateY(-50%);   
    font-size: 16px;
    pointer-events: none;
    transition: .9s;;    
    font-family: "Inter", sans-serif;
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
    font-family: "Inter", sans-serif;
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
    </style>
</head>
<body>
    <?php require_once "../components/navbar.php" ?>
    <div class="center">
        <h1 style="color:black">Login</h1>
        <form action="" method="post">
            <div class="txt_field">
                <input type="text" name="" id="" required>
                <span></span>
                <label >username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="" id="" required>
                <span></span>
                <label >password</label>
            </div>
            <div class="pass">
                <input type="submit" value="Login">
                <div class="signup_link">
                     not a member?  <a href="#"  id="link" >signup</a>
                </div>
            </div>

        </form>
    </div>
</body>
</html>