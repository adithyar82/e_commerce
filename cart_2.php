<?php
echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">'; 
include('connect_db.php');
session_start();
$username = $_SESSION['username'];
$id1 = $_REQUEST['id1'];
// $id2 = $_REQUEST['id2'];
// $id3 = $_REQUEST['id3'];

$sql = "DELETE  FROM items where id = '$id1';";
$result = $conn->query($sql);
// echo $sql;
// echo $result;
if ($result->num_rows >= 0){
    echo '<script>
    setTimeout(function () { 
        swal({
          title: "Cart",
          text: "Item removed from cart",
          type: "success",
          confirmButtonText: "OK"
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "updated_cart.php";
          }
        }); }, 1000);
    </script>';
}   
?>