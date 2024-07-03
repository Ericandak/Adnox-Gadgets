<?php session_start();
include('connection.php');
$query = "SELECT * FROM `user_table`";
$result = mysqli_query($con, $query);
$numuser = mysqli_num_rows($result);
$query2 = "SELECT * FROM `pro_tbl`";
$result2 = mysqli_query($con, $query2);
$numpro = mysqli_num_rows($result2);
$order = "SELECT * FROM `order_tbl` WHERE `order_status`='pending'";
$orderres = mysqli_query($con, $order);
$numord = mysqli_num_rows($orderres);
$ordsales="SELECT `Order_date`,`total_price` FROM `order_tbl` ORDER BY `Order_date`";
$salesord = mysqli_query($con, $ordsales);
$data=array();
$dates=array();
while($sa=mysqli_fetch_array($salesord))
{
$data[]=$sa["total_price"];
$dates[]=$sa["Order_date"];
}
$dataj=json_encode($data);
$jsArray = array_map(function($date) {
    return date("M d, Y", strtotime($date));
}, $dates);

$jsLabels = json_encode($jsArray);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Admin - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" hre="selleradmin/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="selleradmin/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="selleradmin/css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js">
    </script>
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand kk" href="admin.php"><img src="logo/adnox.png" style="height: 80px;"></a>

                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="orderadmin.php">
                                <i class="fas fa-file-alt"></i>
                                orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">
                                <i class="fas fa-shopping-cart"></i>
                                Categories
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="accounts.php">
                                <i class="far fa-user"></i>
                                Accounts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="viewproducts.php">
                                <i class="fas fa-upload"></i>
                                Products
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <form action="" method="post">
                            <li class="nav-item">
                                <button input="submit" id="ds" name="logout">Logout</button>
                            </li>
                            <li>
                                <a class="btn" id="dk" href="index1.php">Login</a>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p> </p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
                <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="card text-white bg-dark o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-user"></i>
                            </div>
                            <div class="mr-5"><?= $numuser ?> Users</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="accounts.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5"><?= $numpro ?> products</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="viewproducts.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5"><?= $numord ?> pending Orders</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="orderadmin.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Sales</h2>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <!-- <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Performance</h2> -->
                        <canvas id="barChart"></canvas>
                    <!-- </div> -->
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 tm-block-col">
                    <!-- <div class="tm-bg-primary-dark tm-block tm-block-taller">
                        <h2 class="tm-block-title">Storage Information</h2> -->
                        <div id="pieChartContainer">
                            <canvas id="pieChart" class="chartjs-render-monitor" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                        <h2 class="tm-block-title">Notification List</h2>
                        <div class="tm-notification-items">
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Jessica</b> and <b>6 others</b> sent you new <a href="#"
                                            class="tm-notification-link">product updates</a>. Check new orders.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Oliver Too</b> and <b>6 others</b> sent you existing <a href="#"
                                            class="tm-notification-link">product updates</a>. Read more reports.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Victoria</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">order updates</a>. Read order information.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Laura Cute</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">product records</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Samantha</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">order stuffs</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Sophie</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">product updates</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Lily A</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">product updates</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Amara</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">product updates</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Cinthela</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">product updates</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                        </div>
                    </div>-->
            </div>
        </div>

        <!-- <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Orders List</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER NO.</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">OPERATORS</th>
                                    <th scope="col">LOCATION</th>
                                    <th scope="col">DISTANCE</th>
                                    <th scope="col">START DATE</th>
                                    <th scope="col">EST DELIVERY DUE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><b>#122349</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Moving
                                    </td>
                                    <td><b>Oliver Trag</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>485 km</b></td>
                                    <td>16:00, 12 NOV 2018</td>
                                    <td>08:00, 18 NOV 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122348</b></th>
                                    <td>
                                        <div class="tm-status-circle pending">
                                        </div>Pending
                                    </td>
                                    <td><b>Jacob Miller</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>360 km</b></td>
                                    <td>11:00, 10 NOV 2018</td>
                                    <td>04:00, 14 NOV 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122347</b></th>
                                    <td>
                                        <div class="tm-status-circle cancelled">
                                        </div>Cancelled
                                    </td>
                                    <td><b>George Wilson</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>340 km</b></td>
                                    <td>12:00, 22 NOV 2018</td>
                                    <td>06:00, 28 NOV 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122346</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Moving
                                    </td>
                                    <td><b>William Aung</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>218 km</b></td>
                                    <td>15:00, 10 NOV 2018</td>
                                    <td>09:00, 14 NOV 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122345</b></th>
                                    <td>
                                        <div class="tm-status-circle pending">
                                        </div>Pending
                                    </td>
                                    <td><b>Harry Ryan</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>280 km</b></td>
                                    <td>15:00, 11 NOV 2018</td>
                                    <td>09:00, 17 NOV 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122344</b></th>
                                    <td>
                                        <div class="tm-status-circle pending">
                                        </div>Pending
                                    </td>
                                    <td><b>Michael Jones</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>218 km</b></td>
                                    <td>18:00, 12 OCT 2018</td>
                                    <td>06:00, 18 OCT 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122343</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Moving
                                    </td>
                                    <td><b>Timmy Davis</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>218 km</b></td>
                                    <td>12:00, 10 OCT 2018</td>
                                    <td>08:00, 18 OCT 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122342</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Moving
                                    </td>
                                    <td><b>Oscar Phyo</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>420 km</b></td>
                                    <td>15:30, 06 OCT 2018</td>
                                    <td>09:30, 16 OCT 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122341</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Moving
                                    </td>
                                    <td><b>Charlie Brown</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>300 km</b></td>
                                    <td>11:00, 10 OCT 2018</td>
                                    <td>03:00, 14 OCT 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122340</b></th>
                                    <td>
                                        <div class="tm-status-circle cancelled">
                                        </div>Cancelled
                                    </td>
                                    <td><b>Wilson Cookies</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>218 km</b></td>
                                    <td>17:30, 12 OCT 2018</td>
                                    <td>08:30, 22 OCT 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122339</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Moving
                                    </td>
                                    <td><b>Richard Clamon</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>150 km</b></td>
                                    <td>15:00, 12 OCT 2018</td>
                                    <td>09:20, 26 OCT 2018</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>-->
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved.
                </p>
                <input type="hidden" id="num1" value='<?=$numord?>' >
            </div>
        </footer>
    </div>

    <script src="selleradmin/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="selleradmin/js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="selleradmin/js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="selleradmin/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="selleradmin/js/tooplate-scripts.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function() {
            drawLineChart(); // Line Chart
            // drawBarChart(); // Bar Chart
            // drawPieChart(); // Pie Chart

            $(window).resize(function() {
                updateLineChart();
                updateBarChart();
            });
        })
        var num1=document.getElementById("num1").value
        
    var jsString = JSON.parse('<?php echo $jsLabels; ?>');

        function drawLineChart() {
            if ($("#lineChart").length) {
                ctxLine = document.getElementById("lineChart").getContext("2d");
                optionsLine = {
                    scales: {
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: "Sales"
                            }
                        }]
                    }
                };

                // Set aspect ratio based on window width
                optionsLine.maintainAspectRatio =
                    $(window).width() < width_threshold ? false : true;

                configLine = {
                    type: "line",
                    data: {
                        labels:jsString,
                        datasets: [{
                                label: "Sales",
                                data: JSON.parse('<?php echo $dataj; ?>'),
                                fill: false,
                                borderColor: "rgb(75, 192, 192)",
                                cubicInterpolationMode: "monotone",
                                pointRadius: 0
                            }
                        ]
                    },
                    options: optionsLine
                };

                lineChart = new Chart(ctxLine, configLine);
            }
        }
    </script>
</body>

</html>

<?php
$aj = $_SESSION['lg'];
if ($aj == 21) {
    echo "<script>$('#dk').hide(); </script>";
    echo "<script>$('#ds').show();</script>";
    // echo "<script>$('#pp').show();</script>";
    if (isset($_POST["logout"])) {
        session_destroy();
        unset($_SESSION['lg']);
        $u = "index1.php";
        echo "<script>location.href='$u'</script>";
    }
} else {
    echo "<script>$('#dk').show(); </script>";
    echo "<script>$('#ds').hide(); </script>";
    // echo "<script>$('#po').hide();</script>";
    // echo "<script>$('#pp').hide();</script>";
}
?>