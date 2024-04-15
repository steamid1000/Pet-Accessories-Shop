<?php
include "../scripts/db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/14850a9668.js" crossorigin="anonymous"></script>

  <title>🐶😸Graps Product and Purchase Dates</title>
  <link href="css/style.min.css" rel="stylesheet">
</head>
<style>
  #myChart {
    overflow: scroll;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin1" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php require "admin_components/admin_navbar.php"; ?>
        <?php require "admin_components/admin_sidebar.php"; ?>
</div>
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">



    <?php




    // SQL query to retrieve data from the order table
    $sql = "SELECT  order_amount, order_date FROM orders";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Array to store the results
      $data = array();

      // Fetching data and adding it to the array
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }

      // Outputting the data in JSON format
      $json_data = json_encode($data);
    } else {
      echo "No data found";
    }
    ?>
    <div class="container d-flex mt-3 text-center">
      <p style="margin-left:32%; font-size:1.6rem; font-weight:600" class="mt-2 mb-3"> <span> <i
            class="fa-regular fa-file"></i></span> Order Amount and Date Graphical
        Representation <span> <span> <i class="fa-regular fa-file"></i></span></span></p>
    </div>
    <div class="container" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
      <canvas id="myChart" width="500" height="500"></canvas>


    </div>
    <script>
      console.log("Hello World!!");
      var emp = <?php echo $json_data; ?>;

      var orderAmounts = emp.map(function (order) {
        return order.order_amount;
      });
      var orderDates = emp.map(function (order) {
        return order.order_date;
      });


      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: orderDates, // Use order dates as labels
          datasets: [{
            label: 'Order Amount',
            data: orderAmounts, // Use order amounts as data
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
              beginAtZero: true
            }
          }
        }
      });

    </script>


  </div>

</body>



</html>