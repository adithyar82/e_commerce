<?php
include('connect_db.php');
session_start();
$username = $_SESSION['username'];
$id1 = $_REQUEST['id1'];
// $id2 = $_REQUEST['id2'];
// $id3 = $_REQUEST['id3'];

$sql = "DELETE  FROM favourites where id = '$id1';";
$result = $conn->query($sql);
echo $sql;
echo $result;
if ($result->num_rows >= 0){
    echo '<script>
    window.location ="favourite.php";
    </script>';
}   
?>