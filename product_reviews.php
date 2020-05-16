<?php
include('connect_db.php');
if(isset($_POST['submit'])){
$fname = $_POST['fname'];
$email_address = $_POST['email_address'];
$reviews = $_POST['reviews'];
$rating = $_POST['rating'];
echo $rating;
$product_name = $_POST['product_name'];
echo $reviews;
echo $product_name; 
$sql = "INSERT INTO product_reviews(id, fname, email_address, product_name, reviews, ratings) VALUES (Null, '$fname', '$email_address', '$product_name','$reviews', '$rating');";

$result = $conn->query($sql);

$sql_1 = "INSERT INTO product_ratings(id, fname, email_address, product_name, ratings) VALUES (Null, '$fname', '$email_address','$product_name','$rating');";
$result_1 = $conn->query($sql_1);
echo $sql_1;
if($result_1->num_rows>=0){
    echo'<script>
        alert("Registered Successfully");
        window.location = "details_1.php?id='.$product_name.'";
        </script>';
}

}
?>