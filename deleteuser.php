<?php
if (isset($_POST['user_id'])) {
  $id = $_POST['user_id'];
  include('connection.php');
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $query = "SELECT user_type FROM user_table WHERE user_id = '$id'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
  $current_status = $row['user_type'];
  if ($current_status == 0) {
    $new_status = 3; 
  } else {
    $new_status = 0; 
  }
  $updquery = "UPDATE user_table SET user_type = '$new_status' WHERE user_id = '$id'";
  mysqli_query($con, $updquery);
  mysqli_close($con);

}
?>