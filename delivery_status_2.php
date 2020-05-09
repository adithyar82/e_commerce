<?php
include('connect_db.php');
$delivery_status = $_POST['delivery_status'];
$order_id = $_POST['order_id'];
$sql = "UPDATE order_status SET delivery_status = '$delivery_status' WHERE order_id = '$order_id';";
$result = $conn->query($sql);
?>