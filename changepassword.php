<?php session_start(); ?>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="logo\logo2.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="reenter.php" method="POST">
                    <h1>Reset Your Password</h1>

                    <div class="divider d-flex align-items-center my-4">
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form3Example3" name="us" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name="change" class="btn btn-outline-dark btn-lg">Reset</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-dark">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
        </div>
        <!-- Copyright -->

        <!-- Right -->
        <div>
            <!-- <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f">fb</i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter">tw</i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google">gog</i>
            </a>
            <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in">ln</i>
            </a> -->
        </div>
        <!-- Right -->
    </div>
</section>

</html>
