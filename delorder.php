<?php session_start(); ?>
<?php
$odid=$_GET["odid"];
include('connection.php');
$query = "DELETE FROM `order_tbl` WHERE `Order_id`='$odid'";
$result = mysqli_query($con, $query);
$query2="DELETE FROM `tbl_orddetails` WHERE `order_id`='$odid'";
$result2=mysqli_query($con,$query2);
$query3="DELETE FROM `tbl_delivery` WHERE `order_id`='$odid'";
$result3=mysqli_query($con,$query3);
if($result)
{
echo "<script>location.href='customer-order.php'</script>";
}
?>