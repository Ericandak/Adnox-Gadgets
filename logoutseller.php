<?php session_start(); ?>
<?php

        session_destroy();
        unset($_SESSION['lo']);
        $u = "loginseller.php";
        echo "<script>location.href='$u'</script>";
?>