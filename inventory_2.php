<?php 
echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
include('connect_db.php');
$shop_name = $_POST['shop_name'];
$address_1 = $_POST['address_1'];
$address_2 = $_POST['address_2'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zip = $_POST['zipcode'];
$contact_name = $_POST['contact_name'];
$cemail_address = $_POST['email_address'];
$cphone_number= $_POST['phone_number'];


$sql = "INSERT INTO shops (shop_id, shop_name, address_1, address_2, city, state, zipcode, country, contact_name, cemail_address, cphone_number) VALUES (NULL,'$shop_name', '$address_1','$address_2', '$city', '$state', '$zip', '$country', '$contact_name', '$cemail_address', '$cphone_number');";
$result = $conn->query($sql);
if($result->num_rows>=0){
    echo '<script>
    setTimeout(function () { 
        swal({
        title: "Shop Upload",
        text: "Shop Uploaded Sucessfully",
        type: "success",
        confirmButtonText: "OK"
        },
        function(isConfirm){
        if (isConfirm) {
            window.location.href = "inventory_category_details.php";
        }
        }); }, 1000);
    </script>';
    }
?>