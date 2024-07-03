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

	//  $query1 = "SELECT * FROM `login_p` 
	// 			 WHERE `id` = '$id'";
	//  $result1 = mysqli_query($con,$query1);
	//  $row1 = mysqli_fetch_array($result1);
	//  $uname = $row1["mail"];
} else {
	$target = "index1.php";
}
$query2 = "SELECT * FROM `pro_tbl` LIMIT 8";
$result2 = mysqli_query($con, $query2);
$cr = "SELECT * FROM `tbl_cart` Where `user_id`='$id'";
$r = mysqli_query($con, $cr);
$ef = mysqli_num_rows($r);
$cat = "select * from `category_tbl`";
$qcat = mysqli_query($con, $cat);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="main/css/animate.css">

	<link rel="stylesheet" href="main/css/owl.carousel.min.css">
	<link rel="stylesheet" href="main/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="main/css/magnific-popup.css">

	<link rel="stylesheet" href="main/css/flaticon.css">
	<link rel="stylesheet" href="main/css/style.css">
	<link rel="stylesheet" href="main/css/searchstyle.css">
	<!-- <style>
		#myCarousel {
			margin-top: 50px;
		}

		@media (max-width: 768px) {
			.carousel-inner .carousel-item>div {
				display: none;
			}

			.carousel-inner .carousel-item>div:first-child {
				display: block;
			}
		}

		.carousel-inner .carousel-item.active,
		.carousel-inner .carousel-item-start,
		.carousel-inner .carousel-item-next,
		.carousel-inner .carousel-item-prev {
			display: flex;
		}

		@media (min-width: 768px) {

			.carousel-inner .carousel-item-right.active,
			.carousel-inner .carousel-item-next,
			.carousel-item-next:not(.carousel-item-start) {
				transform: translateX(25%) !important;
			}

			.carousel-inner .carousel-item-left.active,
			.carousel-item-prev:not(.carousel-item-end),
			.active.carousel-item-start,
			.carousel-item-prev:not(.carousel-item-end) {
				transform: translateX(-25%) !important;
			}

			.carousel-item-next.carousel-item-start,
			.active.carousel-item-end {
				transform: translateX(0) !important;
			}

			.carousel-inner .carousel-item-prev,
			.carousel-item-prev:not(.carousel-item-end) {
				transform: translateX(-25%) !important;
			}
		}
	</style> -->
</head>

