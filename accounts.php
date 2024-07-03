<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>accounts</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="selleradmin/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="selleradmin/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="selleradmin/css/templatemo-style.css">
    <script src="selleradmin/js/jquery-3.3.1.min.js"></script>
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


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
                            <a class="nav-link" href="admin.php">
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
                            <a class="nav-link active" href="accounts.php">
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
        <div class="col-16 tm-block-col" height="700%">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title">USER LIST</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">USER NO</th>
                            <th scope="col">USER NAME</th>
                            <th scope="col">USER PASSWORD</th>
                            <th scope="col">USER EMAIL</th>
                            <th scope="col">USER PHONE</th>
                            <th scope="col">USER STATUS</th>
                        </tr>
                    </thead>
                    <?php
                    include('connection.php');
                    $qe = "SELECT * FROM `user_table` WHERE `user_type`=0 or `user_type`=3 ";
                    $res = mysqli_query($con, $qe);

                    ?>
                    <tbody>

                        <?php
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                            <tr>
                                <th scope="row"><b><?= $row["user_id"] ?></b></th>
                                <td>
                                    <!-- <div class="tm-status-circle moving"></div> -->
                                    <?= $row["user_name"] ?>
                                </td>
                                <td><b><?= $row["user_password"] ?></b></td>
                                <td><b><?= $row["user_email"] ?></b></td>
                                <td><b><?= $row["user_phone"] ?></b></td>
                                <td>
                                    <a class="toggle-status" title="Toggle Status"  data-user-id="<?php echo $row['user_id']; ?>" data-toggle="tooltip">
                                        <?php if ($row['user_type'] == 0) { ?>
                                            <i class="fas fa-check text-success"></i>
                                        <?php } elseif ($row['user_type'] == 3) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } ?>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
        // Chart.defaults.global.defaultFontColor = 'white';
        // let ctxLine,
        //     ctxBar,
        //     ctxPie,
        //     optionsLine,
        //     optionsBar,
        //     optionsPie,
        //     configLine,
        //     configBar,
        //     configPie,
        //     lineChart;
        // barChart, pieChart;
        // DOM is ready
        // $(function() {
        //     drawLineChart(); // Line Chart
        //     drawBarChart(); // Bar Chart
        //     drawPieChart(); // Pie Chart

        //     $(window).resize(function() {
        //         updateLineChart();
        //         updateBarChart();
        //     });
        // })
        $(document).ready(function() {
            console.log("check");
            $('.toggle-status').click(function(e) {
                e.preventDefault();
                var userId = $(this).data('user-id');
               
                // send ajax request to update user status in database
                $.ajax({
                    url: 'deleteuser.php',  
                    type: 'POST',
                    data: {
                        user_id: userId,
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload(true);
                    }
                });
            });
        });
    </script>

</html>
<?php
$aj = $_SESSION['lg'];
if ($aj == 21) {
    // echo "<script>alert('$aj') </script>";
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