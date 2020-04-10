<?php
include('connect_db.php');

$CGemail= $_POST['CGemail'];
$sql = "SELECT * FROM Users where email_address = '$CGemail';";
$result = $conn->query($sql);
if($result->num_rows>0){
    echo "failure";
}
else{
    echo "success";
}
?>