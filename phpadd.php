<?php
session_start();
include('connection.php');
$id = $_SESSION["lg"];
if(isset($_POST['address']))
{
    $add=$_POST["address2"];
    $addr="UPDATE `user_table` SET `user_address2`='$add' WHERE `user_id`='$id'";
    $rew=mysqli_query($con,$addr);
    ?>
    <script> location.href="checkout.php"</script>
    <?php
}
?>