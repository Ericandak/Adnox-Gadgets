<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
session_start();
$i=0;
try_again:



$mail1 = $_POST['us'];
include('connection.php');

$query = "SELECT * FROM `user_table` 
                    WHERE `user_email` = '$mail1'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$fname = trim($row['user_name']);
$fullname = "$fname";
$count = mysqli_num_rows($result);
$id = $row['user_id'];
if ($count > 0) {
    $link="localhost/mini/pwdchange.php?id=".urlencode(base64_encode($id));

    //mailer start
    $mail = new PHPMailer;

    // Set up SMTP configuration
    $mail->isHTML(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'adnox4512@gmail.com';
    $mail->Password = 'gldraqktrfawynnq';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
  
    // Set up email details
    $mail->setFrom('adnox4512@gmail.com', 'Adnox');
    $mail->addAddress($mail1, $fullname);
    $mail->Subject = 'Reset Password';
    $mail->Body = 'click this link'.$link.'';

    if (!$mail->send()) {
        echo "error.Mailer error:{$mail->ErrorInfo}";
        // echo "<script>alert('Something went wrong Try again')</script>";
        // echo "<script>window.location.href:'changepassword.php'</script>";

} else {
    // echo "success";
    echo "<script>alert('successfully sent')</script>";
    ?>
    <script>location.href='index1.php'</script>
    <?php
}
}
?>