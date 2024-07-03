<?php session_start(); ?>
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
            <h2 class="tm-block-title">Products Lists</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">PRODUCT NO.</th>
                        <th scope="col">PRODUCT NAME</th>
                        <th scope="col">CATEGORY</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">PRODUCT IMAGE</th>
                    </tr>
                </thead>
                <?php
                include('connection.php');
                $qe = "SELECT * FROM `pro_tbl`";
                $res = mysqli_query($con, $qe);

                ?>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                        <tr>
                            <th scope="row"><b><?= $row["product_id"] ?></b></th>
                            <td>
                                <!-- <div class="tm-status-circle moving"></div> -->
                                <?= $row["product_name"] ?>
                            </td>
                            <td><b><?= $row["Category_id"] ?></b></td>
                            <td><b><?= $row["product_price"] ?></b></td>
                            <td><b><?= $row["Product_quantity"] ?></b></td>
                            <td><b><img src="main/images/products/<?= $row["product_image"] ?>" height="70" width="60"></b></td>
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