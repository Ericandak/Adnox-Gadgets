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
	$name = $row["user_name"];
	$email = $row["user_email"];
	$phone = $row["user_phone"];
	$address = "SELECT *  FROM `address_tbl` WHERE `user_id` = '$id'";
	$raddress = mysqli_query($con, $address);
	$radd = mysqli_fetch_array($raddress);

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

	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="main/css/animate.css">

	<link rel="stylesheet" href="main/css/owl.carousel.min.css">
	<link rel="stylesheet" href="main/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="main/css/magnific-popup.css">

	<link rel="stylesheet" href="main/css/flaticon.css">
	<link rel="stylesheet" href="main/css/style.css">
	<link rel="stylesheet" href="main/css/styleprofile.css">
	<link rel="stylesheet" href="main/css/searchstyle.css">
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



				<?php
				while ($crtrow = mysqli_fetch_array($r)) {

				?>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="dropdown-item d-flex align-items-start" href="#">
							<div class="img" style="background-image: url(main/images/.<?= $crtrow['cart_img'] ?>);"></div>
							<div class="text pl-3">
								<h4><?= $crtrow['cart_item'] ?></h4>
								<p class="mb-0"><a href="#" class="price"></a><span class="quantity ml-3">Quantity:
										<?= $crtrow['cart_quantity'] ?></span></p>
							</div>
						</div>
						<a class="dropdown-item text-center btn-link d-block w-100" id="pi" href="cart.php">
							View All
							<span class="ion-ios-arrow-round-forward"></span>
						</a>
					</div>
			</div>
		<?php
				}
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
	<div class="container">
		<div class="main-body" style="margin-top:150px">

			<div class="row gutters-sm">
				<div class="col-md-4 mb-3">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="<?php
											echo "main/images/profiles/" . $target;
											?>" class="rounded-circle" width="150" height="150">
								<div class="mt-3">
									<h4><?= $name ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card mb-3">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?= $name ?>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?= $email ?>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?= $phone ?>
								</div>
							</div>
							<hr>
							<?php
							if ($radd > 0) {
							?>
								<div class="row">
									<div class="col-sm-3">
										<h6 class="mb-0">Address</h6>
									</div>
									<div class="col-sm-6 text-secondary">
										<?= $radd["House"];
										echo ",",
										$radd["street"];
										echo ",",
										$radd["city"];
										echo ",",
										$radd["state"];
										echo ",",
										$radd["Pin"]; ?>
									</div>
									<!-- <div class="col-sm-3">
									<a class="btn btn-info " target="__blank" href="udadd.php">update</a>
									</div> -->
								</div>
							<?php
							} else {
							?>
								<div class="row">
									<div class="col-sm-3">
										<h6 class="mb-0">Address</h6>
									</div>
									<div class="col-sm-3">
										<a class="btn btn-info " target="__blank" href="adup.php">Add Address</a>
									</div>
								<?php
							}
								?>
								<hr>
								<div class="row">
									<div class="col-sm-12">
										<a class="btn btn-info " target="__blank" href="editprofile.php">Edit</a>
									</div>
								</div>
								</div>
						</div>
					</div>
				</div>

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