<?php
include "../scripts/db_connect.php";
include_once "../scripts/functions.php";
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin Panel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <?php require_once "admin_components/admin_navbar.php" ?>
        <?php require_once "admin_components/admin_sidebar.php" ?>

        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Details</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="logout.php"
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <p>Below are some filtering options for convinience</p>
                            <p>Choose a filter option:</p>
                            <form action="products.php" method="get">
                                <select required name="what">
                                    <option value="ID">Search By Product ID</option>
                                    <option value="Name">Search By Product Name</option>
                                </select>
                                <input name="SearchBy" type="text" placeholder="Enter the value">
                                <input class="btn btn-primary" type="submit" value="Search">
                            </form>
                            <br><br>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <?php
                                            $headings = mysqli_query($conn, "Select * from products");
                                            if ($headings != null) {
                                                $res = mysqli_fetch_assoc($headings);
                                                $res = array_keys($res);
                                                for ($i = 0; $i < sizeof($res) - 1; $i++) {
                                                    ?>
                                                    <th scope="col" class=" border-top-0">
                                                        <?php echo str_replace('_', ' ', $res[$i]); ?>
                                                    </th>

<<<<<<< HEAD
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody id="an">
                                        <?php
                                        if (isset($_GET['SearchBy']) and isset($_GET['what']) and $_GET['what'] == 'Name' and $_GET['SearchBy'] != '') {
                                            $products = mysqli_query($conn, "select * from `products` where product_name like '%$_GET[SearchBy]%' or product_description like '%$_GET[SearchBy]%'");
                                        }
                                        else if(isset($_GET['SearchBy']) and isset($_GET['what']) and $_GET['what'] == 'ID' and $_GET['SearchBy'] != ''){
                                            $products = mysqli_query($conn, "select * from `products` where product_id=$_GET[SearchBy]");
                                        }
                                        else {
                                            $products = mysqli_query($conn, "Select * from products");
                                        }

                                        if ($products != null) {
                                            
                                        
                                        while ($curr = mysqli_fetch_row($products)) {
                                            echo "<tr style='max-width: 150px;'>";

                                            for ($j = 0; $j < 8; $j++) {
                                                if ($j == 4 or $j == 5) {
                                        ?>
                                                    <td>
                                                        <img width="40px" height="40px" src="<?php echo getImageName($curr[$j]); ?>">
=======
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $headings = mysqli_query($conn, "Select * from reviews");
                                            for ($i = 0; $i < mysqli_num_rows($headings); $i++) {
                                                $curr = mysqli_fetch_row($headings);
                                                for ($j = 0; $j < sizeof($curr); $j++) {

                                                    ?>
                                                    <td scope="row">
                                                        <?php echo $curr[$j]; ?>
>>>>>>> ae7f32b7e6675031acea312c717296e55e300e2a
                                                    </td>


                                                <?php } ?>



                                                <td>
                                                    <i><a
                                                            href="admin_scripts/delete_review.php?review_id=<?php echo $curr[0]; ?>"><img
                                                                title="Delete" width="20" height="20"
                                                                src="https://img.icons8.com/ios-glyphs/30/filled-trash.png"
                                                                alt="filled-trash" /></a></i>
                                                    <small><br>Delete</small>
                                                </td>
                                                </tr>
                                                <?php
                                            }
                                            } else {
                                                echo "<h4> The table is empty </h4>";
                                            } ?>
<<<<<<< HEAD

                                            <td>
                                                <i><a href="product_form.php?ProductID=<?php echo $curr[0]; ?>"><img title="Edit" width="20" height="20" src="https://img.icons8.com/ios-filled/50/edit--v1.png" alt="edit--v1" /></a></i>
                                                <small><br>Edit</small>
                                                <!-- This text can be removed -->
                                            </td>
                                            <td>
                                                <i><a href="../db_scripts/delete_product.php?ProductID=<?php echo $curr[0]; ?>"><img title="Delete" width="20" height="20" src="https://img.icons8.com/ios-glyphs/30/filled-trash.png" alt="filled-trash" /></a></i>
                                                <small><br>Delete</small>
                                            </td>
                                            </tr>
                                        <?php
                                        }}
                                        else {
                                            echo "<h3 style='color:red;text-align:center'>Wrong input</h3>";
                                        }
                                        ?>
=======
>>>>>>> ae7f32b7e6675031acea312c717296e55e300e2a
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <footer class="footer text-center"> 2023 © Admin Panel

    </div>

    </div>

    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>