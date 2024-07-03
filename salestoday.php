<?php
// require('../../connection/db_connect.php');
// $sql = "SELECT * FROM tbl_marriage_kuri_a WHERE usr_id = 26";
// $result = $con->query($sql);
// $row=mysqli_fetch_array($result);
// $i = 0;
include('connection.php');
if(isset($_POST["sub"]))
{
  $stdate=$_POST['date1'];
  $enddate=$_POST["date2"];
}
$date=$_GET['date'];
$oquery = "SELECT tbl_orddetails.orddet_id, tbl_orddetails.order_id, tbl_orddetails.user_id, tbl_orddetails.product_id, tbl_orddetails.order_price, tbl_orddetails.ord_quantity, order_tbl.Order_date, order_tbl.usr_id, order_tbl.total_price, order_tbl.order_status FROM tbl_orddetails JOIN order_tbl ON tbl_orddetails.order_id = order_tbl.Order_id WHERE order_tbl.order_date BETWEEN '$stdate' AND '$enddate' ";
$ore = mysqli_query($con, $oquery);
// $address="select * from `tbl_delivery` where `order_id`=$order";

$html= '<!DOCTYPE html>
<html>
  <head>
    <title>Sales Report</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
      }

      th {
        background-color: #f2f2f2;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <h1>Sales Report</h1>
    <h2>Date:'.$date.' </h2>
    <table>
      <tr>
        <th>Product Name</th>
        <th>Order Id</th>
        <th>Quantity Sold</th>
        <th>Total Sales</th>
      </tr>';
      while($ordet=mysqli_fetch_array($ore))
      {
        $kk=$ordet['product_id'];
         $query2 = "SELECT * FROM `pro_tbl` WHERE `product_id`='$kk'";
        $result2 = mysqli_query($con, $query2);
        $pro = mysqli_fetch_array($result2);
      $html.='<tr>
        <td>'.$pro["product_name"].'</td>
        <td>'.$ordet["order_id"].'</td>
        <td>'.$ordet["ord_quantity"].'</td>
        <td>'.$pro["product_price"].'</td>
      </tr>
      <tr>
      <td colspan="2">Total:</td>
        <td>'.$ordet['total_price'].' rs</td>
        </tr>'
      ;};
   $html.='</table>
  </body>
</html>
';


require_once './dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($html);
$dompdf->setPaper('A3');
$dompdf->render();
$dompdf->stream('gvgvg', array("Attachment" => 0));
