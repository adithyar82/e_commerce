<?php 
echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">'; 
include('connect_db.php');
$sql = "INSERT INTO delivery_log (id, checkin_time, checkout_time) VALUE (Null, '', CURRENT_TIME());";
$result = $conn->query($sql);
$sql1 = "UPDATE delivery_log SET status = 0;";
$result1 = $conn->query($sql1);
if($result->num_rows>=0){
    echo '<script>
    setTimeout(function () { 
        swal({
          title: "Delivery Boy",
          text: "Checked-Out successfully",
          type: "success",
          confirmButtonText: "OK"
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "delivery_checkin.php";
          }
        }); }, 1000);
    </script>';
}
?>