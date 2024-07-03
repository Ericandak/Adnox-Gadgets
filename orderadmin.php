<?php session_start();
$today = date('Y-m-d'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="selleradmin/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="selleradmin/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="selleradmin/css/templatemo-style.css">
    <script src="selleradmin/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="selleradmin/js/moment.min.js"></script>
    <script>
        $(document).ready(function() {

            $('select').change(function() {
                var quanti = $(this).val();
                var id = $(this).attr('data-crtid');
                $.ajax({
                    type: "GET",
                    url: "update_order.php",
                    data: {
                        status: quanti,
                        idk: id
                    },
                    success: function(response) {
                        $('#reportsPage').html(response);
                    }
                });
            });

        })
    </script>
</head>

<body id="reportsPage">
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
                            <i class="fas fa-tachometer-alt"></i> Dashboard
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
                        <a class="nav-link active" href="products.php">
                            <i class="fas fa-shopping-cart"></i> Categories
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="accounts.php">
                            <i class="far fa-user"></i> Accounts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewproducts.php">
                            <i class="fas fa-upload"></i> Products
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
            <form action="salestoday.php?date=<?= $today ?>" method="POST">

                <div class="row">
                    <div class="col-3">
                        <h2 class="tm-block-title">Products Lists</h2>
                    </div>

                    <div class="col-9 d-flex justify-content-end">
                        <div style="display: inline-block; margin-right: 20px;" class="">
                            <h6 class="text-white" style="margin-bottom: 5px;">Start Date:</h6>
                            <input type="date" name="date1" style="margin-left: 8%;" max="<?php echo date('Y-m-d'); ?>" onchange="updateEndDateMin()">
                        </div>
                        <div style="display: inline-block;">
                            <h6 class="text-white" style="margin-bottom: 5px;">End Date:</h6>
                            <input type="date" name="date2" max="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>

                    <script>
                        function updateEndDateMin() {
                            var startDate = new Date(document.getElementsByName('date1')[0].value);
                            var endDateInput = document.getElementsByName('date2')[0];
                            var minEndDate = new Date(startDate.getTime() + (24 * 60 * 60 * 1000)); // Add one day to start date
                            endDateInput.min = minEndDate.toISOString().slice(0, 10);
                        }
                    </script>

                    <div class="col-12 mt-3 d-flex flex-row-reverse">
                        <input class="btn btn-secondary tm-block-title" type="submit" value="generate sales" name="sub" style="margin-left: 80%; margin-bottom: 2%;"></a>
                    </div>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Order date</th>
                        <th scope="col">Total price</th>
                        <th scope="col">Order Status</th>
                    </tr>
                </thead>
                <?php
                include('connection.php');
                $qe = "SELECT * FROM `order_tbl`";
                $res = mysqli_query($con, $qe);
                ?>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                        <tr>
                            <td><b><?= $row["Order_date"] ?></b></td>
                            <td><b><?= $row["total_price"] ?></b></td>
                            <td> <select name="ord_quantity" id="ord_quantity<?= $row['Order_id'] ?>" data-crtid="<?php echo $row['Order_id'] ?>">


                                    <option value="pending" <?php if ($row['order_status'] == 'pending') {
                                                                echo 'selected';
                                                            } ?>>pending</option>
                                    <option value="dispatched" <?php if ($row['order_status'] == 'dispatched') {
                                                                    echo 'selected';
                                                                } ?>>dispatched</option>
                                    <option value="delivered" <?php if ($row['order_status'] == 'delivered') {
                                                                    echo 'selected';
                                                                } ?>>delivered</option>
                                </select></td>
                        </tr>
                </tbody>
            <?php
                    }
            ?>
            </table>
        </div>
    </div>
    </div>
    </div>

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