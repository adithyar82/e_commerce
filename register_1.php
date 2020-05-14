<?php
echo'<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
include('connect_db.php');
if(isset($_POST['submit1'])){
    $fname = $_POST['fname'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];
    $password  = md5($_POST['pwd']);
    $role = "delivery";
    $sql = "INSERT INTO Users(user_id,fname,email_address,phone_number,username,password,referral_code,role) VALUES (Null, '$fname','$email_address','$phone_number','$username','$password','$referral_code','$role')";
    $result = $conn->query($sql);
    echo $sql;
    echo $result;
    if($result->num_rows>=0){
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("WOW!","Message!","success");';
        echo '}, 1000);</script>';
}
}

?>