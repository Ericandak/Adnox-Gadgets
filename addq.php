<?php session_start(); ?>
<?php
error_reporting(E_ERROR | E_PARSE);

include('connection.php');
$id = $_SESSION["lo"];
$pro = $_GET["pro"];
if (isset($_POST["qsub"])) {
$quantity=$_POST["qntity"];
$qu = "update pro_tbl set Product_quantity=Product_quantity+'$quantity' where product_id='$pro' and seller_id='$id'";
echo $qu;
$ru=mysqli_query($con,$qu);
if($ru){
    ?>
    <script>alert("successfully added");</script>
    <script>location.href="seller.php";</script>
    <?php
}
}
?>