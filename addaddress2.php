<?php session_start(); ?>
<?php
include('connection.php');
$sum = $_SESSION["sm"];
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
$query2 = "SELECT * FROM `tbl_cart` where `user_id`='$id'";
$result2 = mysqli_query($con, $query2);
$ef = mysqli_num_rows($result2);
$sm = $sum;
$queryadd = "SELECT * FROM `address_tbl` WHERE `user_id`='$id'";
$resadd = mysqli_query($con, $queryadd);
$addnum = mysqli_num_rows($resadd);
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

		<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="main/css/animate.css">

		<link rel="stylesheet" href="main/css/owl.carousel.min.css">
		<link rel="stylesheet" href="main/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="main/css/magnific-popup.css">

		<link rel="stylesheet" href="main/css/flaticon.css">
		<link rel="stylesheet" href="main/css/style.css">
		<script>
			$(document).ready(function() {
				let pwd, cpwd, r_uname, r_phone, r_email,r_street;
				$(".reg_uname").keyup(function() {
					var uname = document.getElementById("reg_uname").value
					var c_uname = /^[A-z _]{3,20}$/
					r_uname = c_uname.test(uname)
					if (r_uname == false) {
						$("#rzp-button1").attr('disabled', true);
						$(".reg-uname-err").text("Values must be in alphabetic and within 3-20");
					} else {
						$(".reg-uname-err").text("");
						valid();
					}
				})
				$("#reg_street").keyup(function() {
					var uname = document.getElementById("reg_street").value
					var c_uname = /^[A-z _]{3,20}$/
					r_street = c_uname.test(uname)
					if (r_street == false) {
						$("#rzp-button1").attr('disabled', true);
						$(".reg-street-err").text("Values must be in alphabetic and within 3-20");
					} else {
						$(".reg-street-err").text("");
						valid();
					}
				})

				$("#reg_phone").keyup(function() {
					var uname = document.getElementById("reg_phone").value
					var c_uname = /^[A-z _]{3,20}$/
					r_phone = c_uname.test(uname)
					if (r_phone == false) {
						$("#rzp-button1").attr('disabled', true);
						$(".reg-phone-err").text("Values must be in alphabetic and within 3-20");
					} else {
						$(".reg-phone-err").text("");
						valid()
					}
				})
				$("#del_email").keyup(function() {
					var unme = document.getElementById("del_email").value
					var c_uname = /^[A-z _]{3,20}$/
					r_email = c_uname.test(unme)
					if (r_email == false) {
						$("#rzp-button1").attr('disabled', true);
						$(".del-email-err").text("Values must be in alphabetic and within 3-20");
					} else {
						$(".del-email-err").text("");
						valid()
					}

				})

				function valid() {
					if (r_uname == true && r_phone == true && r_email == true && r_street == true) {

						$("#rzp-button1").attr('disabled', false);
					}
				}
			})
		</script>
		<!-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
		<script>
			$(document).ready(function() {
				$('#rzp-button1').click(function() {


					var options = {
						"key": "rzp_test_60aYvejCFckfGr", // Enter the Key ID generated from the Dashboard
						"amount": "<?= $sm * 100 ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
						"currency": "INR",
						"name": "Adnox",
						"description": "Transaction",
						"image": "logo/adnoxblack.png",
						"handler": function(response) {
							alert(response.razorpay_payment_id);
							alert(response.razorpay_signature)
							location.href = "deldata.php?tk=<?= $sm ?>";
						},
						"prefill": {
							"name": "<?= $row['user_name'] ?>",
							"email": "<?= $row['user_email'] ?>",
							"contact": "<?= $row['user_phone'] ?>"
						},
						"notes": {
							"address": "<?= $row['user_address2'] ?>"
						},
						"theme": {
							"color": "#3399cc"
						}
					};
					var rzp1 = new Razorpay(options);
					rzp1.on('payment.failed', function(response) {
						alert(response.error.code);
						alert(response.error.description);
						alert(response.error.source);
					});
					document.getElementById('rzp-button1').onclick = function(e) {
						rzp1.open();
						e.preventDefault();
					}
				})
			})
		</script> -->

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
		<!-- END nav -->

		<section class="hero-wrap hero-wrap-2" style="background-image: url('main/images/bgproducts/lucrezia-carnelos-wQ9VuP_Njr4-unsplash.jpg');" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-end justify-content-center">
					<div class="col-md-9 ftco-animate mb-5 text-center">
						<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Checkout <i class="fa fa-chevron-right"></i></span></p>
						<h2 class="mb-0 bread">Checkout</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-10 ftco-animate">
						<h3 class="mb-4 billing-heading">Give Your Delivery Address</h3>
						<form action="delupdate.php?tkz=<?=$sum?>" method="POST">
						<div class="row align-items-end">
							<div class="col-md-12">
								<div class="form-group">
									<label class="form-label" id="k" for="form3Examplea2">House No</label>
									<input type="text" id="reg_uname" name="house" class="form-control reg_uname" />
									<p class="reg-uname-err"></p>
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="towncity">Street</label>
									<input class="form-control" placeholder="" height="300" name="street" id="reg_street">
									<p class="reg-street-err"></p>
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone">City</label>
									<input type="text" id="reg_phone" name="city" class="form-control"/>
									<p class="reg-phone-err"></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailaddress">State</label>
									<input type="text" id="del_email" name="state" class="form-control text-dark" />
									<p class="del-email-err"></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailaddress">Pin</label>
									<input type="number" name="pin" class="form-control text-dark" min="10000" max="99999"/>
									<p class="del-pin-err"></p>
								</div>
							</div>
							<div class="w-100"></div>
							<!-- <div class="col-md-12">
								<div class="form-group mt-4">
									<div class="radio">
										<label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
										<label><input type="radio" name="optradio"> Ship to different address</label>
									</div>
								</div>
							</div> -->
						</div>
						<div class="col-md-6">
							<div class="cart-detail p-3 p-md-4">
								<p><input type="submit" class="btn btn-primary py-3 px-4" id="rzp-button1" value="Update" name="update"></p>
							</div>
						</div>
						</form>
						<!-- END -->
						
					</div>
				</div> <!-- .col-md-8 -->
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



		<!-- loader 
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>-->


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
		<!-- action="deldata.php?tk=<?= $sm ?> -->
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