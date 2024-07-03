<?php
include('connection.php');

  $quantity = $_REQUEST['quantity'];
  $id = $_REQUEST['id'];
  // Update SQL table with $quantity

  $up="UPDATE `tbl_cart` SET `cart_quantity`='$quantity' WHERE `cart_id`='$id'";
  mysqli_query($con,$up);
 echo"<script>location.reload()</script>"
?>