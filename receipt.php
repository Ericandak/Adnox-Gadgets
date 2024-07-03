<?php
// require('../../connection/db_connect.php');
// $sql = "SELECT * FROM tbl_marriage_kuri_a WHERE usr_id = 26";
// $result = $con->query($sql);
// $row=mysqli_fetch_array($result);
// $i = 0;
include('connection.php');
$order=$_GET["ord"];
$oquery = "select * from order_tbl where order_id='$order'";
$ore = mysqli_query($con, $oquery);
$orders=mysqli_fetch_array($ore);
$user=$orders['usr_id'];
$oquery2 = "select * from tbl_orddetails where user_id='$user' and order_id='$order'";
$ore2 = mysqli_query($con, $oquery2);
$address="select * from `tbl_delivery` where `order_id`=$order";
$add=mysqli_query($con,$address);
$showad=mysqli_fetch_assoc($add);
$name=$showad["billing_name"];
$hou=$showad["del_house"];
$str=$showad["del_street"];
$cit=$showad["del_city"];
$stat=$showad["del_state"];
$pin=$showad["del_pin"];
$mail=$showad["del_mail"];
$phone=$showad["del_phone"];
$html= '<!DOCTYPE html>
<html>
  <head>
    <title>Receipt</title>
    <style>
    /* Set some basic styles for the whole page */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    /* Add some styles for the date and time */
    .dandt {
      float: right;
      margin: 0px;
    }
    .dand {
        float: right;
        margin: left -130px;
      }
    
    /* Add some styles for the heading */
    h1 {
      text-align: center;
      font-size: 36px;
      color: #333;
      margin-top: 20px;
    }
    
    /* Add some styles for the subheading */
    h4 {
      text-align: center;
      font-size: 24px;
      color: #555;
    }
    
    /* Add some styles for the table */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    
    td, th {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }
    
    th {
      background-color: #f0f0f0;
      font-weight: bold;
      color: #555;
    }
    
    /* Add some styles for the total */
    td:last-child {
      font-weight: bold;
    }
    
    /* Add some styles for the shipping information */
    h2 {
      margin-top: 20px;
      color: #333;
    }
    
    p {
      margin: 0;
      padding: 5px 0;
      color: #777;
    }
    
    /* Add some styles for the horizontal line */
    hr {
      margin: 20px 0;
      border: 0;
      border-top: 1px solid #ccc;
    }
    
    </style>
  </head>
  <body>
  <center>
  <div class="dandt">Date :' . date("d/m/Y") . '</div><br>
    <div class="dand">Time :' . date("h:i:s A") . '</div>
    </center>
    <h1>Adnox Gadgets</h1>
    <h4>Invoice</h4>
    <hr />
    <h2>Order Summary</h2>
    <table>
      <tr>
        <td>Product Name</td>
        <td>Quantity</td>
        <td>Price</td>
      </tr>';
      while($ordet=mysqli_fetch_array($ore2))
      {
      $kk=$ordet['product_id'];
         $query2 = "SELECT * FROM `pro_tbl` WHERE `product_id`='$kk'";
        $result2 = mysqli_query($con, $query2);
        $pro = mysqli_fetch_array($result2);
     
      $html.='<tr>
        <td>'.$pro['product_name'].'</td>
        <td>'.$ordet['ord_quantity'].'</td>
        <td>'.$pro['product_price'].'rs</td>
      </tr>
      <tr>
        
      </tr>';};

    $html.='<td colspan="2">Total:</td>
        <td>'.$orders['total_price'].' rs</td></table>
    <hr/>
    <h2>Shipping Information</h2>
    <p>'.$name.'</p>
    <p>'.$hou.','.$str.','.$cit.'<br>'.$stat.','.$pin.'</p>
    <p>Phone:'.$phone.'</p>
    <p>Email:'.$mail.'</p>
    <hr />
  </body>
</html>';


require_once './dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($html);
$dompdf->setPaper('A3');
$dompdf->render();
$dompdf->stream('adnox receipt', array("Attachment" => 0));
?>