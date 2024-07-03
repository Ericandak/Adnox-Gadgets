<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="regstyle.css">
  <script>
    $(document).ready(function() {
      let pwd, cpwd;
      $(".reg_uname").keyup(function() {
        var uname = document.getElementById("reg_uname").value
        var c_uname = /^[A-z _]{3,20}$/
        r_uname = c_uname.test(uname)
        if (r_uname == false) {
          $("#submit").attr('disabled', true);
          $(".reg-uname-err").text("Enter a valid Username");
        } else {
          $(".reg-uname-err").text("");
          valid();
        }
      })
      $("#pwd").keyup(function() {
        pwd = $("#pwd").val();
        var c_pwd = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/;
        r_pwd = c_pwd.test(pwd);
        if (!r_pwd) {
          $("#submit").attr('disabled', true);
          $(".pwd_error").text("Enter Valid Password");
        } else {
          $(".pwd_error").text("");
          valid();

        }
      })
      $("#cpwd").keyup(function() {
        cpwd = $("#cpwd").val();
        var c_pwd = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/;
        cr_pwd = c_pwd.test(cpwd);

        if (pwd != cpwd) {
          $("#submit").attr('disabled', true);
          $(".cp_error").text("Password does not match");
        } else {
          $(".cp_error").text("");
          valid()
        }
      })
      $("#reg_phone").keyup(function() {
        var uname = document.getElementById("reg_phone").value
        var c_uname = /^[789]\d{9}$/
        r_phone = c_uname.test(uname)
        if (r_phone == false) {
          $("#submit").attr('disabled', true);
          $(".reg-phone-err").text("Enter a valid phone number");
        } else {
          $(".reg-phone-err").text("");
          valid()
        }
      })
      $("#reg_email").keyup(function() {
        var unme = document.getElementById("reg_email").value
        var c_uname = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        r_email = c_uname.test(unme)
        if (r_email == false) {
          $("#submit").attr('disabled', true);
          $(".reg-email-err").text("Enter a valid email");
        } else {
          $(".reg-email-err").text("");
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
        if (r_uname == true && r_pwd == true && r_phone == true && r_email == true) {
          $("#submit").attr('disabled', false);
        }
      }
    })
  </script>
  <style>
    .bg-gradient {

      height: 120%;
    }
  </style>

</head>

<body class="bg-dark bg-gradient">
  <section class="h-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="p-5">


                    <div class="col-md-8 col-lg-6 col-xl-9 pos">
                      <img src="logo\logo2.png" class="img-fluid" alt="Sample image">
                    </div>




                    <!--<select class="select">
                          <option value="1">Employees</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                          <option value="4">Four</option>
                        </select>-->


                  </div>
                </div>
                <div class="col-lg-6 bg-dark text-white">
                  <form action="" method="POST">
                    <div class="p-5">
                      <h3 class="fw-normal mb-5">Contact Details</h3>

                      <div class="mb-4 pb-2">
                        <div class="form-outline form-white">
                          <input type="text" id="reg_uname" name="usr" class="form-control form-control-lg reg_uname" />
                          <p class="reg-uname-err text-white"></p>
                          <label class="form-label" id="k" for="form3Examplea2">Seller Name</label>
                        </div>
                      </div>

                      <div class="mb-4 pb-2">
                        <div class="form-outline form-white">
                          <input type="text" id="reg_email" name="mail" class="form-control form-control-lg" />
                          <p class="reg-email-err text-white"></p>
                          <label class="form-label" for="form3Examplea3">Email Id</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-5 mb-4 pb-2">

                          <div class="form-outline form-white">
                            <input type="password" id="pwd" name="pwd1" class="form-control form-control-lg" />
                            <p class="pwd_error"></p>
                            <label class="form-label" id="p" for="form3Examplea4">Password</label>
                          </div>
                        </div>
                        <div class="col-md-7 mb-4 pb-2">

                          <div class="form-outline form-white">
                            <input type="password" id="cpwd" name="pwd" class="form-control form-control-lg" />
                            <p class="cp_error"></p>
                            <label class="form-label" for="form3Examplea5">Confirm password</label>
                          </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5 mb-4 pb-2">

                          <div class="form-outline form-white">
                            <input type="text" id="reg_phone" name="ph" class="form-control form-control-lg" />
                            <p class="reg-phone-err"></p>
                            <label class="form-label" for="form3Examplea8">Phone Number</label>
                          </div>

                        </div>
                      </div>


                      <button type="submit" class="btn btn-outline-light btn-lg" data-mdb-ripple-color="dark" name="sub" id="submit">Register</button>
                      <a type="button" class="btn btn-outline-light btn-lg" data-mdb-ripple-color="dark" href="sellerlog.php">Sign in</a>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
<?php
if (isset($_POST["sub"])) {

  $usr = $_POST["usr"];
  $ps = $_POST["pwd1"];
  $pss = $_POST["pwd"];
  $ph = $_POST["ph"];
  $ml = $_POST["mail"];
  if ($usr != null && $pss != null && $ph != null && $ml != null && $ps == $pss) {
    include('connection.php');
    $qw = "SELECT * FROM `tbl_seller`";
    $r = mysqli_query($con, $qw);
    while ($row = mysqli_fetch_array($r)) {
      if ($ml == $row['Seller_email']) {
        $flag = 0;
        echo "<script> alert('email exists')</script>";
        exit();
      } else if ($ml != $row['Seller_email']) {
        $flag = 1;
      }
    }
    if ($flag = 1) {
      $query = "INSERT INTO `tbl_seller`(`Seller_name`, `Seller_email`, `Seller_password`, `Seller_phone`) VALUES ('$usr','$ml','$pss','$ph')";
      $re = mysqli_query($con, $query);
      if ($re)
?>
      <script>
        alert("form submitted successfully");
        window.location.href = 'sellerlog.php';
      </script>
<?php
  }
} 
else
  echo "<script> alert('Enter values');</script>";
}
?>