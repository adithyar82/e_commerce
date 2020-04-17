<?php
include('connect_db.php');
$uname = $_SESSION['uname'];
echo $uname;
$final_cost = $_REQUEST['id1'];
$item_id = $_REQUEST['id2'];
$item_name = $_REQUEST['id3'];
$shipping_id = rand();
$product_quantity =1;
echo $item_name;
echo $item_id;
echo $final_cost;
echo $shipping_id;
$sql = "INSERT INTO order_status(order_id,item_id,fname,final_cost,product_name,shipping_id,payment_id,product_quantity,delivery_time,time_created) VALUES (Null, '$item_id','abc','$final_cost','$item_name','$shipping_id','abc','$product_quantity','abc',CURRENT_TIME);";
$result = $conn->query($sql);
echo $sql;
echo $result;

?>