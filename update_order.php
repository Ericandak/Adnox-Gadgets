<?php
include('connection.php');
  $status = $_REQUEST['status'];
  $id = $_REQUEST['idk'];
  // Update SQL table with $quantity

  $up="UPDATE `order_tbl` SET `order_status`='$status' WHERE `order_id`='$id'";
  mysqli_query($con,$up);

 echo"<script>location.reload()</script>"
?>