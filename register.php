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
          $(".reg-uname-err").text("Only alphabets and underscore permitted");
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
          $(".pwd_error").text("Use Alphanumeric with special characters");
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
                  <form action="mailverify.php" method="POST" enctype="multipart/form-data">
                    <div class="p-5">
                      <h3 class="fw-normal mb-5">Contact Details</h3>

                      <div class="mb-4 pb-2">
                        <div class="form-outline form-white">
                          <label class="form-label" id="k" for="form3Examplea2">UserName</label>
                          <input type="text" id="reg_uname" name="usr" class="form-control form-control-lg reg_uname" />
                          <p class="reg-uname-err text-white"></p>
                        </div>
                      </div>

                      <div class="mb-4 pb-2">
                        <div class="form-outline form-white">
                          <label class="form-label" for="form3Examplea3">Email Id</label>
                          <input type="text" id="reg_email" name="mail" class="form-control form-control-lg" />
                          <p class="reg-email-err text-white"></p>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-5 mb-4 pb-2">

                          <div class="form-outline form-white">
                            <label class="form-label" id="p" for="form3Examplea4">Password</label>
                            <input type="password" id="pwd" name="pwd1" class="form-control form-control-lg" />
                            <p class="pwd_error"></p>
                          </div>
                        </div>
                        <div class="col-md-7 mb-4 pb-2">

                          <div class="form-outline form-white">
                            <label class="form-label" for="form3Examplea5">Confirm password</label>
                            <input type="password" id="cpwd" name="pwd" class="form-control form-control-lg" />
                            <p class="cp_error"></p>
                          </div>

                        </div>
                      </div>

                    <div class="row">
                    <div class="col-md-5 mb-4 pb-2">
                    <div class="form-outline form-white">
                          <label class="form-label" for="form3Examplea8">Phone Number</label>
                            <input type="text" id="reg_phone" name="ph" class="form-control form-control-lg" />
                            <p class="reg-phone-err"></p>
                          </div>
  </div>
                      <div class="col-md-5 mb-4 pb-2">

                      <label class="form-label" for="form3Examplea8">Profile pic</label>
                        <input type="file" id="reg_file" name="file" class="form-control form-control-lg" onchange="fileValidation()" syle="margin-top:-14px" />
                        <p class="reg-file-err"></p>
                      </div>
                    </div>


                    <button type="submit" class="btn btn-outline-light btn-lg" data-mdb-ripple-color="dark" name="sub" id="submit">Register</button>

                    <div>
                      <p class="small fw-bold mt-2 pt-1 mb-0">Are you a seller? <a href="regseller.php" class="link-warning">Register</a></p>
                      <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="index1.php" class="link-warning">Sign in</a></p>
                    </div>
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
<!-- <?php
// if (isset($_POST["sub"])) {

//   $usr = $_POST["usr"];
//   $ps = $_POST["pwd1"];
//   $pss = $_POST["pwd"];
//   $ph = $_POST["ph"];
//   $ml = $_POST["mail"];
//   $df = $_FILES["file"]["name"];
//   if ($usr != null && $pss != null && $ph != null && $ml != null && $ps == $pss && $df != null) {
//     $con = mysqli_connect("localhost", "root", "", "mini");
//     $qw = "SELECT * FROM `user_table`";
//     $r = mysqli_query($con, $qw);
//     while ($row = mysqli_fetch_array($r)) {
//       if ($ml == $row['user_email']) {
//         $flag = 0;
//         echo "<script> alert('email exists')</script>";
//         exit();
//       } else if ($ml != $row['user_email']) {
//         $flag = 1;
//       }
//     }
//     if ($flag = 1) {
//       $query = "INSERT INTO `user_table`(`user_name`, `user_password`,`user_email`, `user_phone`,`usr_img`) VALUES ('$usr','$pss','$ml','$ph','$df')";
//       $re = mysqli_query($con, $query);
//       if ($re) {
//         $targetdir = "main/images/profiles/";
//         $targetfilepath = $targetdir . basename($df);
//         move_uploaded_file($_FILES["file"]["tmp_name"], $targetfilepath);
// ?>
//         <script>
//           alert("form submitted successfully");
//         </script>
// <?php
//       }
//     }
//   } else
//     echo "<script> alert('Enter values');</script>";
// }
?> -->