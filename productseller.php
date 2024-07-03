<?php session_start(); ?>
<?php
include('connection.php');
$id = $_SESSION["lo"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>new</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="selleradmin/css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="selleradmin/css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="selleradmin/css/templatemo-style.css">
  <!-- <script src="main/js/main.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function() {
    let pwd, cpwd;
    $("#name").keyup(function() {
      var uname = document.getElementById("name").value
      var c_uname = /^[A-z_0-9 ]{3,30}$/
      r_uname = c_uname.test(uname)
      if (r_uname == false) {
        $("#submit").attr('disabled', true);
        $("#pr_name_err").text("Enter a valid Name");
      } else {
        $("#pr_name_err").text("");
        valid();
      }
    })

    function valid() {
        if (r_uname == true) {
          $("#submit").attr('disabled', false);
        }
      }
  })
  function fileValidation() {
            var fileInput =
                document.getElementById('fileInput');
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
  </script>
  

  <style>
    .pr_name_err{
      color:red;
    }
    </style>
</head>
<script>
    document.getElementById('img_upld').addEventListener('click', () => {
        document.getElementById('fileInput').click()
    })
</script>


<body id="reportsPage">
  <nav class="navbar navbar-expand-xl">
    <div class="container h-100">
      <a class="navbar-brand" href="seller.php">
        <img src="logo/adnox.png" alt="" height="60" width="80">
      </a>
      <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars tm-nav-icon"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto h-100">
          <li class="nav-item">
            <a class="nav-link" href="seller.php">
              <i class="fas fa-eye"></i>
              View product
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="productseller.php">
              <i class="fas fa-shopping-cart"></i>
              Add product
            </a>
          </li>

          <!-- <li class="nav-item">
                            <a class="nav-link" href="accounts.html">
                                <i class="far fa-user"></i>
                                Accounts
                            </a>
                        </li> -->
          <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span>
                                    Settings <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Billing</a>
                                <a class="dropdown-item" href="#">Customize</a>
                            </div>
                        </li> -->
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <?php if ($id != null) { ?>

              <a class="nav-link d-block " name="log" href="logoutseller.php">
                <b>Logout</b>
              </a>
            <?php } else { ?>
              <a class="nav-link d-block" href="loginseller.php">
                <b>LogIn</b>
              </a>
            <?php } ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container tm-mt-big tm-mb-big">
    <div class="row">
      <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row">
            <div class="col-12">
              <h2 class="tm-block-title d-inline-block">Add Product</h2>
            </div>
          </div>
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <form action="" class="tm-edit-product-form" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="name">Product Name
                  </label>
                  <input id="name" name="name" type="text" class="form-control validate" required />
                  <p id="pr_name_err" class="text-danger"></p>
                </div>
                <div class="form-group mb-3">
                  <label for="description">Description</label>
                  <textarea class="form-control validate" rows="3" required name="desc"></textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="category">Category</label>
                  <select name="se" class="custom-select tm-select-accounts" id="category">
                    <?php
                   include('connection.php');
                    $ct = "SELECT * FROM `category_tbl`";
                    $rs = mysqli_query($con, $ct);
                    while ($rw = mysqli_fetch_array($rs)) {
                    ?>
                      <option value=<?= $rw["Category_id"] ?>><?= $rw["Category_name"] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="row">
                  <div class="form-group mb-3 col-xs-12 col-sm-6">
                    <label for="expire_date">Price
                    </label>
                    <input id="expire_date" name="price" type="number" class="form-control validate" data-large-mode="true" />
                    <p class="text-danger" id="pr_price_err"></p>
                  </div>
                  <div class="form-group mb-3 col-xs-12 col-sm-6">
                    <label for="stock">Units In Stock
                    </label>
                    <input id="stock" name="stock" type="number" class="form-control validate" required />
                  </div>
                </div>

            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
              <div class="tm-product-img-dummy mx-auto">
                <i class="fas fa-cloud-upload-alt tm-upload-icon" id="img_upld" onclick="document.getElementById('fileInput').click();"></i>
              </div>
              <div class="custom-file mt-3 mb-3">
                <input id="fileInput" name="file" type="file" style="display:none;"  onchange="fileValidation()" />
                <label class="text-white" for="file">Upload product Image
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" name="prosub"  id="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row tm-content-row">
      <!-- <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">UNIT SOLD</th>
                    <th scope="col">IN STOCK</th>
                    <th scope="col">EXPIRE DATE</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 1</td>
                    <td>1,450</td>
                    <td>550</td>
                    <td>28 March 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 2</td>
                    <td>1,250</td>
                    <td>750</td>
                    <td>21 March 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 3</td>
                    <td>1,100</td>
                    <td>900</td>
                    <td>18 Feb 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 4</td>
                    <td>1,400</td>
                    <td>600</td>
                    <td>24 Feb 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 5</td>
                    <td>1,800</td>
                    <td>200</td>
                    <td>22 Feb 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 6</td>
                    <td>1,000</td>
                    <td>1,000</td>
                    <td>20 Feb 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 7</td>
                    <td>500</td>
                    <td>100</td>
                    <td>10 Feb 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 8</td>
                    <td>1,000</td>
                    <td>600</td>
                    <td>08 Feb 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 9</td>
                    <td>1,200</td>
                    <td>800</td>
                    <td>24 Jan 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 10</td>
                    <td>1,600</td>
                    <td>400</td>
                    <td>22 Jan 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 11</td>
                    <td>2,000</td>
                    <td>400</td>
                    <td>21 Jan 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div> -->
      <!-- table container -->
      <!-- <a
              href="add-product.html"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
            <button class="btn btn-primary btn-block text-uppercase">
              Delete selected products
            </button>
          </div>
        </div> 
        <!-- <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col margin">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Product Categories</h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <tbody>
                  <tr>
                    <td class="tm-product-name">Product Category 1</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 2</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 3</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 4</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 5</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 6</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 7</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 8</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 9</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 10</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 11</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <button class="btn btn-primary btn-block text-uppercase mb-3">
              Add new category
            </button>
          </div> -->
    </div>
  </div>
  </div>
  <footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
      <p class="text-center text-white mb-0 px-4 small">
        Copyright &copy; <b>2018</b> All rights reserved.

        Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
      </p>
    </div>
  </footer>

  <script src="selleradmin/js/jquery-3.3.1.min.js"></script>
  <!-- https://jquery.com/download/ -->
  <script src="selleradmin/js/bootstrap.min.js"></script>
  <!-- https://getbootstrap.com/ -->
  <script>
    $(function() {
      $(".tm-product-name").on("click", function() {
        window.location.href = "#";
      });
    });
  </script>
</body>

</html>
<?php
if (isset($_POST["prosub"])) {
  $nam = $_POST["name"];
  $ds = $_POST["desc"];
  $pri = $_POST["price"];
  $st = $_POST["stock"];
  $caw = $_POST["se"];
  $df = $_FILES["file"]["name"];
  if ($nam != null && $ds != null && $pri != null && $st != null && $df != null) {
    include('connection.php');
    $qw = "INSERT INTO `pro_tbl`(`product_name`, `product_desc`, `product_price`, `Product_quantity`, `product_image`,`Category_id`,`Seller_id`) VALUES ('$nam','$ds','$pri','$st','$df','$caw','$id')";
    $re = mysqli_query($con, $qw);
    if($re)
    {
      $targetdir="main/images/products/";
      $targetfilepath=$targetdir.basename($df);
      move_uploaded_file($_FILES["file"]["tmp_name"],$targetfilepath);
    }
?>
    <script>
      alert("form submitted successfully");
    </script>
<?php
  }
}
?>