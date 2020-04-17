<?php
include('connect_db.php');
$product_quantity = $_REQUEST['id1'];
$item_id = $_REQUEST['id2'];
echo $product_quantity;
echo $item_id;
$sql_1 = "SELECT * FROM items WHERE id = '$item_id';";
$result_1 = $conn->query($sql_1);
if($result_1->num_rows>0){
    while($row = $result_1->fetch_assoc()){
        $final_cost = $row['final_cost'];
    }
}
$final_cost = $final_cost * $product_quantity;
$sql = "UPDATE items SET product_quantity = '$product_quantity', final_cost = '$final_cost' WHERE id = '$item_id';";
$result = $conn->query($sql);
echo '<script>
    window.location = "cart.php";
    </script>';
?>