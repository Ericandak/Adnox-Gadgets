<?php session_start(); ?>
<?php
error_reporting(E_ERROR | E_PARSE);
include('connection.php');
$id = $_SESSION["lg"];
if ($id) {
  $id = $_SESSION["lg"];
  $query = "SELECT * FROM user_table WHERE user_id = '$id'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  $target = $row["usr_img"];

  //  $query1 = "SELECT * FROM login_p 
  //        WHERE id = '$id'";
  //  $result1 = mysqli_query($con,$query1);
  //  $row1 = mysqli_fetch_array($result1);
  //  $uname = $row1["mail"];
} else {
  $target = "index1.php";
}
$query3 = "SELECT * FROM category_tbl";
$result3 = mysqli_query($con, $query3);
if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno - 1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM pro_tbl";
$result = mysqli_query($con, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql = "SELECT * FROM pro_tbl ";
if (isset($_REQUEST['name'])) {
  // store filter value in session
  $_SESSION['name2'] = $_REQUEST['name'];
}
if (isset($_SESSION['name2'])) {
  // retrieve filter value from session
  $name1 = $_SESSION['name2'];
  if($name1=="nameasc")
  {
    $sql.="ORDER BY product_name";
  }
  else if($name1=="priceasc")
  {
    $sql.=" ORDER BY product_price";
  }
  else if($name1=="pricedesc")
  {
    $sql.="ORDER BY product_price DESC";
  }
  else if($name1=="namedesc")
  {
    $sql.="ORDER BY product_name DESC";
  }
  else
  {
	?>
	<?php
  }
}

$sql .= " LIMIT $offset, $no_of_records_per_page ";
$result2 = mysqli_query($con, $sql);
$cr = "SELECT * FROM `tbl_cart` Where `user_id`='$id'";
$r = mysqli_query($con, $cr);
$ef = mysqli_num_rows($r);
if(isset($_GET["remove"]))
{
unset($_SESSION['name2']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>productlist</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="main/css/animate.css">

	<link rel="stylesheet" href="main/css/owl.carousel.min.css">
	<link rel="stylesheet" href="main/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="main/css/magnific-popup.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

	<link rel="stylesheet" href="main/css/flaticon.css">
	<link rel="stylesheet" href="main/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<link rel="stylesheet" href="main/css/searchstyle.css">
</head>

<body>
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
						<a class="dropdown-item" href="myorders.php" style="color:black;">My Orders</a>
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

	<section class="hero-wrap hero-wrap-2" style="background-image: url('main/images/ivana-cajina-_7LbC5J-jw4-unsplash.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate mb-5 text-center">
					<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Products <i class="fa fa-chevron-right"></i></span></p>
					<h2 class="mb-0 bread">Products</h2>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="row mb-4">
						<div class="col-md-12 d-flex justify-content-between align-items-center">
							
						</div>
					</div>
					<div class="row">
						<?php
						while ($row = mysqli_fetch_array($result2)) {
						?>
							<div class="col-md-4 d-flex">
								<div class="product ftco-animate">
									<div class="img d-flex align-items-center justify-content-center" style="background-image: url(main/images/products/<?= $row['product_image'] ?>);">
										<div class="desc">
											<p class="meta-prod d-flex">
												<a href="add-to-cart.php?id=<?= $row['product_id'] ?>" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
												<!-- <a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a> -->
												<a href="product-single.php?id=<?= $row['product_id'] ?>" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
											</p>
										</div>
									</div>
									<div class="text text-center">
										<h2><?= $row['product_name'] ?></h2>
										<p class="mb-0"><span class="price"><?= $row['product_price'] ?></span>
											<!-- <span class="price">$49.00</span> -->
										</p>
									</div>
								</div>
							</div>

						<?php
						}
						?>
					</div>
					<div class="row mt-5">
						<div class="col text-center">
							<div class="block-27">
								<div class="pagination">
									<ul>
										<?php if ($pageno > 1) { ?>
											<li><a href="?pageno=1">First</a></li>
										<?php } ?>

										<li <?php if ($pageno <= 1) {
												echo 'class="disabled"';
											} ?>>
											<a <?php if ($pageno > 1) {
													echo "href='?pageno=" . ($pageno - 1) . "'";
												} ?>>Prev</a>
										</li>

										<?php
										$range = 3; // Number of pages to display in pagination
										for ($i = ($pageno - $range); $i < (($pageno + $range) + 1); $i++) {
											if (($i > 0) && ($i <= $total_pages)) {
												if ($pageno == $i) {
													echo "<li class='active'><a>" . $i . "</a></li>";
												} else {
													echo "<li><a href='?pageno=" . $i . "'>" . $i . "</a></li>";
												}
											}
										}
										?>

										<li <?php if ($pageno >= $total_pages) {
												echo 'class="disabled"';
											} ?>>
											<a <?php if ($pageno < $total_pages) {
													echo "href='?pageno=" . ($pageno + 1) . "'";
												} ?>>Next</a>
										</li>

										<?php if ($pageno < $total_pages) { ?>
											<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="sidebar-box ftco-animate">
						<div class="categories">
							<ul class="p-0">
								<script>
									$(document).ready(function() {
										$('.checkbox-label').click(function(event) {
											const $chevron = $(this).find('.fa');
											const $checkbox = $(this).find('.checkbox-input');

											if ($chevron.hasClass('fa-chevron-down')) {
												$chevron.removeClass('fa-chevron-down').addClass('fa-chevron-up');
											} else {
												$chevron.removeClass('fa-chevron-up').addClass('fa-chevron-down');
											}

											$checkbox.prop('checked', !$checkbox.prop('checked'));

											// Prevent the default behavior of the label and the event from propagating
											event.preventDefault();
											event.stopPropagation();
										});
									});
								</script>

								<form action="#" method="GET">
									<div class="filter-sidebar">
										<h4>Sort By:</h4>
										<ul>
											<li>
												<label for="name-checkbox" class="checkbox-label">
												<h4>Name</h4>
													<input type="radio" value="nameasc" id="name-checkbox" name="name" class="checkbox-input" <?php if($_SESSION["name2"]=='nameasc')echo "checked";?>/>
													 Ascending
													<span class="fa fa-chevron-down"></span>
												</label>
											</li>
											<li>
												<label for="price-checkbox" class="checkbox-label">
													<input type="radio" value="namedesc" id="price-checkbox" name="name" class="checkbox-input" <?php if($_SESSION["name2"]=='namedesc')echo "checked";?>/>
													Descending
													<span class="fa fa-chevron-down"></span>
												</label>
											</li>
											<li>
												<label for="name-checkbox" class="checkbox-label">
												<h4>Price</h4>
													<input type="radio" value="priceasc" id="name-checkbox" name="name" class="checkbox-input" <?php if($_SESSION["name2"]=='priceasc')echo "checked";?>/>
													Ascending
													<span class="fa fa-chevron-down"></span>
												</label>
											</li>
											<li>
												<label for="price-checkbox" class="checkbox-label">
													<input type="radio" value="pricedesc" id="price-checkbox" name="name" class="checkbox-input" <?php if($_SESSION["name2"]=='pricedesc')echo "checked";?>/>
													Descending
													<span class="fa fa-chevron-down"></span>
												</label>
											</li>
										</ul>
									</div>
									<!-- <li><a href="#">Rum <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Tequila <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Vodka <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Whiskey <span class="fa fa-chevron-right"></span></a></li> -->
									<button type="submit" class="btn btn-primary" name="apply" style="margin-left:40px;">Sort</button>
									<button type="submit" name="remove" class="btn btn-primary">Remove</button>
									</ul>
								</form>
						</div>
					</div>
					<!-- <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
                    <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
                    <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
                    <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div> -->
				</div>
			</div>
		</div>
	</section>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
	<script src="main/js/main.js"></script>
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
if ($id > 0) {
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