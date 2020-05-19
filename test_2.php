<?php
session_start();
$order_id = $_SESSION['order_id'];
echo $order_id;
include('connect_db.php');
$address_1 = $_POST['address_1'];
$address_2 = $_POST['address_2'];
$email_address = $_SESSION['email_address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zip = $_POST['zip'];
$shipping_address = $_POST['shipping_address'];
$sql = "SELECT * FROM items WHERE order_id = '$order_id';";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $fname = $row['username'];
        $item_name = $row['item_name'];
        $item_price = $row['item_price'];
        $product_quantity = $row['product_quantity'];
        $order_id = $row['order_id'];
        $final_cost = $row['final_cost'];
        $product_image = $row['product_image'];
        $status = "ordered";
        $payment_status = "Payment Initiated";
        $shop_id = 2;
        echo $fname;
        $sql1 = "INSERT INTO order_status(order_id,item_id,fname,final_cost,product_name, delivery_boy, payment_id, product_quantity,status,product_image, shop_id) VALUES (Null,'$order_id','$fname','$final_cost', '$item_name', ' ','$order_id', '1','$status','$product_image','$shop_id');";
        echo $sql1;
        $result1 = $conn->query($sql1);
        $sql_3 = "INSERT INTO payment(payment_id,final_cost,payment_type,time_created,order_id,fname,product_name,product_image,status) VALUES (Null, '$final_cost', '$payment_type', CURRENT_TIME(), '$order_id','$fname','$item_name','$product_image','$payment_status');";
        $result_3 = $conn->query($sql_3);
        echo $sql_3;
        $product_quantity = $product_quantity-1;
    }
}

?>