<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<?php
session_start();
$uname = $_SESSION['uname'];
include('connect_db.php');
echo'
        <h2>HTML Table</h2>

        <table>
          <tr>
            <th>First Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Cost</th>
            <th>Order Id</th>
            <th>Payment Status</th>
            <th>Payment Type</th>
            <th>Transaction Time</th>

          </tr>';
$sql = "SELECT order_status.fname, order_status.product_name, order_status.item_id,order_status.product_quantity, order_status.final_cost, payment.status,payment.time_created, payment.payment_type FROM order_status INNER JOIN payment ON order_status.payment_id = payment.order_id  WHERE order_status.fname = '$uname' ORDER BY time_created DESC ";
$result = $conn->query($sql);
if($result->num_rows>=0){
  while($row=$result->fetch_assoc()){
    echo'<tr>
    <td>'.$row['fname'].'</td>
    <td>'.$row['product_name'].'</td>
    <td>'.$row['product_quantity'].'</td>
    <td>'.$row['final_cost'].'</td>
    <td>'.$row['item_id'].'</td>
    <td>'.$row['status'].'</td>
    <td>'.$row['payment_type'].'</td>
    <td>'.$row['time_created'].'</td>
  </tr>';
  }
}
    
    ?>
        
        </body>
        </html>