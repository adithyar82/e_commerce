<?php
echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
include('connect_db.php');
$email_address = $_POST['email_address'];
$pwd =  md5($_POST['pwd']);
$sql = "UPDATE Users SET password = '$pwd' WHERE email_address = '$email_address';";
$result = $conn->query($sql);
if($result->num_rows>=0){
    echo '<script>
    setTimeout(function () { 
        swal({
          title: "Registration",
          text: "Registration is done successfully ",
          type: "success",
          confirmButtonText: "OK"
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "category.php";
          }
        }); }, 1000);
    </script>';
}
?>