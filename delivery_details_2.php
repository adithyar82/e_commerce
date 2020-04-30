<?php 
include('connect_db.php');
$sql = "INSERT INTO delivery_log (id, checkin_time, checkout_time) VALUE (Null, '', CURRENT_TIME());";
$result = $conn->query($sql);
if($result->num_rows>=0){
    echo '<script>
    alert("Registered Succesfully");
    window.location = "delivery_checkin.php";
    </script>';
}
?>