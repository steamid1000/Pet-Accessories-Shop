<?php
require "../scripts/db_connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $path = $_FILES['img1']['tmp_name'];
    $type = substr($_FILES['img1']['name'],strpos($_FILES['img1']['name'],'.',)+1,strlen($_FILES['img1']['name']));    
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    echo $base64;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file"  required name="img1">
        <button type="submit">Convert</button>
    </form>
</body>

</html>