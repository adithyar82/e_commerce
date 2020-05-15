<?php
echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">'; 
include('connect_db.php');
if(isset($_POST['submit'])){
$delivery_status = $_POST['delivery_status'];
$order_id = $_POST['order_id'];
$sql = "UPDATE order_status SET delivery_status = '$delivery_status' WHERE order_id = '$order_id';";
$result = $conn->query($sql);

echo '<script>
    setTimeout(function () { 
        swal({
          title: "Delivery Boy",
          text: "Orders has been updated",
          type: "success",
          confirmButtonText: "OK"
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "delivery_status.php";
          }
        }); }, 1000);
    </script>';
}
// ?>