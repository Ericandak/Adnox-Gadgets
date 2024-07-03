<?php session_start(); ?>
<?php
include('connection.php');
$sum = $_GET["token"];
$id = $_SESSION["lg"];

if ($id) {
	$id = $_SESSION["lg"];
	$query = "SELECT * FROM `user_table` WHERE `user_id` = '$id'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$target = $row["usr_img"];

	//  $query1 = "SELECT * FROM `login_p` 
	// 			 WHERE `id` = '$id'";
	//  $result1 = mysqli_query($con,$query1);
	//  $row1 = mysqli_fetch_array($result1);
	//  $uname = $row1["mail"];
} else {
	$target = "index1.php";
}
$query2 = "SELECT * FROM `tbl_cart` where `user_id`='$id'";
$result2 = mysqli_query($con, $query2);
$sm = $sum;
$queryadd = "SELECT * FROM `address_tbl` WHERE `user_id`='$id'";
$resadd = mysqli_query($con, $queryadd);
$addnum = mysqli_num_rows($resadd);
if ($addnum == 0) {
?>
<script>alert("no registerd address found create one");</script>
<script>location.href="checkout2.php?tkn=<?=$sum?>"</script>
<?php
}
else
{
    ?>
    <script>location.href="checkoutbase.php?tlk=<?=$sum?>"</script>
  
    <?php
      
}
?>