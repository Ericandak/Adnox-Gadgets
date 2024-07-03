<?php session_start(); ?>
<?php
include('connection.php');
$id = $_SESSION["lg"];
$sum=$_GET["tkm"];
if($id)
{
if(isset($_POST["update"]))
{
    $house=$_POST["house"];
    $street=$_POST["street"];
    $city=$_POST["city"];
    $state=$_POST["state"];
    $pin=$_POST["pin"];
    $addqry="INSERT INTO `address_tbl`( `user_id`, `House`, `street`, `city`, `state`, `Pin`) VALUES ('$id','$house','$street','$city','$state','$pin')";
    $ares=mysqli_query($con,$addqry);
    if($ares)
    {
        ?>
        <script>alert("Succesfully updated");</script>
        <script>location.href="checkoutbase.php?idd=<?=$sum?>"</script>
            <?php
    }

}
}
else
{
    ?>
<script>alert("login first");</script>
<script>location.href="index1.php"</script>
    <?php
}
?>