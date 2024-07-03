<?php session_start(); ?>
<?php
$tk = $_SESSION["sm"];
$i = $_SESSION["lg"];
include("connection.php");
$queryuser = "SELECT * FROM `user_table` WHERE `user_id` = '$i'";
$resultuser = mysqli_query($con, $queryuser);
$rowuser = mysqli_fetch_array($resultuser);
$queryadd = "SELECT * FROM `address_tbl` WHERE `user_id`='$i'";
$resadd = mysqli_query($con, $queryadd);
$rq=mysqli_fetch_array($resadd);
$crt = "SELECT * FROM `tbl_cart` WHERE `user_id`='$i'";
echo "$crt";
$crtres = mysqli_query($con, $crt);
$ver = "pending";
$bilname=$rowuser['user_name'];
$bilphone=$rowuser['user_phone'];
$bilemail=$rowuser['user_email'];
$billhouse=$rq['House'];
$billstreet=$rq['street'];
$billcity=$rq['city'];
$billstate=$rq['state'];
$bp=$rq['Pin'];
$query2 = "INSERT INTO `order_tbl`(`usr_id`, `total_price`, `order_status`) VALUES ('$i','$tk','$ver')";
$result2 = mysqli_query($con, $query2);
  if ($result2) {
    $oid = mysqli_insert_id($con);
    $query = "INSERT INTO `tbl_delivery`(`billing_name`, `del_phone`, `del_mail`, `del_house`, `del_street`, `del_city`, `del_state`, `del_pin`, `user_id`, `order_id`) VALUES ('$bilname','$bilphone','$bilemail','$billhouse','$billstreet','$billcity','$billstate','$bp','$i','$oid')";
    $result = mysqli_query($con, $query);
    while ($cr = mysqli_fetch_array($crtres)) {
      $product_id = $cr['prd_id'];
      $oqty = $cr['cart_quantity'];
      $order_price = $cr['cart_quantity'] * $cr['cart_price'];
      $qorderdetail = "insert into tbl_orddetails(order_id,user_id,product_id,ord_quantity,order_price) values('$oid','$i','$product_id','$oqty','$order_price')";
      $oddre = mysqli_query($con, $qorderdetail);
      $qstockchange = "update pro_tbl set Product_quantity=Product_quantity-'$oqty' where product_id='$product_id'";
      $stockre = mysqli_query($con, $qstockchange);
?>
      <script>
        alert("form submitted successfully");
        window.location.href = 'customer-order.php?tak=<?= $tk ?>';
      </script>
<?php

    }
  }
  $qcartdlt = "delete from tbl_cart where user_id='$i'";
  $dltre = mysqli_query($con, $qcartdlt);
?>