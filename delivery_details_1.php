<?php 
echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">'; 
include('connect_db.php');
session_start();
if(!isset($_SESSION['uname'])){
    header("location:index.php");
}
$sql = "INSERT INTO delivery_log (id, checkin_time, checkout_time) VALUE (Null, CURRENT_TIME(), '');";
$result = $conn->query($sql);
$sql1 = "UPDATE delivery_log SET status = 1;";
$result1 = $conn->query($sql1);
if($result->num_rows>=0){
    echo '<script>
    setTimeout(function () { 
        swal({
          title: "Delivery Boy",
          text: "Checked-In successfully",
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
?>