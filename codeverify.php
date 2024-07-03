<?php
session_start();
$qv=$_GET["ver"];
$qa=$_GET["op"];
if (isset($_POST['sub'])){
    $cd=$_POST["pss"];
    if($qv==$cd)
    {
        ?>
        <script>alert("successfully verified");</script>
        <script>location.href="index1.php"</script>
        <?php
    }
    else
    {
        ?>
        <script>alert("The code doesn't match");</script>
        <script>location.href="code_email.php?gt=<?=$qa?>"</script>
<?php
}
}
?>