<body>

	<!-- <div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2">
							<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +00 1234 567</a> 
							<a href="#"><span class="fa fa-paper-plane mr-1"></span> youremail@email.com</a>
						</p>
					</div>
					<div class="col-md-6 d-flex justify-content-md-end">
						<div class="social-media mr-4">
			    		<p class="mb-0 d-flex">
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
			    		</p>
		        </div>
		        <div class="reg">
		        	<p class="mb-0"><a href="#" class="mr-2">Sign Up</a> <a href="#">Log In</a></p>
		        </div>
					</div>
				</div>
			</div>
		</div> -->

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand kk" href="index.php"><img src="logo/adnoxblack.png" style="height: 80px;"></a>
			<div class="order-lg-last btn-group">
				<a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="pp">
					<span class="flaticon-shopping-bag"></span>
					<div class="d-flex justify-content-center align-items-center"><small><?= $ef ?></small></div>
				</a>
				
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item text-center btn-link d-block w-100" id="pi" href="cart.php">
						View All
						<span class="ion-ios-arrow-round-forward"></span>
					</a>
				</div>
			</div>
			<?php
			?>

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
						<a class="dropdown-item" href="customer-order.php" style="color:black;">My Orders</a>
						<form action="#" method="post">
							<input type="submit" class="dropdown-item" name="log" value="log out" style="color:black;"></input>
						</form>
					</div>
				</li>
			</ul>
		</div>
		</div>
	</nav>
	<!-- END nav -->

	<div class="hero-wrap" style="background-image: url('main/images/bg1.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-8 ftco-animate d-flex align-items-end">
					<div class="text w-100 text-center">
						<h1 class="mb-4">Elavate your<span>Wardrobe</span> Elavate your<span>Style</span>.</h1>	
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-intro">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-4 d-flex">
					<div class="intro d-lg-flex w-100 ftco-animate">
						<div class="icon">
							<span class="flaticon-support"></span>
						</div>
						<div class="text">
							<h2>Online Support 24/7</h2>
							<p>We give a 24/7 support throught the year to ensure you the best experience
								</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex">
					<div class="intro color-2 d-lg-flex w-100 ftco-animate">
						<div class="icon">
							<span class="flaticon-free-delivery"></span>
						</div>
						<div class="text">
							<h2>Free Shipping &amp;</h2>
							<p>We provide a free shipping for all products as the products are limited in the site</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section ftco-no-pb">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2>Categories</h2>
				</div>
			</div>
			<div class="row">
				<?php
				while ($ctgry = mysqli_fetch_array($qcat)) {
				?>
					<div class="col-lg-2 col-md-4 ">
						<div class="sort w-100 text-center ftco-animate">
							<a href="categorylist.php?ct=<?= $ctgry['Category_id'] ?>">
							<div class="img" style="background-image: url(main/images/category/<?= $ctgry['cat_pic'] ?>);">
							</div></a>
							<h3><?= $ctgry['Category_name'] ?></h3>
						</div>
					</div>
				<?php
				}
				?>

			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2>Our Products</h2>
				</div>
			</div>
			<div class="row">
				<?php
				while ($rw = mysqli_fetch_array($result2)) {
					if($rw["Product_quantity"]>5)
					{
				?>
					<div class="col-md-3 d-flex">
						<div class="product ftco-animate">
							<div class="img d-flex align-items-center justify-content-center" style="background-image: url(main/images/products/<?= $rw['product_image'] ?>);">
								<div class="desc">
									<p class="meta-prod d-flex">
										<a href="add-to-cart.php?id=<?= $rw['product_id'] ?>" name="cart" style="background-color:rgba(255, 255, 255, 0);border-color:rgba(255, 255, 255, 0.5);" class="d-flex align-items-center justify-content-center"><span style="color:#fff;" class="flaticon-shopping-bag"></span></a>
										<a href="product-single.php?id=<?= $rw['product_id'] ?>" class="d-flex align-items-center justify-content-center" style="background-color:rgba(255, 255, 255, 0);border-color:rgba(255, 255, 255, 0.5);"><span style="color:#fff;" class="flaticon-visibility"></span></a>
										<!-- <input type="number" name="quantity" value="1"> -->
									</p>
								</div>
							</div>
							<div class="text text-center">
								<span class="sale">Sale</span>
								<span class="category"></span>
								<h2><?= $rw["product_name"] ?></h2>
								<p class="mb-0"><span class="price"> ₹<?= $rw["product_price"] ?></span></p>
								<!-- <span class="price price-sale">$69.00</span> -->
							</div>
						</div>
					</div>
				<?php
					}
					else
					{
						?>
						<div class="col-md-3 d-flex">
						<div class="product ftco-animate">
							<div class="img d-flex align-items-center justify-content-center" style="background-image: url(main/images/products/<?= $rw['product_image'] ?>);">
								<div class="desc">
									<p class="meta-prod d-flex">
									Out Of stock
									</p>
								</div>
							</div>
							<div class="text text-center">
								<span class="sale">Sale</span>
								<span class="category"></span>
								<h2><?= $rw["product_name"] ?></h2>
								<p class="mb-0"><span class="price"> ₹<?= $rw["product_price"] ?></span></p>
								<!-- <span class="price price-sale">$69.00</span> -->
							</div>
						</div>
					</div>
					<?php
					}
				}
				?>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<a href="productlist.php" class="btn btn-primary d-block" id="prodlist">View All Products <span class="fa fa-long-arrow-right"></span></a>
				</div>
			</div>
	</section>

	<!-- <section class="ftco-section testimony-section img" style="background-image: url(main/images/ivana-cajina-_7LbC5J-jw4-unsplash.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
					<span class="subheading">Testimonial</span>
					<h2 class="mb-3">Happy Clients</h2>
				</div>
			</div>
			<div class="row ftco-animate">
				<div class="col-md-12">
					<div class="carousel-testimony owl-carousel ftco-owl">
						<div class="item">
							<div class="testimony-wrap py-4">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
								<div class="text">
									<p class="mb-4">Far far away, behind the word mountains, far from the countries
										Vokalia and Consonantia, there live the blind texts.</p>
									<div class="d-flex align-items-center">
										<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
										<div class="pl-3">
											<p class="name">Roger Scott</p>
											<span class="position">Marketing Manager</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
								<div class="text">
									<p class="mb-4">Far far away, behind the word mountains, far from the countries
										Vokalia and Consonantia, there live the blind texts.</p>
									<div class="d-flex align-items-center">
										<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
										<div class="pl-3">
											<p class="name">Roger Scott</p>
											<span class="position">Marketing Manager</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
								<div class="text">
									<p class="mb-4">Far far away, behind the word mountains, far from the countries
										Vokalia and Consonantia, there live the blind texts.</p>
									<div class="d-flex align-items-center">
										<div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
										<div class="pl-3">
											<p class="name">Roger Scott</p>
											<span class="position">Marketing Manager</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
								<div class="text">
									<p class="mb-4">Far far away, behind the word mountains, far from the countries
										Vokalia and Consonantia, there live the blind texts.</p>
									<div class="d-flex align-items-center">
										<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
										<div class="pl-3">
											<p class="name">Roger Scott</p>
											<span class="position">Marketing Manager</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap py-4">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
								<div class="text">
									<p class="mb-4">Far far away, behind the word mountains, far from the countries
										Vokalia and Consonantia, there live the blind texts.</p>
									<div class="d-flex align-items-center">
										<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
										<div class="pl-3">
											<p class="name">Roger Scott</p>
											<span class="position">Marketing Manager</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

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


	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


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
	<script type='text/javascript' src=''></script>
	<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
	<script type='text/javascript' src=''></script>
	<script>
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