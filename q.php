<?php
 session_start(); 
if (isset($_POST["catsub"])) {
  include('connection.php');
  $query1="SELECT * FROM `category_tbl`";
  $qw=mysqli_query($con,$query1);
$ca = $_POST["cat"];
$file=$_FILES["file"]["name"];
if($ca != null){
    {
    while ($row = mysqli_fetch_array($qw)) {
            if ($ca == $row['Category_name']) {
              $flag = 0;
              echo "<script> alert('the category already exists')</script>";
              exit();
            } else if ($ca != $row['Category_name']) {
              $flag = 1;
            }
          }
        if($flag==1)
          {
    $ctgry="INSERT INTO `category_tbl`(`Category_name`,`cat_pic`) VALUES ('$ca','$file')";
    $res = mysqli_query($con, $ctgry);
    $usr_id = mysqli_insert_id($con);
    $_SESSION['ctgry'] = $usr_id;
    
    // $query = "INSERT INTO `pro_tbl`(`Category_id`) VALUES ('$usr_id')";
    // $re=mysqli_query($con, $query);
    {
      if($res)
      {
        $targetdir="main/images/category/";
        $targetfilepath=$targetdir.basename($file);
        move_uploaded_file($_FILES["file"]["tmp_name"],$targetfilepath);
      }
    }
        }
    }
    header("location:products.php");
}
}
?>

