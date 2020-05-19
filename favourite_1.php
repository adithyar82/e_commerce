<?php
echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
include('connect_db.php');
session_start();
$username = $_SESSION['uname'];
$id1 = $_REQUEST['id1'];
$id2 = $_REQUEST['id2'];
$id3 = $_REQUEST['id3'];
$product_id = $id2;
$sql2  = "SELECT * FROM products WHERE product_id = '$product_id';";
$result2 = $conn->query($sql2);
if($result2->num_rows>0){
    while($row = $result2->fetch_assoc()){
        $product_quantity_1 = $row['product_quantity'];
        $product_image = $row['product_image'];
    }
}
$initial_cost = $id1;
$product_quantity = 1;
$final_cost = $initial_cost * $product_quantity;
$sql_1 = "SELECT * FROM favourites WHERE product_id = '$product_id';";
$result_1 = $conn->query($sql_1);
if($result_1->num_rows>0){
    echo '<script>
    setTimeout(function () { 
        swal({
          title: "Favourite",
          text: "The item is already added to favourite ",
          type: "error",
          confirmButtonText: "OK"
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "category.php";
          }
        }); }, 1000);
    </script>';
}
else{
  $sql = "INSERT INTO favourites (id, username, item_name, item_price, product_quantity, initial_cost, final_cost,initial_quantity, product_id, product_image) VALUES (Null, '$username', '$id3', '$id1', '$product_quantity', '$initial_cost', '$final_cost', '$product_quantity_1','$product_id','$product_image');";
$result = $conn->query($sql);
// echo $sql;
// echo $result;
if ($result->num_rows >= 0){
    echo '<script>
    setTimeout(function () { 
        swal({
          title: "Category",
          text: "Item is added to favourites",
          type: "success",
          confirmButtonText: "OK"
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "updated_favourite.php";
          }
        }); }, 1000);
    </script>';
} 
}  