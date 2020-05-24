<?php 
echo'<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
include('connect_db.php');
$product_name = $_POST['product_name'];
$description = $_POST['description'];
$initial_cost = $_POST['initial_cost'];
$final_cost = $_POST['final_cost'];
$height = $_POST['height'];
$width = $_POST['width'];
$depth = $_POST['depth'];
$colour = $_POST['colour'];
$size = $_POST['size'];
$tax = $_POST['tax'];
$date = $_POST['date'];
$product_code = $_POST['product_code'];
if(isset($_POST['test'])){
    $tax = 18;
}

$sql = "INSERT INTO products (product_id, product_name, description,initial_cost, final_cost, height, weight, depth, colour, size, total_tax, expiry_date,product_code) VALUES (NULL,'$product_name', '$description','$initial_cost', '$final_cost', '$height', '$width', '$depth', '$colour', '$size', '$tax', '$date','$product_code');";
$result = $conn->query($sql);
if($result->num_rows>=0){
    echo '<script>
    setTimeout(function () { 
        swal({
        title: "Product Upload",
        text: "Product Uploaded Sucessfully",
        type: "success",
        confirmButtonText: "OK"
        },
        function(isConfirm){
        if (isConfirm) {
            window.location.href = "inventory.php";
        }
        }); }, 1000);
    </script>';
    }
?>