<?php
include('connect_db.php');
session_start();
if(isset($_POST['submit'])){
    $email_address = $_POST['email_address'];
    $pwd = md5($_POST['pwd']);
    echo $email_address;
    echo $pwd;
    $sql = "SELECT * FROM Users where email_address = '$email_address' AND password = '$pwd'";
   $result = $conn->query($sql);
if($result->num_rows>0){
    echo "done";
    while($row = $result->fetch_assoc()){
        $_SESSION['uname'] = $row['fname'];
        $role = $row['role'];
        echo $username;
        $_SESSION['email_address'] = $email_address;
        $registration_status = $row['registration_status'];
        echo $registration_status;
       
        // echo $_SESSION['username'];
       
        // echo $username;
        // echo $email_address;
        // echo $pwd;
    }
    if($role == "user"){
        echo '<script>
        window.location = "category.php";
        </script>';
    }
    else if($role == "delivery"){
        echo '<script>
        window.location = "delivery_checkin.php";
        </script>';   
    }
   
}
else{
    echo '<script>
    alert("Incorrect Credentials")
    window.location = "index.php";
    </script>';
}

}

?>