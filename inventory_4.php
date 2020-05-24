<?php 
echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
include('connect_db.php');
$sub_category_name = $_POST['sub_category_name'];
$sql = "INSERT INTO sub_category (sub_category_id, sub_category_name) VALUES (NULL,'$sub_category_name');";
$result = $conn->query($sql);
if($result->num_rows>=0){
    echo '<script>
    setTimeout(function () { 
        swal({
        title: "Category Upload",
        text: "Sub Category Uploaded Sucessfully",
        type: "success",
        confirmButtonText: "OK"
        },
        function(isConfirm){
        if (isConfirm) {
            window.location.href = "inventory_product_details.php";
        }
        }); }, 1000);
    </script>';
    }
?>