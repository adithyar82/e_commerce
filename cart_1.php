<?php
include('connect_db.php');
session_start();
$username = $_SESSION['username'];
$id1 = $_REQUEST['id1'];
$id2 = $_REQUEST['id2'];
$id3 = $_REQUEST['id3'];
$product_quantity = 1;
$sql = "INSERT INTO items (id, username, item_name, item_price, product_quantity, time_created) VALUES (Null, '$username', '$id3', '$id1', '$product_quantity', CURRENT_TIME());";
$result = $conn->query($sql);
echo $sql;
echo $result;
if ($result->num_rows >= 0){
    echo '<script>
    window.location ="cart.php";
    </script>';
}   
?>