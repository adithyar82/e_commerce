<?php
include('connect_db.php');
session_start();
$email_address = $_POST['email_address'];
$pwd = md5($_POST['pwd']);
$sql = "SELECT * FROM Users where email_address = '$email_address' and password = '$pwd';";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $username = $row['fname'];
        $role = $row['role'];
        echo $username;
        $_SESSION['username'] = $username;
        echo $_SESSION['username'];
        if($role == "user"){
            echo '<script>
            window.location = "index.php";
            </script>';  
        }
        else if($role = "delivery")
        echo '<script>
        window.location = "delivery_status.php";
        </script>';
    }
   
}
else{
    echo '<script>
    alert("Incorrect Credentials")
    window.location = "index.php";
    </script>';
}
?>