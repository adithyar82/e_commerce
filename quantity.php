<?php
include('connect_db.php');
$product_quantity = $_REQUEST['id1'];
$item_id = $_REQUEST['id2'];
echo $product_quantity;
echo $item_id;
$sql = "UPDATE items SET product_quantity = '$product_quantity' WHERE id = '$item_id';";
$result = $conn->query($sql);
?>