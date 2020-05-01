<?php
include('connect_db.php');
$ratings = $_POST['rating'];
$product_name = $_POST['product_name'];
echo $ratings;
echo $product_name; 
$sql = "INSERT INTO product_ratings(id, product_name, ratings) VALUES (Null, '$product_name','$ratings');";

$result = $conn->query($sql);

echo '<script>
window.location = "details.php?id='.$product_name.';
</script>';
?>