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

}
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script>
    $(document).ready(function() {
      let pwd, cpwd,r_uname=true,r_phone=true,r_email=true;
      $("#reg_uname").keyup(function() {
		  var uname = document.getElementById("reg_uname").value
		  var c_uname = /^[A-Za-z ]{3,29}$/
		  r_uname = c_uname.test(uname)
		  if (r_uname == false) {
			// alert(r_uname);
          $("#submit").attr('disabled', true);
          $("#reg_uname_err").text("Enter a valid Username");
        } else {
          $("#reg_uname_err").text("");
          valid();
        }
      })
    //   $("#pwd").keyup(function() {
    //     pwd = $("#pwd").val();
    //     var c_pwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    //     r_pwd = c_pwd.test(pwd);
    //     if (!r_pwd) {
    //       $("#submit").attr('disabled', true);
    //       $(".pwd_error").text("Enter Valid Password");
    //     } else {
    //       $(".pwd_error").text("");
    //       valid();

    //     }
    //   })
    //   $("#cpwd").keyup(function() {
    //     cpwd = $("#cpwd").val();
    //     var c_pwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    //     cr_pwd = c_pwd.test(cpwd);

    //     if (pwd != cpwd) {
    //       $("#submit").attr('disabled', true);
    //       $(".cp_error").text("Password does not match");
    //     } else {
    //       $(".cp_error").text("");
    //       valid()
    //     }
    //   })
      $("#reg_phone").keyup(function() {
        var uname = document.getElementById("reg_phone").value
        var c_uname = /^[789]\d{9}$/
        r_phone = c_uname.test(uname)
        if (r_phone == false) {
          $("#submit").attr('disabled', true);
          $("#reg-phone-err").text("Enter a valid phone number");
        } else {
          $("#reg-phone-err").text("");
          valid()
        }
      })
      $("#reg_email").keyup(function() {
        var unme = document.getElementById("reg_email").value
        var c_uname = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        r_email = c_uname.test(unme)
        if (r_email == false) {
          $("#submit").attr('disabled', true);
          $("#reg-email-err").text("Enter a valid email");
        } else {
          $("#reg-email-err").text("");
          valid()
          /* $.ajax({
                    url: 'edit.php',
                    method: 'post',
                    data: {
                        mail: unme
                    },
                    success: function(data) {
                        if (data != 0) {
                            $('#e_errors').html("<span class='text-warning'>email exists</span>");
                            $("#submit").prop('disabled', true);
                        } else {
                            $('#e_errors').html("<span class='text-success'>email doesnt exist</span>");
                            $("#submit").prop('disabled', false);
                        }
                    }
                });*/

        }
      });

      function valid() {
        if (r_uname == true && r_phone == true && r_email == true) {
          $("#submit").attr('disabled', false);
        }
      }
	  function fileValidation() {
            var fileInput =
                document.getElementById('reg_file');
            var filePath = fileInput.value;
            // Allowing file type
            var allowedExtensions =
                /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            if (!allowedExtensions.exec(filePath)) {
                $('#submit').attr("disabled", true);
                alert('only image files allowed');
                fileInput.value = '';
                return false;
            } else {
                $('#submit').attr("disabled", false);
            }
        }
    })
  </script>
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
					<div class="d-flex justify-content-center align-items-center"><small>3</small></div>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<div class="dropdown-item d-flex align-items-start" href="#">
						<div class="img" style="background-image: url(images/);"></div>
						<div class="text pl-3">
							<h4>A</h4>
							<p class="mb-0"><a href="#" class="price">$25.99</a><span class="quantity ml-3">Quantity:
									01</span></p>
						</div>
					</div>
					<div class="dropdown-item d-flex align-items-start" href="#">
						<div class="img" style="background-image: url(images/);"></div>
						<div class="text pl-3">
							<h4>B</h4>
							<p class="mb-0"><a href="#" class="price">$30.89</a><span class="quantity ml-3">Quantity:
									02</span></p>
						</div>
					</div>
					<div class="dropdown-item d-flex align-items-start" href="#">
						<div class="img" style="background-image: url(images/);"></div>
						<div class="text pl-3">
							<h4>Citadelle</h4>
							<p class="mb-0"><a href="#" class="price">$22.50</a><span class="quantity ml-3">Quantity:
									01</span></p>
						</div>
					</div>
					<a class="dropdown-item text-center btn-link d-block w-100" href="cart.html">
						View All
						<span class="ion-ios-arrow-round-forward"></span>
					</a>
				</div>
			</div>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<!-- <form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-dark" type="submit">Search</button>
				</form> -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
					<!-- <li class="nav-item"><a href="index1.php" class="nav-link" id="ek">LOGIN</a></li> -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="product.html">Categories</a>
							<!-- <a class="dropdown-item" href="product-single.html">Single Product</a> -->
							<a class="dropdown-item" id="pp" href="cart.html">Cart</a>
							<!-- <a class="dropdown-item" href="checkout.html">Checkout</a> -->
						</div>
					</li>
					<li class="nav-item dropdown">
						<div class="d-flex gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
							<img src=<?php 
                echo"main/images/profiles/".$target;?>  alt="Avatar" class="img-fluid my-3 rounded-circle dropdown-toggle" style="width: 50px; height:50px" id="ak"/>
						</div>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<form action="#" method="post">
								<input type="submit" class="dropdown-item" name="log" value="log out"></input>
							</form>
							<a class="dropdown-item" href="product.html">View profile</a>
							<!-- <a class="dropdown-item" href="product-single.html">Single Product</a> -->
							<!-- <a class="dropdown-item" href="checkout.html">Checkout</a> -->
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" style="margin-top:150px">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">House</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" name="house" class="form-control"	id="reg_uname">
										<p id="reg_uname_err"></p>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Street</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" class="form-control" name="street"  >
										<p id="reg-email-err"></p>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">City</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" class="form-control" name="city"  >
										<p id="reg-phone-err"></p>
									</div>
								</div>
                                <div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">City</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" class="form-control" name="state"  >
										<p id="reg-phone-err"></p>
									</div>
								</div>
                                <div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">City</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="number" class="form-control" name="pin" min="10000" max="99999">
										<p id="reg-phone-err"></p>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-3"></div>
									<div class="col-sm-9 text-secondary">
										<input type="submit" id="submit" class="btn btn-primary px-4" name="ud" value="Save Changes">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</html>
	<?php

	if (isset($_POST['ud'])) {
	// $ta = $_FILES["ims"]['name'];

	$nam = $_POST["house"];
	$mail = $_POST["street"];
	$phon = $_POST["city"];
    $state = $_POST["state"];
	$pin = $_POST["pin"];
   $qwry= "INSERT INTO `address_tbl`(`user_id`, `House`, `street`, `city`, `state`, `Pin`) VALUES ('$id','$nam','$mail','$phon','$state','$pin')";
   $resqwry=mysqli_query($con,$qwry);
	echo "<script>alert('successfully updated')</script>";
	echo "<script>location.href='profile.php'</script>";
} else {
	$target = "editprofile.php";
}
?>
