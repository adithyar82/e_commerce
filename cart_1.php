<?php
include('connect_db.php');
session_start();
$username = $_SESSION['username'];
$id1 = $_REQUEST['id1'];
$id2 = $_REQUEST['id2'];
$id3 = $_REQUEST['id3'];
$product_id = $id2;
$sql2  = "SELECT * FROM products WHERE product_id = '$product_id';";
$result2 = $conn->query($sql2);
if($result2->num_rows>0){
    while($row = $result2->fetch_assoc()){
        $product_quantity_1 = $row['product_quantity'];
    }
}
$initial_cost = $id1;
$product_quantity = 1;
$final_cost = $initial_cost * $product_quantity;
$sql = "INSERT INTO items (id, username, item_name, item_price, product_quantity, initial_cost, final_cost,initial_quantity) VALUES (Null, '$username', '$id3', '$id1', '$product_quantity', '$initial_cost', '$final_cost', '$product_quantity_1');";
$result = $conn->query($sql);
echo $sql;
echo $result;
if ($result->num_rows >= 0){
    echo '<script>
    window.location ="cart.php";
    </script>';
}   
?>