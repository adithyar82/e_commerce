<?php 
include('connect_db.php');
if(isset($_POST['submit'])){
    $coupon_code = $_POST['coupon_code'];
    $value = $_POST['value'];
    $cost = $_POST['cost'];
    $sql = "INSERT INTO coupons (id,coupon_code,value,cost) VALUES (Null, '$coupon_code','$value','$cost');";
    echo $sql;
    $result = $conn->query($sql);
    if($result->num_rows>=0){
        echo '<script>
        alert("Registerd Successfully")
        window.location = "coupons_1.php";
        </script>';
    }
}
?>