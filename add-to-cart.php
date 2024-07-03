<?php session_start(); ?>
<?php
include('connection.php');
$id = $_SESSION["lg"];
$prid = $_GET['id'];
if ($id) {
	if (isset($_POST["cart"])) {
		$query = "SELECT * FROM `user_table` WHERE `user_id` = '$id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
	}
	$query2 = "SELECT * FROM `pro_tbl` WHERE `product_id` = '$prid'";
	$result2 = mysqli_query($con, $query2);
	$rw = mysqli_fetch_array($result2);
	$prodname = $rw['product_name'];
	$prodprice = $rw['product_price'];
	$proddesc = $rw['product_desc'];
	$prodimg = $rw['product_image'];
	$q3 = "SELECT * FROM `tbl_cart` where `user_id`='$id' and `prd_id`='$prid'";
	$re3 = mysqli_query($con, $q3);
	$num=mysqli_num_rows($re3);
	$nm=1;
	if ($num>0) {
		echo "<script>alert('already added');</script>";
		echo "<script>location.href='index.php'</script>";
	} else {
		$query3 = "INSERT INTO `tbl_cart`(`cart_item`,`cart_quantity`,`cart_price`, `cart_desc`,`cart_img`,`user_id`,`prd_id`) VALUES ('$prodname','$nm','$prodprice','$proddesc','$prodimg','$id','$prid')";
		$reslt = mysqli_query($con, $query3);
		if ($reslt) {
			echo "<script>location.href='index.php'</script>";
		}
	}
}
?>