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

$query2 = "SELECT * FROM `tbl_cart` where `user_id`='$id'";
$result2 = mysqli_query($con, $query2);
$ef = mysqli_num_rows($result2);
$sm = 0;
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="main/css/flaticon.css">
    <link rel="stylesheet" href="main/css/style.css">
    <link rel="stylesheet" href="main/css/searchstyle.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('select').change(function() {
                var quanti = $(this).val();
                var id = $(this).attr('data-crtid');
                $.ajax({
                    type: "GET",
                    url: "update_cart_quantity.php",
                    data: {
                        quantity: quanti,
                        id: id
                    },
                    success: function(response) {
                        $('#output').html(response);
                    }
                });
            });

        })
    </script>
</head>

<body>
    <div id="output"></div>
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

    <section class="hero-wrap hero-wrap-2" style="background-image: url('main/images/bg2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Cart <i class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">My Cart</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <!-- <th>total</th> -->
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($crt = mysqli_fetch_array($result2)) {
                                $sm += $crt['cart_price'] * $crt['cart_quantity'];
                            ?>
                                <tr class="alert" role="alert">
                                    <td>
                                        <div class="img" style="background-image: url(main/images/products/<?= $crt['cart_img'] ?>);"></div>
                                    </td>
                                    <td>
                                        <div class="email">
                                            <span><?= $crt['cart_item'] ?></span>
                                            <span><?= $crt['cart_desc'] ?></< /span>
                                        </div>
                                    </td>
                                    <td> ₹<?= $crt['cart_price'] ?></ /td>
                                    <td class="quantity">
                                        <div class="input-group">
                                            <input type="hidden" value="" id="cart_id" />
                                            <select name="cart_quantity" id="cart_quantity<?= $crt['cart_id'] ?>" data-crtid="<?php echo $crt['cart_id'] ?>">


                                                <option value="1" <?php if ($crt['cart_quantity'] == '1') {
                                                                        echo 'selected';
                                                                    } ?>>1</option>
                                                <option value="2" <?php if ($crt['cart_quantity'] == '2') {
                                                                        echo 'selected';
                                                                    } ?>>2</option>
                                                <option value="3" <?php if ($crt['cart_quantity'] == '3') {
                                                                        echo 'selected';
                                                                    } ?>>3</option>
                                                <option value="4" <?php if ($crt['cart_quantity'] == '4') {
                                                                        echo 'selected';
                                                                    } ?>>4</option>
                                                <option value="5" <?php if ($crt['cart_quantity'] == '5') {
                                                                        echo 'selected';
                                                                    } ?>>5</option>
                                            </select>
                                            <!-- <input value="" type="number" id="typeNumber" class="form-control"  min="1" max="30" /> -->
                                        </div>
                                    </td>
                                    <td>
                                        <a href="delcart.php?idd=<?= $crt['cart_id'] ?>" id="del" aria-label="Close">
                                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <!-- <p class="d-flex">
                            <span>Subtotal</span>
                            <span>$20.60</span>
                        </p> -->
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>₹<?= $sm ?></span>
                        </p>
                    </div>
                    <?php if($sm>0)
                    {
                        ?>
                    <p class="text-center"><a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                    <?php
                    }
                    ?>
                </div>
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
    <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->


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
        $(document).ready(function() {
                    $("[type='number']").keypress(function(evt) {
                        evt.preventDefault();
                    });
    </script>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
                Add a Different address for delivery?
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-secondary" href="addaddress.php?token=<?= $sm ?>">Use existing address</a>
                <a type="button" class="btn btn-primary" href="addaddress2.php?tvk=<?=$sm?>">Use different Address</a>
            </div>
        </div>
    </div>
</div>


</html>
<?php
$_SESSION["sm"]=$sm;
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