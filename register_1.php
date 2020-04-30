<?php
include('connect_db.php');
if(isset($_POST['submit1'])){
    $fname = $_POST['fname'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];
    $password  = md5($_POST['pwd']);
    $sql = "INSERT INTO delivery_details (id, first_name, email_address, phone_number, username, password,aadhar_number,driving_license_numebr,address) VALUES (Null,'$fname,'$email_address','$phone_number','$username','$password','','','');";
    $result = $conn->query($sql);
    echo $sql;
    echo $result;
    if($result->num_rows>=0){
    echo '<script>
    alert("Registered Successfully");
    window.location = "index.php";
    </script>';
}
}

?>