<?php session_start(); ?>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="logo\logo2.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="" method="POST">
                    <h1>Sign In now</h1>

                    <div class="divider d-flex align-items-center my-4">
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email address</label>
                        <input type="email" id="form3Example3" name="us" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                    <label class="form-label" for="form3Example4">Password</label>
                        <input type="password" id="form3Example4" name="pswrd" class="form-control form-control-lg" placeholder="Enter password" />
                    </div>


                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name="sub" class="btn btn-outline-dark btn-lg" id="submit">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php" class="link-danger">Register</a>
                            Forgotten password <a href="changepassword.php" class="link-danger">Click here</a><br>
                            Are you a Seller? <a href="loginseller.php" class="link-danger">Login Here</a></p>
                        <button type="button"  style="display:none" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="model">
                            Loginerror
                        </button>
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
<?php
if (isset($_POST["sub"])) {
    $user = $_POST["us"];
    $pwd = $_POST["pswrd"];
    include('connection.php');
    $que = "SELECT `user_id`,`user_password`,`user_email`,`user_type` FROM `user_table` WHERE `user_email`='$user' && `user_password`='$pwd' && 'user_type'=0 or 'user_type'=1";
    $re = mysqli_query($con, $que);
    $row = mysqli_fetch_array($re);
    $user_id = $row['user_id'];
    $ad = $row['user_type'];
    $cou = mysqli_num_rows($re);
    if ($cou > 0) {
        $_SESSION['lg'] = $user_id;
        if ($ad == 0) {
?>
            <script>
                window.location.href = 'index.php';
            </script>
        <?php
        } elseif ($ad == 1) {
        ?>
            <script>
                window.location.href = 'admin.php';
            </script>
        <?php
        }
        ?>
    <?php
        exit;
    } else {
    ?>
    <script>
    $(document).ready(function(){
    $('#model').click();
    })
    </script>
     <html>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id=md>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Invalid Username or Password
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        </html>

<?php
    }
}
?>
