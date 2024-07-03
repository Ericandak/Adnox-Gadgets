<?php session_start(); ?>
<?php
$pro_id = $_GET['kd'];
include('connection.php');
$id = $_SESSION["lg"];
$qu = "SELECT * FROM `user_table` WHERE `user_id` = '$id'";
$result = mysqli_query($con, $qu);
$ro = mysqli_fetch_array($result);
$reviewer=$ro['user_name'];
if (isset($_POST["sub"])) {
    $rev = $_POST["review"];
    $q = "INSERT INTO `tbl_review`(`Review`,`user_id`,`product_id`,`reviewer`) VALUES ('$rev','$id','$pro_id','$reviewer')";
    $res=mysqli_query($con,$q);
    if($res)
    {
        ?>
        <script>location.href='product-single.php?id=<?=$pro_id?>'</script>
        <?php

    }
    else
    {
        echo "<script>alert('Something Went Wrong Try Again)</script>";
        echo "<script>location.href='product-single.php'</script>";
    }
}

    ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ) VALUES ('$id')";
    $res = mysqli_query($con, $q);
    if($res)
    {
        echo("<script>alert('$pro_id')</script>");
    }

}
?>