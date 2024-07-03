<?php session_start(); ?>
<?php
error_reporting(E_ERROR | E_PARSE);

include('connection.php');
$id = $_SESSION["lo"];
$pro = $_GET["as"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="selleradmin/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="selleradmin/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="selleradmin/css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
    
	-->
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="seller.php">
                    <img src="logo/adnox.png" alt="" height="60" width="80">
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="seller.php">
                                <i class="fas fa-angle-double-left"></i>
                                Go back
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="productseller.php">
                                <i class="fas fa-shopping-cart"></i>
                                Add product
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="accounts.html">
                                <i class="far fa-user"></i>
                                Accounts
                            </a>
                        </li> -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span>
                                    Settings <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Billing</a>
                                <a class="dropdown-item" href="#">Customize</a>
                            </div>
                        </li> -->
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php if ($id != null) { ?>

                                <a class="nav-link d-block " name="log" href="logoutseller.php">
                                    <b>Logout</b>
                                </a>
                            <?php } else { ?>
                                <a class="nav-link d-block" href="loginseller.php">
                                    <b>LogIn</b>
                                </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <div class="container tm-mt-big tm-mb-big">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="tm-block-title d-inline-block">Add Stock</h2>
                                </div>
                            </div>
                            <form action="addq.php?pro=<?=$pro?>" class="tm-edit-product-form" method="post">
                                <div class="row tm-edit-product-row">
                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="name">Quantity
                                            </label>
                                            <input id="name" name="qntity" type="number" class="form-control validate" min="1" max="20" required />
                                        </div>
                                        <div class="col-10">
                                            <input type="submit" class="btn btn-primary btn-block text-uppercase" name="qsub" value="add" id="submit" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>