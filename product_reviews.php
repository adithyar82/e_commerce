<?php
include('connect_db.php');
$reviews = $_POST['comment'];
$product_name = $_POST['product_name'];
echo $reviews;
echo $product_name; 
$sql = "INSERT INTO product_reviews(id, product_name, reviews) VALUES (Null, '$product_name','$reviews');";

$result = $conn->query($sql);

echo '<script>
window.location = "details.php?id='.$product_name.';
</script>';
?>