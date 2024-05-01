<?php
include "../scripts/db_connect.php";
include_once "../scripts/functions.php";
$today = date("Y-m-d");




?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Sales🐶😸</title>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php require_once "admin_components/admin_navbar.php" ?>
        <?php require_once "admin_components/admin_sidebar.php" ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Sales Details</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="logout.php" class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->


            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- //^Name Search section -->

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <p>Below are some filtering options for convinience</p>
                            <form action="sales.php" method="get">
                                <label for="date">Choose a Sales Date:</label>
                                <input type="date" name="singleDate">
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <br><br>
                            </form>

                            <p>Search Sales Between 2 Dates:</p>
                            <form action="sales.php" method="get">
                                <input name="from" type="date">
                                <span> - to - </span>
                                <input name="to" type="date" value="<?php echo $today; ?>">
                                <input class="btn btn-primary" type="submit" value="Search">
                            </form>
                            <br><br>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <?php {
                                                $headings = mysqli_query($conn, "Select * from `orders`");


                                                $res = mysqli_fetch_assoc($headings);

                                                $res = array_keys($res);
                                                for ($i = 0; $i < sizeof($res); $i++) {


                                                    if ($i == 1) {
                                                        echo "<th class='border-top-0'>product name</th>";
                                                    } else {
                                                        echo "<th class='border-top-0'>" . str_replace('_', ' ', $res[$i]) . "</th>";
                                                    }
                                                }
                                            } ?>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <tr>
                                            <?php
                                            $total = 0;
                                            $mostSold = array();
                                            if (isset($_GET['singleDate']) and $_GET['singleDate'] != " ") {
                                                $single = $_GET['singleDate'];
                                                $headings = mysqli_query($conn, "select * from `orders` where order_date='$single'");
                                            } else if ((isset($_GET['from']) and  isset($_GET['to'])) and ($_GET['from'] != " " and $_GET['to'] != " ")) {
                                                $from = $_GET['from'];
                                                $to = $_GET['to'];

                                                $headings = mysqli_query($conn, "select * from `orders` where order_date between '$from' and '$to' ORDER BY order_date ASC");
                                            } else if ((isset($_GET['from']) and isset($_GET['to'])) and ($_GET['from'] != " " and $_GET['to'] == '')) {
                                                $from = $_GET['from'];
                                                echo "came here";
                                                $headings = mysqli_query($conn, "select * from `orders` where order_date between '$from' and '$today' ORDER BY order_date ASC");
                                            } else {

                                                $headings = mysqli_query($conn, "Select * from orders where order_date='$today'");
                                            }


                                            //The below few lines are for charts 
                                            $result = $headings;
                                            if ($result->num_rows > 0) {
                                                // Array to store the results
                                                $data = array();

                                                // Fetching data and adding it to the array
                                                while ($row = $result->fetch_assoc()) {
                                                    $product_name = $conn->query("select product_name from products where product_id=$row[product_id]");
                                                    $product_name = mysqli_fetch_array($product_name);
                                                    $row["product_name"] = $product_name[0];
                                                    $data[] = $row;
                                                }

                                                // Outputting the data in JSON format
                                                $json_data = json_encode($data);
                                            } else {
                                                echo "No data found";
                                            }

                                            mysqli_data_seek($headings, 0); // reseting the pointer to the start of the data

                                            if ($headings != null) {

                                                for ($i = 0; $i < mysqli_num_rows($headings); $i++) {
                                                    $curr = mysqli_fetch_row($headings);
                                                    for ($j = 0; $j < sizeof($curr); $j++) {



                                                        if ($j == 3) {
                                                            $total += $curr[$j];
                                                            echo "<td scope='row'> $curr[$j] </td>";
                                                        } else if ($j == 1) {
                                                            if (array_key_exists($curr[$j], $mostSold)) {
                                                                $mostSold[$curr[$j]]++;
                                                            } else {
                                                                $mostSold[$curr[$j]] = 0;
                                                            }

                                                            $pname = $conn->query("select product_name from products where product_id='$curr[$j]'");
                                                            $pname = mysqli_fetch_array($pname);
                                                            echo "<td scope='row'> $pname[0]; </td>";
                                                        } else {
                                                            echo "<td scope='row'> $curr[$j] </td>";
                                                        }
                                                    }
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<h2 style='text-align:center;color:red'>No DATA FOUND!</h2>";
                                            } ?>




                                        </tr>

                                    </tbody>
                                </table>
                                <span style="font-size:large; text-align: right;color:green;text-decoration:underline">Total Sales: Rs <?php echo $total; ?> </span>
                                <h4 style="text-align: left;">Most sold Product: <span style="text-decoration: underline;"><?php if($mostSold != null){$most =  max($mostSold) ? max($mostSold) : array_rand($mostSold);
                                                                                                                            $pname = $conn->query("select product_name from products where product_id='$most'");
                                                                                                                            $pname = mysqli_fetch_array($pname);
                                                                                                                            echo $pname[0];}else {
                                                                                                                                echo "Search Away";
                                                                                                                            }?> </span> </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container ml-1 mt-1 mb-1 mr-1" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <h2  class="mt-2" style="text-align: center;font-weight:bolder;text-decoration:underline">Product Name and Order Amount</h2>
                    <canvas id="myChart" width="100%" height="500px"></canvas>
                </div>
            </div>

        </div>



        <footer class="footer text-center"> 2023 © Admin Panel
        </footer>

    </div>
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

    <script>
        var jsonData = <?php echo $json_data; ?>;


        var product_name = jsonData.map(function(order) {
            return order.product_name;
        })


        var product_amount = jsonData.map(function(order) {
            return order.order_amount;
        })


        console.log(jsonData);

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: product_name, // Use order dates as labels
                datasets: [{
                    label: 'Order Amount',
                    data: product_amount, // Use order amounts as data
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],


                    borderColor: 'rgba(54, 162, 235, 1)',

                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    </script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</html>