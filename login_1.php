<?php
include('connect_db.php');
session_start();
if(isset($_POST['submit'])){
    $email_address = $_POST['email_address'];
    $pwd = md5($_POST['pwd']);
    $sql = "SELECT * FROM Users where email_address = '$email_address' AND password = '$pwd'";
   $result = $conn->query($sql);
if($result->num_rows>=0){
    while($row = $result->fetch_assoc()){
        $_SESSION['uname'] = $row['fname'];
        $role = $row['role'];
        echo $username;
        $_SESSION['email_address'] = $email_address;
        $registration_status = $row['registration_status'];
        echo $registration_status;
        if($registration_status == '0')
        {
            echo'<script>
            alert("Invalid Credentials");
            window.location = "index.php";
            </script>';
        }
        else{
            echo '<script>
            window.location = "category.php";
            </script>';
        }
        // echo $_SESSION['username'];
        echo '<script>
        window.location = "category.php";
        </script>';
        // echo $username;
        // echo $email_address;
        // echo $pwd;
    }
   
}
else{
    echo '<script>
    alert("Incorrect Credentials")
    window.location = "category.php";
    </script>';
}

}

?>