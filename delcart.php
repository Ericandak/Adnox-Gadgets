<?php session_start(); ?>
<?php
$crtid=$_GET["idd"];
include('connection.php');
$query = "DELETE FROM `tbl_cart` WHERE `cart_id`='$crtid'";
$result = mysqli_query($con, $query);
if($result)
{
echo "<script>location.href='cart.php'</script>";
}
?>