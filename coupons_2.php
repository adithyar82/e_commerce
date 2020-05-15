<?php 
echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
include('connect_db.php');
if(!isset($_SESSION['uname'])){
    header("location:index.php");
}
if(isset($_POST['submit'])){
    $coupon_code = $_POST['coupon_code'];
    $value = $_POST['value'];
    $cost = $_POST['cost'];
    $sql = "INSERT INTO coupons (id,coupon_code,value,cost) VALUES (Null, '$coupon_code','$value','$cost');";
    echo $sql;
    $result = $conn->query($sql);
    if($result->num_rows>=0){
        echo '<script>
        setTimeout(function () { 
            swal({
            title: "Confermation",
            text: "Coupond added successfully",
            type: "success",
            confirmButtonText: "OK"
            },
            function(isConfirm){
            if (isConfirm) {
                window.location.href = "coupons_1.php";;
            }
            }); }, 1000);
        </script>';
    }
}
?>