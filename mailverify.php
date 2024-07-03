<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include("connection.php");
if (isset($_POST["sub"])) {

$usr = $_POST["usr"];
$ps = $_POST["pwd1"];
$pss = $_POST["pwd"];
$ph = $_POST["ph"];
$ml = $_POST["mail"];
$df = $_FILES["file"]["name"];
$code=rand(1000,9999);
if ($usr != null && $pss != null && $ph != null && $ml != null && $ps == $pss && $df!=null) {
  $qw = "SELECT * FROM `user_table`";
  $r = mysqli_query($con, $qw);
  while ($row = mysqli_fetch_array($r)) {
    if ($ml == $row['user_email']) {
      $flag = 0;
      echo "<script> alert('email exists')
      location.href='register.php'</script>";
      exit();
    } else if ($ml != $row['user_email']) {
      $flag = 1;
    }
  }
  if ($flag = 1) {
    $query = "INSERT INTO `user_table`(`user_name`, `user_password`, `user_email`, `user_phone`,`usr_img`,`usr_verify`) VALUES ('$usr','$pss','$ml','$ph','$df','$code')";
    $re = mysqli_query($con, $query);
    if ($re)
    {
    $qq=mysqli_insert_id($con);
    $targetdir="main/images/profiles/";
    $targetfilepath=$targetdir.basename($df);
    move_uploaded_file($_FILES["file"]["tmp_name"],$targetfilepath);
?>
    <!-- <script>
      alert("form submitted successfully");
      window.location.href = 'index1.php';
    </script> -->
<?php
    }
}
} else
echo "<script> alert('Enter all values');
location.href='register.php'</script>";
}
try_again:
$mail = new PHPMailer;
$mail->isHTML(true);
// Set up SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'adnox4512@gmail.com';
$mail->Password = 'gldraqktrfawynnq';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;


$fullname = "$usr";
$mail->setFrom('adnox4512@gmail.com', 'Adnox');
$mail->addAddress($ml, $fullname);
$mail->Subject = 'Verification Code For Your Login';
$mail->Body = '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
    <p>
    This Is Your Code For Successfull Registration '.$code.'</p>
    </html>';
    if (!$mail->send()) {
        echo "error.Mailer error:{$mail->ErrorInfo}";
      } else {
        $_SESSION['uname'] = $usr;
        ?>
        <script>location.href="code_email.php?gt=<?=$qq?>";</script>
        <?php
      }
    ?>