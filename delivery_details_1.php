<?php 
include('connect_db.php');
if(!isset($_SESSION['uname'])){
    header("location:index.php");
}
$sql = "INSERT INTO delivery_log (id, checkin_time, checkout_time) VALUE (Null, CURRENT_TIME(), '');";
$result = $conn->query($sql);
if($result->num_rows>=0){
    echo '<script>
    alert("Registered Succesfully");
    window.location = "delivery_status.php";
    </script>';
}
?>