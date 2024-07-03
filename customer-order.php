<?php session_start(); ?>
<?php
include('connection.php');
$id = $_SESSION["lg"];
if ($id) {
  $id = $_SESSION["lg"];
  $query = "SELECT * FROM `user_table` WHERE `user_id` = '$id'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  $target = $row["usr_img"];
  $add = "SELECT *  FROM `address_tbl` WHERE `user_id` = '$id'";
  $radd = mysqli_query($con, $add);
  $rd = mysqli_fetch_array($radd);
  $order = "SELECT order_tbl.Order_id,order_tbl.order_status,tbl_orddetails.ord_quantity,tbl_orddetails.product_id FROM order_tbl JOIN tbl_orddetails on order_tbl.Order_id=tbl_orddetails.order_id";
  $orderres = mysqli_query($con, $order);
  


  //  $query1 = "SELECT * FROM `login_p` 
  // 			 WHERE `id` = '$id'";
  //  $result1 = mysqli_query($con,$query1);
  //  $row1 = mysqli_fetch_array($result1);
  //  $uname = $row1["mail"];
} else {
  $target = "index1.php";
}
$query2 = "SELECT * FROM `pro_tbl`";
$result2 = mysqli_query($con, $query2);
$cr = "SELECT * FROM `tbl_cart` Where `user_id`='$id'";
$r = mysqli_query($con, $cr);
$ef = mysqli_num_rows($r);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Orders</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Bootstrap Select-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/bootstrap-select/css/bootstrap-select.min.css">
  <!-- Price Slider Stylesheets -->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/nouislider/nouislider.css">
  <!-- Custom font icons-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/css/custom-fonticons.css">
  <!-- Google fonts - Poppins-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700">
  <!-- owl carousel-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/owl.carousel/assets/owl.carousel.css">
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/owl.carousel/assets/owl.theme.default.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/img/favicon.ico">
  <!-- Modernizr-->
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/js/modernizr.custom.79639.js"></script>
  <link rel="stylesheet" href="main/css/searchstyle.css">
  <link rel="stylesheet" href="main/css/animate.css">

  <link rel="stylesheet" href="main/css/owl.carousel.min.css">
  <link rel="stylesheet" href="main/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="main/css/magnific-popup.css">

  <link rel="stylesheet" href="main/css/flaticon.css">
  <link rel="stylesheet" href="main/css/style.css">
  <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <!-- navbar-->

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand kk" href="index.php"><img src="logo/adnoxblack.png" style="height: 80px;"></a>
			<div class="order-lg-last btn-group">
				<a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="pp">
					<span class="flaticon-shopping-bag"></span>
					<div class="d-flex justify-content-center align-items-center"><small><?= $ef ?></small></div>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<div class="dropdown-item d-flex align-items-start" href="#">
						<div class="img" style="background-image: url(main/images/);"></div>
						<div class="text pl-3">
							<h4>A</h4>
							<p class="mb-0"><a href="#" class="price"></a><span class="quantity ml-3">Quantity:
									01</span></p>
						</div>
					</div>
					<div class="dropdown-item d-flex align-items-start" href="#">
						<div class="img" style="background-image: url(images/);"></div>
						<div class="text pl-3">
							<h4>B</h4>
							<p class="mb-0"><a href="#" class="price"></a><span class="quantity ml-3">Quantity:
									02</span></p>
						</div>
					</div>
					<div class="dropdown-item d-flex align-items-start" href="#">
						<div class="img" style="background-image: url(images/);"></div>
						<div class="text pl-3">
							<h4>Citadelle</h4>
							<p class="mb-0"><a href="#" class="price"></a><span class="quantity ml-3">Quantity:
									01</span></p>
						</div>
					</div>
					<a class="dropdown-item text-center btn-link d-block w-100" id="pi" href="cart.php">
						View All
						<span class="ion-ios-arrow-round-forward"></span>
					</a>
				</div>
			</div>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class=" navbar-collapse" id="ftco-nav">
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" id="search_bar_input" name="search_bar_input" onkeyup="searchFunc()">
					<div class="search_display_box search_hide" id="db_result_box">

				</form>
			</div>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="index1.php" class="nav-link" id="ek">Login</a></li>
				<li class="nav-item"><a href="customer-order.php" class="nav-link" id="ek">My Orders</a></li>
				<li class="nav-item dropdown">
					<div class="d-flex gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
						<img src=<?php
									echo "main/images/profiles/" . $target; ?> alt="Avatar" class="img-fluid my-3 rounded-circle dropdown-toggle" style="width: 50px;height:50px " id="ak" />
					</div>
					<div class="dropdown-menu" aria-labelledby="dropdown04" style="background:white;">
						<a class="dropdown-item" href="profile.php" id="as" style="color:black;">View profile</a>
						<!-- <a class="dropdown-item" href="product-single.html">Single Product</a> -->
						<a class="dropdown-item" href="customer-orders.php" style="color:black;">My Orders</a>
						<form action="#" method="post">
							<input type="submit" class="dropdown-item" name="log" value="log out" style="color:black;"></input>
						</form>
					</div>
				</li>
			</ul>
		</div>
		</div>
	</nav>
  <section class="hero-wrap hero-wrap-2" style="background-image: url('main/images/bg1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate mb-5 text-center">
          <!-- <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span><a href="product.html">Products<i class="fa fa-chevron-right"></i></a></span> <span>Explore<i class="fa fa-chevron-right"></i></span></p> -->
          <h2 class="mb-5 bread">Orders</h2>
        </div>
      </div>
    </div>
  </section>
  <section class="padding-small">
    <div class="container">
      <div class="row">
        <!-- Customer Sidebar-->
        

        <div class="col-lg-12 col-xl-12 pl-lg-6">
          <div class="basket basket-customer-order">
            <div class="basket-holder">
              <div class="basket-header" style="background-color:black;">
                <div class="row bg-black">
                  <th>
                    <div class="col-4">Image</div>
                    <div class="col-2">Products name</div>
                    <div class="col-2">Order_id</div>
                    <div class="col-2">Order Status</div>
                    <div class="col-2">Action</div>
                  </th>
                </div>
              </div>
              <div class="basket-body">
                <?php
                $count = 0;
                while ($orderfet = mysqli_fetch_array($orderres)) {
                  $product_id=$orderfet['product_id'];
                  $orderpro="SELECT * FROM `pro_tbl` where `product_id`='$product_id'";
                  $respro=mysqli_query($con,$orderpro);
                  while($prodet=mysqli_fetch_array($respro))
                  {
                  $count = $count + 1;
                ?>
                  <div class="item">
                    <div class="row d-flex align-items-center">
                      <div class="col-4">
                      <div class="d-flex align-items-center"><img src="main/images/products/<?= $prodet['product_image'] ?>" alt="..." class="img-fluid"></div>
                      </div>
                      <div class="col-2"><span><?= $prodet["product_name"] ?></span></div>
                      <div class="col-2"><span><?= $orderfet["Order_id"] ?></span></div>
                      <div class="col-2"><?= $orderfet["order_status"] ?></div>
                      <div class="col-2"><a href="ordview.php?oid=<?=$orderfet['Order_id']; ?>"><span class="flaticon-visibility"></span></a>/<a href="delorder.php?odid=<?=$orderfet['Order_id']; ?>"><span class="fa fa-trash"></span></a></div>
                    </div>
                  </div>
                <?php
                } 
              }?>
                <!-- Product-->
              </div>
              <div class="basket-footer">
                <div class="item">
                </div>
              </div>
            </div>
          </div>
          <div class="row addresses">
            <div class="col-sm-6">
              <div class="block-header">
                <h6 class="text-uppercase">Invoice address</h6>
              </div>
              <div class="block-body">
                <p><?= $rd["House"] ?>,<?= $rd["street"] ?>,<?= $rd["city"] ?><br><?= $rd["state"] ?>,<?= $rd["Pin"] ?></p>
              </div>
            </div>
          </div>
          <!-- /.addresses                           -->
        </div>
      </div>
    </div>
  </section>
  <!-- Footer-->
  <footer class="ftco-footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-sm-12 col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2 logo"><a href="#">Adnox <span>Gadgets</span></a></h2>
            <p>Far far away, behind the word mountains, far from the countries.</p>
            <ul class="ftco-footer-social list-unstyled mt-2">
              <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-12 col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">My Accounts</h2>
            <ul class="list-unstyled">
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>My Account</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Register</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Log In</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>My Order</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-12 col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Information</h2>
            <ul class="list-unstyled">
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About us</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Catalog</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact us</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Term &amp; Conditions</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-12 col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Quick Link</h2>
            <ul class="list-unstyled">
              <li><a href="register.php"><span class="fa fa-chevron-right mr-2"></span>New User</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Help Center</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Report Spam</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-12 col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map marker"></span><span class="text">Adnox accessories Pulpally,Wayanand,Kerala 673579</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text"> +918592978534</span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">adnoxgad@gmail.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid px-0 py-5 bg-black">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <p class="mb-0" style="color: rgba(255,255,255,.5);"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>
                document.write(new Date().getFullYear());
              </script> All rights reserved
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- JavaScript files-->
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/jquery/jquery.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/nouislider/nouislider.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/jquery-countdown/jquery.countdown.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/masonry-layout/masonry.pkgd.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="main/js/jquery.min.js"></script>
  <script src="main/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="main/js/popper.min.js"></script>
  <script src="main/js/bootstrap.min.js"></script>
  <script src="main/js/jquery.easing.1.3.js"></script>
  <script src="main/js/jquery.waypoints.min.js"></script>
  <script src="main/js/jquery.stellar.min.js"></script>
  <script src="main/js/owl.carousel.min.js"></script>
  <script src="main/js/jquery.magnific-popup.min.js"></script>
  <script src="main/js/jquery.animateNumber.min.js"></script>
  <script src="main/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="main/js/google-map.js"></script>
  <script src="main/js/main.js"></script>
  <!-- masonry -->
  <script>
    $(function() {
      var $grid = $('.masonry-wrapper').masonry({
        itemSelector: '.item',
        columnWidth: '.item',
        percentPosition: true,
        transitionDuration: 0,
      });

      $grid.imagesLoaded().progress(function() {
        $grid.masonry();
      });
    })
    function searchFunc() {
			var search = document.getElementById("search_bar_input").value;
			var element = document.getElementById("db_result_box");
			if (search != "") {
				element.classList.remove("search_hide");
				element.classList.add("search_show");
				$.ajax({
					url: "search.php",
					method: "POST",
					data: {
						text: search
					},
					success: function(data) {
						$('.search_display_box').html(data);
					}
				});
			} else {
				element.classList.remove("search_show");
				element.classList.add("search_hide");
			}

		}
  </script>
  <!-- Main Template File-->
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/js/front.js"></script>
</body>

</html>
<?php
$aj = $_SESSION['lg'];
if ($aj > 0) {
  echo "<script>$('#ek').hide(); </script>";
  echo "<script>$('#ak').show();</script>";
  echo "<script>$('#pp').show();</script>";
  // echo "<script>$('#pp').show();</script>";
  if (isset($_POST["log"])) {
    session_destroy();
    unset($_SESSION['lg']);
    $u = "index1.php";
    echo "<script>location.href='$u'</script>";
  }
} else {
  echo "<script>$('#ak').hide(); </script>";
  echo "<script>$('#ek').show(); </script>";
  echo "<script>$('#pp').hide(); </script>";
  // echo "<script>$('#po').hide();</script>";
  // echo "<script>$('#pp').hide();</script>";
}
?>