<?php
include('connect_db.php');
$email_address = $_POST['email_address'];
$pwd =  md5($_POST['pwd']);
$sql = "UPDATE Users SET password = '$pwd' WHERE email_address = '$email_address';";
$result = $conn->query($sql);
if($result->num_rows>=0){
    echo '<script>
    alert("Registered Successfully");
    window.location = "index.php";
    </script>';
}
?>